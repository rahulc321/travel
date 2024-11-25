<?php

namespace App\Http\Controllers\Admin;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use App\CheckList;
use App\CaseChecklist;
use App\User;
use DataTables;
class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        abort_if(Gate::denies('checklist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $data = CheckList::orderBy('id','desc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          if (\Auth::user()->can('checklist_edit')) { 
                           $btn = '<a class="btn btn-xs btn-info" href="'.route('admin.checklist.edit',[$row->id]).'">
                                        Edit
                                    </a>';
                            }
                            if (\Auth::user()->can('checklist_delete')) { 
                            $btn .= '<a onclick="return confirm(`Are you sure?`)" class="btn btn-xs btn-danger" href="'.url('admin/checklist-delete',[$row->id]).'">
                                        Delete
                                    </a>';
                            }
                            return $btn;
                        
                    })
                    ->addColumn('staff', function($row){
                            $staffIds = explode(',', $row->staff);
                             $staffNames = User::whereIn('id', $staffIds)->pluck('name')->implode(', ');
                             return $staffNames;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.checklist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('checklist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->data['users'] = User::whereHas('roles', function ($query) {
        $query->where('title', 'User');
        })->get();

        
        return view('admin.checklist.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request)
    {
        $data = $request->all();
        $data['staff'] = implode(',',$request->staff);
        CheckList::create($data);
        
        \Session::flash('message', 'You have successfully added!'); 
        return redirect()->route('admin.checklist.index');
    }

    /**
     * Display the specified resource.
     *
     ;[[[[,.....]]]]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('checklist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $this->data['users'] = User::whereHas('roles', function ($query) {
        $query->where('title', 'User');
        })->get();

        $this->data['edit'] = CheckList::where('id',$id)->first();
        $getParentId = CheckList::where('id',$id)->value('parent_id');
        //dd($getParentId);
            
       $assignedParentId = CheckList::where('parent_id', '=', $id)->value('parent_id');

        if ($assignedParentId !== null) {
           
            // If a parent is already assigned to $id, fetch all children of that parent
                $array1 = CheckList::where('parent_id', '=', $assignedParentId)
                ->where('id', '!=', $id)
                ->get()->toArray();

                // Retuen all id in array
                $column_values = array_column($array1, 'id',0);

                //  Get all checklist 
                $array2 = CheckList::whereNull('parent_id')
                 
                ->where('id', '!=', $getParentId)
                ->get()->toArray();

                $result_array = array_merge($array1, $array2);

                $this->data['children'] = $result_array;
                $this->data['childrenArray'] = $column_values;
 
 
        } else {
            
            // If no parent is assigned to $id, fetch all children with a null parent_id
            $this->data['children'] = CheckList::whereNull('parent_id')
                ->where('id', '!=', $id)
                ->get();
        }
 
        return view('admin.checklist.edit',$this->data);
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateChecklistRequest $request,CheckList $CheckList)
    // {
    //     $data = $request->all();
    //     //dd($data);
    //     $data['staff'] = implode(',',$request->staff);
    //     $CheckList->update($data);
        
    //     \Session::flash('message', 'You have successfully updated!'); 
    //     return redirect()->route('admin.checklist.index');
    // }

    public function update(Request $request,$id)
{
    try {
        $data = CheckList::where('id',$id)->first();
        $data->code = $request->code; 
        $data->description = $request->description; 
        
        $data->staff = implode(',', $request->staff);
        $data->sr = $request->sr; 
        $data->phase = $request->phase; 
        //$data->parent_id = $request->parent_id; 
        $data->save();
         CheckList::where('parent_id',$id)->update(['parent_id'=> NULL]);
        if($request->child_id){
            foreach ($request->child_id as $key => $childId) {
                $childUpdate = CheckList::where('id',$childId)->first();
                $childUpdate->parent_id = $id;
                $childUpdate->save();
            }
        } 

       // dd($request->child_id);

        

        \Session::flash('message', 'You have successfully updated!');
        return redirect()->route('admin.checklist.index');
    } catch (\Exception $e) {
        // Log the exception or handle it appropriately
        \Log::error('Error updating checklist: ' . $e->getMessage());
        \Session::flash('error', 'An error occurred while updating the checklist.');
        return redirect()->back(); // Redirect back with an error message
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checklistDelete($id)
    {
         CheckList::where('id',$id)->delete();
        \Session::flash('error', 'You have successfully deleted!'); 
        return redirect()->route('admin.checklist.index');
    }

    public function updateStatus(Request $request)
    {   

       $updateStatus =  CheckList::where('id',$request->id)->first();
       $updateStatus->is_default = ($updateStatus->is_default == 1) ? 0 : 1;
       $updateStatus->save();
       return true;
    }

    // Update checklist description
    public function updateData(Request $request)
    {   
         // Update the database
        $record = CaseChecklist::find($request->id);
        $record->description =$request->new_value;
        $record->save();

        // You can return a response if needed
        return response()->json(['message' => 'Data updated successfully']);
       
    }
}
