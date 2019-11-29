<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Session;
use App\Reservation;
class ReservationsController extends Controller
{
    public function reserve(Request $request)
	{
        $this->validate($request,[
			'name'=>'required',
			'phone'=>'required',
			'email'=>'required|email',
			'dateandtime'=>'required'
		]);
		     $reserv=new Reservation();
			 $reserv->name=$request->name;
             $reserv->phone=$request->phone;
             $reserv->email=$request->email;
		     $reserv->date_and_time=$request->dateandtime;
             $reserv->message=$request->message;
		     $reserv->status=false;
			 $reserv->save();
		
		Toastr::success('your reservaton sent succsessfully', 'Success', ["positionClass" => "toast-top-right"]);
		return redirect()->back();
		
}

public function editReserve(Request $request , $id=null)
    {    
        
    if($request->isMethod('post'))
        {
            $data =$request->all();
            Reservation::where(['id'=>$id])->update(['name'=>$data['name'],
            'email'=>$data['email'],'phone'=>$data['phone'],
			'message'=>$data['message']]);
        return redirect('/admin/view-reserve')->with('flash_message_success','reservation updated Successfully !!!');
    
    }   
         $reserve=Reservation::where(['id'=>$id])->first();
         return view('admin.reservations.edit_reserve')->with(compact('reserve'));
     }
    
     public function deleteReserve($id=null)
    {    
        
    if(!empty($id))
    {
        Reservation::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Reservation deleted Successfully !!!');
    }
  }
 public function viewReserve(Request $request)
    {   
         $reserves=Reservation::get();
         return view('admin.reservations.view_reserve')->with(compact('reserves'));
    }


}
