@extends('layouts.admin')

@section('content')

<!----------

Hero Section

------------>
<div class="row">
	<div class="container">

    <h1>Heroes</h1>
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

@endsection
