<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;
use App\Reservation;
class ReservationController extends Controller
{
    public function index()
    {
		$reservs=Reservation::all();
        return view('admin.reservation.index',compact('reservs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function status($id)
    {
        $reserv=Reservation::find($id);
		$reserv->status=true;
		$reserv->save();
	    Notification::route('mail',$reserv->email)
          ->notify(new ReservationConfirmed());
		
	return redirect()->route('reservation.index')->with('success','the reservation is verified');
		 	 return redirect()->back();
    }
	
	 public function destroy($id)
    {
		Reservation::find($id)->delete(); 
		 		
	return redirect()->route('reservation.index')->with('success','the reservaion is deleted');
	 }
}
