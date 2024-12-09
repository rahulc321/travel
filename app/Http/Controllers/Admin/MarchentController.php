<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Marchent;
use Auth;

class MarchentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['marchant'] = Marchent::where(function ($query) {
            
                if (Auth::user()->roles->contains('title', 'Admin')) {
                   // $query->whereNotNull('id'); 
                } else {
                     
                   // $query->where('user_id', Auth::id());
                }
            })->get();
        
        return view('admin.merchant.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $data = new Marchent();
            $data->user_id = Auth::Id();
            $data->marchent = $request->marchent;
             
            $data->status = $request->status;
             
             
            $data->save();
             
            # set a success message in the session
            session()->flash('success', 'Data has been successfully added!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            # handle validation errors and flash them to the session
            session()->flash('error', implode(' ', $e->validator->errors()->all()));
            return redirect()->back()->withInput(); # redirect back with old input
        } catch (\Exception $e) {
            # log the exception and flash a generic error message
            //dd($e->getMessage());
            \Log::error('Error adding user: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput(); # redirect back with old input
        }

        # redirect to the users index page
        return redirect()->route('admin.merchant.index');
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
        $this->data['edit'] = Marchent::find($id);
        return view('admin.merchant.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = Marchent::find($id);
            $data->user_id = Auth::Id();
            $data->marchent = $request->marchent;
             
            $data->status = $request->status;
             
             
            $data->save();
             
            # set a success message in the session
            session()->flash('success', 'Card has been successfully added!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            # handle validation errors and flash them to the session
            session()->flash('error', implode(' ', $e->validator->errors()->all()));
            return redirect()->back()->withInput(); # redirect back with old input
        } catch (\Exception $e) {
            # log the exception and flash a generic error message
            //dd($e->getMessage());
            \Log::error('Error adding user: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput(); # redirect back with old input
        }

        # redirect to the users index page
        return redirect()->route('admin.merchant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Marchent::find($id);
        $delete->delete();
        session()->flash('warning', 'You have successfully deleted!');
        return back();
    }
}
