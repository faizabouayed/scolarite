@extends('layouts.MenuAdmin')
@Section('content')
      <form action= "{{url('Admin-User/'. $user->id)}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	{{ csrf_field()}}
	
           <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Prenom</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="prenom"value="{{$user->prenom}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Date</label>
                      <input type="date" class="form-control" id="exampleInputPassword4" name="date_n" value="{{$user->date_n}}">
                    </div>
                    <!--<div class="form-group">
                      <label for="exampleSelectGender">Grade</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="grade" value="{{$user->grade}}">
                        <!--<select class="form-control" id="exampleSelectGender"  value="{{$user->grade}}">
                          <option>Maître assistant (A)</option>
                          <option>Maître de conférences (B)</option>
                          <option>Maître assistant (B)</option>
                        </select>-->
                  <!--  </div>-->
                    <!--<div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>-->
                    <!--<div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div>-->
                    <!--<div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>-->
                    <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</form>
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
   @endsection
  
  