<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {		    	
        $contacts = Contact::with('phones')->get();    	    	
        return $contacts;	
    }

    public function show($id)
    {    	
        $contact = Contact::find($id);
        return $contact;
    }

    public function edit($id)
    {    	
    	$data['id'] = $id;
    	$data['record'] = Contact::find($id);    	
        return view('contact.edit',$data);
    }
    public function update(ContactRequest $request,$id){
        $user = $request->user();               

    	$contact = Contact::find($id);
    	$contact->update($request->all());
    	return $contact;    	
    }

    public function destroy($id){
    	$contact = Contact::find($id);
    	$contact->delete();
    }

}
