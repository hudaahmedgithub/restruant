<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    
    public function index()
    {
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
      $contact=Contact::find($id);
		return view('admin.contact.show',compact('contact'));
    }

   
    public function update(Request $request, $id)
    {
	  
		
    }

    public function destroy($id)
    {
       Contact::find($id)->delete();
		return redirect()->route('contact.index')->with('success',' your contact is deleted');
    }
}
