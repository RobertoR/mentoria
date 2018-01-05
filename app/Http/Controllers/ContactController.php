<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    	$data['name'] = 'Jaime';
    	$data['lastName'] = 'Carreon';    	
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
    	$contact = Contact::find($id);
    	$contact->name = $request->get('name');
    	$contact->save();    	
    	return $contact;    	
    }


}
