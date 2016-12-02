@extends('layouts.admin')



@section('content')


<form method="post" action="/share/edit/{{$a->id}}" class="form-horizontal" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Character Creation</legend>
{{ csrf_field() }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" value="{{$a->name}}" class="form-control input-md" required="">
    
  </div>
</div>

<?php
  
		$filetype = $a->typemime;
		$basefiletype = substr($filetype, 0, 5);

	  
	if ($basefiletype == 'image'){
	?>
		<div class="form-group">
			<label class="col-md-4 control-label" for="uploadedfile">Current Character Image</label>
			<div class="col-md-4">
				<img src="{{$a->uploadedfile}}" style="width:300px;">
			</div>
		</div>
	<?php
	  } else {
	?>
		<div class="form-group">
			<label class="col-md-4 control-label" for="uploadedfile">Current Character Video</label>
			<div class="col-md-4">
				<video width="400" controls>
					<source src="{{$a->uploadedfile}}" type="{{$filetype}}">
					Your browser does not support HTML5 video.
				</video>
			</div>
		</div>
	<?php } ?>



<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="uploadedfile">Character Image/Video</label>
  <div class="col-md-4">
    <input id="uploadedfile" name="uploadedfile" class="input-file" type="file">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Origin">Origin</label>
  <div class="col-md-4">
    <select id="Origin" name="Origin" class="form-control">
      <option value="1">Final Fantasy I</option>
      <option value="2">Final Fantasy II</option>
      <option value="3">Final Fantasy III</option>
      <option value="4">Final Fantasy IV</option>
      <option value="5">Final Fantasy V</option>
      <option value="6">Final Fantasy VI</option>
      <option value="7">Final Fantasy VII</option>
      <option value="8">Final Fantasy VIII</option>
      <option value="9">Final Fantasy IX</option>
      <option value="10">Final Fantasy X</option>
      <option value="11">Final Fantasy XI</option>
      <option value="12">Final Fantasy XII</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="alliance">Alliance</label>
  <div class="col-md-4">
    <select id="alliance" name="alliance" class="form-control">
	  <option value="none">None</option>
      <option value="hero">Hero</option>
      <option value="villain">Villain</option>
      <option value="summon">Summon</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Bio">Bio</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Bio" name="Bio">{{$a->bio}}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="age">Age</label>  
  <div class="col-md-4">
  <input id="age" name="age" type="text" value="{{$a->age}}" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="blood">Blood Type</label>
  <div class="col-md-4">
    <select id="blood" name="blood" class="form-control">
      <option value="Unknown">Unknown</option>
      <option value="A-positive">A-positive</option>
      <option value="A-negative">A-negative</option>
      <option value="B-positive">B-positive</option>
      <option value="B-negative">B-negative</option>
      <option value="AB-positive">AB-positive</option>
      <option value="AB-negative">AB-negative</option>
      <option value="O-positive">O-positive</option>
      <option value="O-negative">O-negative</option>
    </select>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sub">Submit</label>
  <div class="col-md-4">
    <button id="sub" name="sub" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

<!-- Set Origin Drop down -->
<?php
$editblood = $a->blood;
$editorigin = $a->origin - 1;
?>
<script>
document.getElementById('Origin').selectedIndex = "<?php echo $editorigin;?>";
</script>

<!-- Set the Alliance Drop down -->
<?php
$editalliance = $a->alliance;
if ($editalliance == "hero"){
	?>
	<script>
	document.getElementById('alliance').selectedIndex = "1";
	</script>
	<?php
} else if ($editalliance == "villain"){
	?>
	<script>
	document.getElementById('alliance').selectedIndex = "2";
	</script>
	<?php
} else if ($editalliance == "summon"){
	?>
	<script>
	document.getElementById('alliance').selectedIndex = "3";
	</script>
	<?php
} else {
	?>
	<script>
	document.getElementById('alliance').selectedIndex = "0";
	</script>
	<?php
}
?>








<!-- Set the Blood Type Drop Down -->
<?php
$editblood = $a->blood;
if ($editblood == "A-positive"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "1";
	</script>
	<?php
} else if ($editblood == "A-negative"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "2";
	</script>
	<?php
} else if ($editblood == "B-positive"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "3";
	</script>
	<?php
}  else if ($editblood == "B-negative"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "4";
	</script>
	<?php
} else if ($editblood == "AB-positive"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "5";
	</script>
	<?php
} else if ($editblood == "AB-negative"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "6";
	</script>
	<?php
} else if ($editblood == "O-positive"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "7";
	</script>
	<?php
} else if ($editblood == "O-negative"){
	?>
	<script>
	document.getElementById('blood').selectedIndex = "8";
	</script>
	<?php
}else {
	?>
	<script>
	document.getElementById('blood').selectedIndex = "0";
	</script>
	<?php
} 

?>




















@endsection
