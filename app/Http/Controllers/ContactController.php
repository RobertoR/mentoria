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
    	$data['record'] = Contact::find($id);    	
        return view('contact.edit',$data);
    }
    public function update(ContactRequest $request,$id){
        $user = $request->user();       
        dd($user->role_id);

    	$contact = Contact::find($id);
    	$contact->update($request->all());
    	return redirect()->route('contact.edit',['id' => $id]);    	
    }

    public function destroy($id){
    	$contact = Contact::find($id);
    	$contact->delete();
    }

}
