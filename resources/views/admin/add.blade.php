@extends('layouts.admin')



@section('content')

<form method="post" action="/share/add" class="form-horizontal" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Character Creation</legend>
{{ csrf_field() }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
    
  </div>
</div>

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
    <textarea class="form-control" id="Bio" name="Bio"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="age">Age</label>  
  <div class="col-md-4">
  <input id="age" name="age" type="text" placeholder="27" class="form-control input-md">
    
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



@endsection
