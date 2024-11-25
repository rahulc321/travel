<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leads;
use Auth;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->data['leads'] = Leads::where(function ($query) {
            
                if (Auth::user()->roles->contains('title', 'Admin')) {
                    $query->whereNotNull('id'); 
                } else {
                     
                    $query->where('user_id', Auth::id());
                }
            })->get();
        
        return view('admin.leads.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leads.create');
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

            $lead = new Leads();
            $lead->user_id = Auth::Id();
            $lead->travel_type = $request->travel_type;
            $lead->travel_date = $request->travel_date;
            $lead->from_station = $request->from_station;
            $lead->to_station = $request->to_station;
            $lead->phone = $request->phone;
            $lead->email = $request->email;
            $lead->charge_amount = $request->charge_amount;
            $lead->passenger_name = $request->passenger_name;
            $lead->save();
             
            # set a success message in the session
            session()->flash('success', 'Lead has been successfully added!');
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
        return redirect()->route('admin.lead.index');
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
        $this->data['edit'] = Leads::find($id);
        return view('admin.leads.edit',$this->data);
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

            $lead = Leads::find($id);
            $lead->travel_type = $request->travel_type;
            $lead->travel_date = $request->travel_date;
            $lead->from_station = $request->from_station;
            $lead->to_station = $request->to_station;
            $lead->phone = $request->phone;
            $lead->email = $request->email;
            $lead->charge_amount = $request->charge_amount;
            $lead->passenger_name = $request->passenger_name;
            $lead->save();
             
            # set a success message in the session
            session()->flash('success', 'Lead has been successfully updated!');
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
        return redirect()->route('admin.lead.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $delete = Leads::find($id);
        $delete->delete();
        session()->flash('warning', 'You have successfully deleted!');
        return back();
    }
}
