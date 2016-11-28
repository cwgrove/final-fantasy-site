@extends('layouts.admin')
@section('content')

<form action='/share/video' method='post' enctype="multipart/form-data">
<fieldset>
<!-- Form Name -->
<legend>Video Upload</legend>
{{ csrf_field() }}

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="uploaded-video">Video Upload</label>
  <div class="col-md-4">
    <input id="cimage" name="cimage" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

@endsection
