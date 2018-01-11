<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsAppController extends Controller
{
    public function index(){
    	return view('contact.contact_list_a');	
    }
}
