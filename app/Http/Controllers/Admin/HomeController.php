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
            
                if (Auth::user()->roles->contains('title', 'Admin')) {
                    $query->whereNotNull('id'); 
                } else {
                     
                    $query->where('user_id', Auth::id());
                }
            })->sum('charge_amount');

        if (Auth::user()->roles->contains('title', 'Admin')) {
            $this->data['users'] = User::with('leads')->get();
        }else{
            $this->data['users'] = User::with('leads')->where('id',Auth::Id())->get();
        }

        return view('home',$this->data);
    }
}
