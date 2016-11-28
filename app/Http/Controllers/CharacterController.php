<?php

namespace App\Http\Controllers;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;

//calling in the Character Model Class.
use App\Character;



class CharacterController extends Controller
{

  //Returns all Characters
  public function index()
 {

   //two database call to get two multideminsional objects from the Database
   $a = Character::all()->where('alliance','=','hero');
   $b = Character::all()->where('alliance','=','villain');
   $c = Character::all()->where('alliance','=','summon');

   // passing objects to view.
   return view('public.index',compact('a','b','c'));
 }

 // Returns Hero Characters
 public function hero()
 {
   $a = Character::all()->where('alliance','=','hero');
   return view('public.hero',compact('a'));
 }
 
  // Returns Villain Characters
 public function villain()
 {
   $b = Character::all()->where('alliance','=','villain');
   return view('public.villain',compact('b'));
 }

  // Returns Summon Characters
 public function summon()
 {
   $c = Character::all()->where('alliance','=','summon');
   return view('public.summon',compact('c'));
 }




// Returns individual Character by title
public function show($title)
{
  //taking in  the url and reformatting for db calling
  // need to sanitise
  $title = str_replace('-', ' ', $title);
 $a = Character::all()->where('name','=',$title)->first();
return view('public.single',compact('a'));
}



// Returns admin pages
public function admin()
{
return view('admin.index');
}

public function create()
{
return view('admin.add');
}

//Stores Character values
public function store()
{
	//Set date and unix timestamp to create uniquely name files
	$today = date('m-d-Y');
	$timestamp = time() - date('Z');
	//Capturing Character from form
	$a = request()->all();

	//return $a;
	//capturing request object again.
	$request = request();
	//storing file from Character in variable
	$file = $request->file('uploadedfile');

	//Creating an instance of the Character object
	  $b = new Character;

	  
	  //Checking uploaded file type
	  $filetype = $file->getMimeType();
	  $b->typemime = $filetype;
	  $basefiletype = substr($filetype, 0, 5);

	  
	//Checking Character type
	$alliance = $a['alliance'];
	if($alliance == "hero"){
	  $alliance = 'hero';
	}else if ($alliance == "villain"){
	  $alliance = 'villain';
	} else {
	  $alliance = 'summon';
	}

	//Assigning values // need to sanitise.
	  $b->name = $a['name'];
	  $b->origin = $a['Origin'];
	  $b->alliance = $a['alliance'];
	  $b->bio = $a['Bio'];
	  $b->age = $a['age'];
	  $b->blood = $a['blood'];
	  
	  
	//File management
	if (!empty($file)) {
	  $f = $_FILES['uploadedfile'];
	  $fname = $f['name'];

	  $dpath = public_path("resources");

	  $p = $file->move($dpath,$today.' '.$timestamp.'-'.$fname );
	  $b->uploadedfile = "/resources/".$today.' '.$timestamp.'-'.$fname;
	}
		$b->alliance = $alliance;
		$b->postauthor = 'admin';
	
	if ($basefiletype == 'video'){
		
		$video = $p . escapeshellcmd($_FILES['uploadedfile']['name']);

		$cmd = "ffmpeg -i $video 2>&1";
		$second = 1;
		if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
			$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
			$second = rand(1, ($total - 1));
		}

		$image  = $dpath.'/thumbnails/'.$today.' '.$timestamp.'-'.$fname;
		$cmd = "ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
		//$do = $cmd;
		shell_exec($cmd);

		
	}



	//saving new object
			$b->save();

	EmailController::send($b);
		//returns to edit the Character that was just created

		//CODE NEEDS TO BE REFACTORED
		$i = $b->id;

	return redirect('/share/edit/'.$i);

}



public function edit($id)
{
  $a = Character::find($id);
  return view('admin.edit',compact('a'));
}

//basically the same as store
public function update($id)
{
  $b = Character::find($id);
  $c = request()->all();
  $d = request();
  $file = $d->file('uploadedfile');

  	  //Checking uploaded file type
	  $filetype = $file->getMimeType();
	  $b->typemime = $filetype;
	//Set date and unix timestamp to create uniquely name files
	$today = date('m-d-Y');
	$timestamp = time() - date('Z');

  //Checking Character type
$alliance = $c['alliance'];
if($alliance == "hero"){
  $alliance = 'hero';
}else if ($alliance == "villain"){
  $alliance = 'villain';
} else {
  $alliance = 'summon';
}

//Creating an instance of the Character object
  //$b = new Character;
//Assigning values // need to sanitise.
  $b->name = $c['name'];
  $b->origin = $c['Origin'];
  $b->alliance = $c['alliance'];
  $b->bio = $c['Bio'];
  $b->age = $c['age'];
  $b->blood = $c['blood'];
  
  $b->alliance = $alliance;



  //File Management
  if (!empty($file)) {
    $f = $_FILES['uploadedfile'];
    $fname = $f['name'];

    $dpath = public_path("resources");
    //$p = $file->move($dpath,$fname);
	$p = $file->move($dpath,$today.' '.$timestamp.'-'.$fname );
	$b->uploadedfile = "/resources/".$today.' '.$timestamp.'-'.$fname;
  }
		$b->postauthor = 'admin';
		$b->save();
  		return back();
}


// needs to only show users Characters. 
public function allCharacters()
{
   $a = Character::all();

  return view('admin.list', compact('a'));
}
public function archive($id)
{
  $b = Character::find($id);
  $b->poststatus = "archived";
  $b->save();
  return $b;
}



}
