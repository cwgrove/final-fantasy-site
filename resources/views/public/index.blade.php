@extends('layouts.admin')

@section('content')

<!----------

Hero Section

------------>
<div class="row">
	<div class="container">

	<h1>Characters</h1>
    <br>
    <h2>Heroes</h2>
    @foreach ($a as $hero)

		<?php
		$posturl = $hero->name;
		$series = str_replace(' ', '-', $posturl);

		//Get Mime type
			$filetype = $hero->typemime;
			$basefiletype = substr($filetype, 0, 5);

			 //Display image based on mime type 
			if ($basefiletype == 'image'){
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				  <img width="250px" src="{{ $hero->uploadedfile }}"/>
				  <h3>{{ $hero->name }}</h3>
				  <p>{{ $hero->bio }}</p>
				</a>
			</div>
			<?php
			  } else {
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				<video width="400" controls>
					<source src="{{$hero->uploadedfile}}" type="{{$filetype}}">
					Your browser does not support HTML5 video.
				</video>
				<p>{{ $hero->bio }}</p>
				</a>
			</div>
			<?php } ?>


  @endforeach


</div>
</div>


<hr/>


<!----------

Villain Section

------------>
<div class="row">
	<div class="container">

    <h2>Villains</h2>
    @foreach ($b as $villain)

		<?php
		$posturl = $villain->name;
		$series = str_replace(' ', '-', $posturl);

		//Get Mime type
			$filetype = $villain->typemime;
			$basefiletype = substr($filetype, 0, 5);

			 //Display image based on mime type 
			if ($basefiletype == 'image'){
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				  <img width="250px" src="{{ $villain->uploadedfile }}"/>
				  <h3>{{ $villain->name }}</h3>
				  <p>{{ $villain->bio }}</p>
				</a>
			</div>
			<?php
			  } else {
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				<video width="400" controls>
					<source src="{{$villain->uploadedfile}}" type="{{$filetype}}">
					Your browser does not support HTML5 video.
				</video>
				<p>{{ $villain->bio }}</p>
				</a>
			</div>
			<?php } ?>


  @endforeach


</div>
</div>


<hr/>

<!----------

Summon Section

------------>
<div class="row">
	<div class="container">
    <h2>Summons</h2>
    @foreach ($c as $summon)

		<?php
		$posturl = $summon->name;
		$series = str_replace(' ', '-', $posturl);

		//Get Mime type
			$filetype = $summon->typemime;
			$basefiletype = substr($filetype, 0, 5);

			 //Display image based on mime type 
			if ($basefiletype == 'image'){
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				  <img width="250px" src="{{ $summon->uploadedfile }}"/>
				  <h3>{{ $summon->name }}</h3>
				  <p>{{ $summon->bio }}</p>
				</a>
			</div>
			<?php
			  } else {
			?>
			<div class="col-xs-4">
				<a href="{{ $series }}">
				<video width="400" controls>
					<source src="{{$summon->uploadedfile}}" type="{{$filetype}}">
					Your browser does not support HTML5 video.
				</video>
				<p>{{ $summon->bio }}</p>
				</a>
			</div>
			<?php } ?>


  @endforeach


</div>
</div>


<hr/>

@endsection
