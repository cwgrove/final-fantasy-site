@extends('layouts.admin')

@section('content')



<!----------

Summon Section

------------>
<div class="row">
	<div class="container">
    <h1>Summons</h1>
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


@endsection
