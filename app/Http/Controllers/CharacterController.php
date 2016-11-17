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
   return view('public.heroes',compact('a'));
 }
 
  // Returns Villain Characters
 public function villain()
 {
   $a = Character::all()->where('alliance','=','villain');
   return view('public.villains',compact('a'));
 }

  // Returns Summon Characters
 public function summon()
 {
   $a = Character::all()->where('alliance','=','summon');
   return view('public.summons',compact('a'));
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
//Capturing Character from form
$a = request()->all();

//return $a;
//capturing request object again.
$request = request();
//storing file from Character in variable
$file = $request->file('cimage');

//Creating an instance of the Character object
  $b = new Character;

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
  $f = $_FILES['cimage'];

  $fname = $f['name'];

  $dpath = public_path("resources");
  $p = $file->move($dpath,$fname);
  $b->cimage = "/resources/".$fname;
}
  	$b->alliance = $alliance;
    $b->postauthor = 'admin';

    $request = request();

    $file = $request->file('cimage');


//saving new object
//return $b;
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
  $file = $d->file('cimage');

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



  
  if (!empty($file)) {
    $f = $_FILES['cimage'];
    $fname = $f['name'];

    $dpath = public_path("resources");
    $p = $file->move($dpath,$fname);
    $b->cimage = "/resources/".$fname;
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
