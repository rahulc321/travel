<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Role;
use App\CheckList;
use App\CaseIntake;
use App\CaseChecklist;
use DataTables;
use DB;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('case_intake_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        if ($request->ajax()) {
            $data = CaseIntake::orderBy('id','desc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          if (\Auth::user()->can('case_intake_edit')) { 
                           $btn = '<a class="btn btn-xs btn-info" href="'.route('admin.case_intake.edit',[$row->id]).'">
                                        Edit
                                    </a>';
                            }
                            if (\Auth::user()->can('case_intake_delete')) { 
                            $btn .= '<a onclick="return confirm(`Are you sure?`)" class="btn btn-xs btn-danger" href="'.url('admin/party-delete',[$row->id]).'">
                                        Delete
                                    </a>';
                            }
                            return $btn;
                        
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
         
         
        return view('admin.case_intake.index');
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        abort_if(Gate::denies('case_intake_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->data['roles'] = Role::where('title','Claimant')->get();
        $this->data['countries'] = DB::table('countries')->get(["name","id"]);

        //dd($this->data['roles']);
        return view('admin.case_intake.create',$this->data);
    }

    public function getState(Request $request)
    {
        $data['states'] =  DB::table('states')->where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

     public function getCity(Request $request)
    {
        $data['cities'] = DB::table('cities')->where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartyRequest $request)
    {   
        $data = $request->all();
        $data['dob'] = date('Y-m-d',strtotime($request->dob));
        $data['dom'] = date('Y-m-d',strtotime($request->dom));
        $data['dod'] = date('Y-m-d',strtotime($request->dod));
        $data['our_client'] = $request->has('our_client') ? $request->input('our_client') : 0;
        $data['minor'] = $request->has('minor') ? $request->input('minor') : 0;
        $data['case_status'] = $request->has('case_status') ? $request->input('case_status') : 0;
        $data['deceased'] = $request->has('deceased') ? $request->input('deceased') : 0;
        $data['incapacitated'] = $request->has('incapacitated') ? $request->input('incapacitated') : 0;
        $CaseIntake = CaseIntake::create($data);
        
        \Session::flash('message', 'You have successfully added!'); 
        return redirect()->route('admin.case_intake.index');
    }

    /**
     * Display the specified resource.
     *
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
        abort_if(Gate::denies('case_intake_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->data['roles'] = Role::where('title','Claimant')->get();
        $this->data['checklists'] = CheckList::with('getName')->where('is_default',1)->get();
        $this->data['edit'] = CaseIntake::where('id',$id)->first();
        $this->data['countries'] = DB::table('countries')->get(["name","id"]);
        return view('admin.case_intake.edit',$this->data);
    } 


    public function loadChecklist(Request $request){
        

        // Fetch data from the source table

        $id = $request->id;

        // check checklist exist or not
        $exist = CaseChecklist::where('party_id', $id)->count();

        if($exist ==0){
            $sourceData = CheckList::get();
            foreach ($sourceData as $data) {
                $case = new CaseChecklist();
                $case->party_id = $id;
                $case->code = $data->code;
                $case->description = $data->description;
                $case->staff = $data->staff;
                $case->sr = $data->sr;
                $case->phase = $data->phase;
                $case->status = 0;
                $case->is_default = $data->is_default;
                $case->parent_id = $data->parent_id;
                $case->save();
             }
         }

        $this->data['checklists'] = CaseChecklist::with('getName')->where('is_default',1)->orderBy('status','ASC')->get();

        return view('admin.case_intake.checklist',$this->data);
    }  


    // Update checklist status
    public function updateChecklistStatus(Request $request)
    {   
         // Update the database
        CaseChecklist::where('id',$request->id)->update(['status'=>$request->status]);

        if($request->status == 1){
            $record = CaseChecklist::where('parent_id',$request->id)->get();
            
            foreach ($record as $key => $value) {
                $value->is_default = 1;
                 $value->save();
            }

        }

        // You can return a response if needed
        return response()->json(['message' => 'Data updated successfully']);
       
    }


    
    public function updateChecklistDueDate(Request $request)
    {
         CaseChecklist::where('id',$request->id)->update(['due_date'=>date('Y-m-d',strtotime($request->selectedDate))]);
 
        // You can return a response if needed
        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartyRequest $request, CaseIntake $CaseIntake)
    {
        $data = $request->all();
        if($request->form == 1){
            $data['dob'] = date('Y-m-d',strtotime($request->dob));
            $data['dom'] = date('Y-m-d',strtotime($request->dom));
            $data['dod'] = date('Y-m-d',strtotime($request->dod));
            $data['our_client'] = $request->has('our_client') ? $request->input('our_client') : 0;
            $data['minor'] = $request->has('minor') ? $request->input('minor') : 0;
            $data['case_status'] = $request->has('case_status') ? $request->input('case_status') : 0;
            $data['deceased'] = $request->has('deceased') ? $request->input('deceased') : 0;
            $data['incapacitated'] = $request->has('incapacitated') ? $request->input('incapacitated') : 0;
        }elseif($request->form == 2){
            $data['alleged_onset_date'] = date('Y-m-d',strtotime($request->alleged_onset_date));
            $data['opened'] = date('Y-m-d',strtotime($request->opened));
            $data['closed'] = date('Y-m-d',strtotime($request->closed));
            $data['reassigned'] = date('Y-m-d',strtotime($request->reassigned));
            $data['intake_info_date'] = date('Y-m-d',strtotime($request->intake_info_date));
            $data['last_date_work'] = date('Y-m-d',strtotime($request->last_date_work));
            $data['case_ss'] = $request->has('case_ss') ? 1 : 0;
            $data['case_ssi'] = $request->has('case_ssi') ? 1 : 0;
            $data['widow'] = $request->has('widow') ? 1 : 0;
            $data['dormant'] = $request->has('dormant') ? 1 : 0;
        }   

        unset($data['form']);
        //unset($data['intake_info_staff']);
        //dd($data);
        $CaseIntake->update($data);
        
        \Session::flash('message', 'You have successfully updated!'); 
        return redirect()->route('admin.case_intake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function partyDelete($id)
    {
        CaseIntake::where('id',$id)->delete();
        \Session::flash('error', 'You have successfully deleted!'); 
        return redirect()->route('admin.case_intake.index');
    }
}
