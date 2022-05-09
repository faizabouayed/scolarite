
@extends('layouts.MenuAdmin')
@Section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
        <meta charset="utf-8">     
   </head>   
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des Enseignants
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Enseignants</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Enseignants</h4> 
                  <a href="{{url('Enseignants-User/create')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add User</button></a><br><br>              
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        
                        
                         <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">                             
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                          </thead>                                                
                          <tbody>
                            
                    </tbody>                                                  
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

    
  
  
  
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <form action= "{{url('Enseignants-User/'. $users->id)}}" method="POST">
  <input type="hidden" name="_method" value="PUT">
  {{ csrf_field()}}
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modification</h5>
                 <a href="{{url('/Enseignants-User')}}">
                <a href="{{url('/Enseignants-User')}}">
                 <i class="fa fa-times"></i></a></a>
            </div>
            <div class="modal-body">
                <!--<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                    
                  </p>-->
                    <div class="form-group">
                      <label for="exampleInputName1">Name:</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$users->name}}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Prénom:</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="prenom" value="{{$users->prenom}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Date de naissance:</label>
                      <input type="date" class="form-control" id="exampleInputPassword4" name="date_n" value="{{$users->date_n}}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Grade:</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="grade" value="{{$users->grade}}" >
                    </div>                
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary mr-2">Edit</button>
              <button class="btn btn-light">Cancel</button>
            </div>
            <!--</div>
                </div>
              </div>-->
            </div>
            </div>
        </div>
    </div>
  </form>
    <script>
      
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>

  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  
  <script src="../../js/data-table.js"></script>
   <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
</body>
</html>
@endsection
