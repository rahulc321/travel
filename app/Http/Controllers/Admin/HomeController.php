<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Leads;
use App\Card;
use App\User;

class HomeController
{
    public function index()
    {   
        $this->data['user_count'] = Leads::where(function ($query) {
            
                if (Auth::user()->roles->contains('title', 'Admin')) {
                    $query->whereNotNull('id'); 
                } else {
                     
                    $query->where('user_id', Auth::id());
                }
            })->count(); 

        $this->data['card_count'] = Card::where(function ($query) {
            
                if (Auth::user()->roles->contains('title', 'Admin')) {
                    $query->whereNotNull('id'); 
                } else {
                     
                    $query->where('user_id', Auth::id());
                }
            })->count();


        $this->data['total_revenue'] = Leads::where(function ($query) {
                # check if the user has the Admin role
                if (Auth::user()->roles->contains('title', 'Admin')) {
                    $query->whereNotNull('id');
                } else {
                    # filter by the current user's ID
                    $query->where('user_id', Auth::id());
                }
            })
            ->selectRaw("SUM(CASE WHEN status = 'chargeback' THEN -charge_amount ELSE charge_amount END) as total")
            ->value('total'); # fetch the calculated total
            

        if (Auth::user()->roles->contains('title', 'Admin')) {
            $this->data['users'] = User::with('leads')->get();
        }else{
            $this->data['users'] = User::with('leads')->where('id',Auth::Id())->get();
        }

        return view('home',$this->data);
    }
}
