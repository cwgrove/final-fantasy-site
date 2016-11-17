<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public static function send($b){
		//Logic will go here     
		$name = $b->name;
        $bio = $b->Bio;

		Mail::send('emails.send', ['name' => $name, 'bio' => $bio], function ($message)
        {
		    $message->from('cgrove@sapphirebd.com', 'Christopher Grove');

            $message->to('cgrove@sapphirebd.com')->subject('A new post has been made');
		});

        return redirect('/');
		
	}
}
