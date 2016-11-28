@extends('layouts.admin')

@section('content')

<!----------

Villain Section

------------>
<div class="row">
	<div class="container">

    <h1>Villains</h1>
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

@endsection
