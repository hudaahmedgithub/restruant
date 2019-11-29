<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
class ContactController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request,[
			'name'=>'required',
			'email'=>'required',
			'subject'=>'required',
			'message'=>'required'
		]);
		$contact=new Contact();
		$contact->name=$request->name;
		$contact->email=$request->email;
		$contact->subject=$request->subject;
		$contact->message=$request->message;
        $contact->save();
	      
		Toastr::success('your contact sent succsessfully', 'Success', ["positionClass" => "toast-top-right"]);
		 	 
		return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
