<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Video;
class VideoController extends Controller
{
	public function create()
	{
		return view('admin.video');
	}
	
	
	
	public function generate()
	{
		//Set date and unix timestamp to create uniquely name files
		$today = date('m-d-Y');
		$timestamp = time() - date('Z');
		//Capturing form
		$a = request()->all();

		//capturing request object again.
		$request = request();
		//storing file from Character in variable
		$video = $request->file('cimage');
		//Create new Video Object
		$b = new Video;

		//File management
		if (!empty($video)) {

			$f = $_FILES['cimage'];
			$fname = $f['name'];

		    $dpath = public_path("resources");
		    $p = $video->move($dpath,$today.' '.$timestamp.'-'.$fname );

		    $b->cimage = $p;

		}			
			$b->save();	

			
		    //$i = $b->id;
			//return redirect('/share/edit/'.$i);
		
	}
	
}
