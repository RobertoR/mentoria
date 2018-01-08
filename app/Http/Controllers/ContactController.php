<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
		$locals = false;    	
    	$data['contacts'] = Contact::with('phones')->get();    	    	
        return view('contact.contact_list',$data);	
    }

    public function show($id)
    {    	
        return $id;
    }

    public function edit($id)
    {    	
    	$data['id'] = $id;
        return view('contact.edit',$data);
    }
    public function update(Request $request,$id){
    	
    	return $contact;    	
    }

    public function destroy($id){
    	$contact = Contact::find($id);
    	$contact->delete();
    }

}
