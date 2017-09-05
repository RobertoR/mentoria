<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class Uploads extends Controller
{
    public function upload(Request $request)

	{

	    $this->validate($request, [
	    	'id' => 'required|integer|exists:images,id',
	        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

	    ]);

	    $imageFile = Image::find($request->get('id'));

	    $image = $request->file('image');

	    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

	    $destinationPath = public_path('/images');

	    $moved = $image->move($destinationPath, $input['imagename']);
	  	
	  	if($moved){	  		
	  		$imageFile->filename = $input['imagename'];
	  		$imageFile->save();
	  	}

	    return redirect()->route('products.edit',['id'=> $imageFile->product_id]);

	}
}
