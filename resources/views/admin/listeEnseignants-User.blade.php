
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->      
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
                  <div class="row grid-margin"> 
                  <a href="{{url('Enseignants-User/create')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add User</button></a>
                     </div>              
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
                            @foreach($users as $user)

                            <tr> 
                           <input type="hidden" class="serdelete_val_id" value="{{$user->id}}">
                                <td class="py-1">{{$user->photo}}</td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->date_n}}</td>
                                <td>
                                  <label class="badge badge-success">{{$user->grade}}</label>
                                </td>
                                <td class="text-right">

                                <a href="{{url('Enseignants-User/'.$user->id.'/shwo')}}">
                                 <button class="btn btn-light" onclick="window.location.href='/Profile-Ens';">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                </a>
                                  <a href="{{ route('Enseignants-User.update',$user->id) }}" data-bs-toggle="modal" data-bs-target="#user{{$user->id}}"><i class="fa fa-edit text-success "></i></a>                                                                      
                                </td> 

                            </tr> 
                            

                       <div class="modal" id="user{{$user->id}}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">         
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h3 class="font-sans-serif text-center fw-bold fs-1 text-dark mx-auto ms-8"> Modifier les informations </h3>
                                <a class="close"  data-bs-dismiss="modal"aria-label="Close">&times;</a> 
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body mx-auto">
                              <div class="row align-items-center mb-3">
                                <form method="POST" action="{{ route('Enseignants-User.update',$user->id) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Nom</label>
                                    <input id="name" type="text" class="form-control form-little-squirrel-control @error('name') is-invalid @enderror" placeholder="Nom" name="name" value="{{$user->name}}" autocomplete="name"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Prénom:</label>
                                    <input id="prenom" type="text" class="form-control form-little-squirrel-control @error('prenom') is-invalid @enderror" placeholder="Prenom" name="prenom" value="{{$user->prenom}}"  autocomplete="prenom"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                    
                                  </div>
                                 
                                  <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">Date de naissance:</label>
                                    <input id="prenom" type="date" class="form-control form-little-squirrel-control @error('date_n') is-invalid @enderror" placeholder="date_de_naissance" name="date_n" value="{{$user->date_n}}"  autocomplete="date_n"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div> 
                                  
                                  <div class="input-group-icon mb-3">
                                    <label class="form-label col-12" for="inputCategories"> Grade:</label>
                                    <input id="prenom" type="text" class="form-control form-little-squirrel-control @error('prenom') is-invalid @enderror" placeholder="date_de_naissance" name="grade" value="{{$user->grade}}"  autocomplete="Grade"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div>  
                                     
                                  <div class="input-group-icon ms-3 mb-3 mt-7">                                 
                                  <button class="btn btn-primary form-little-squirrel-control"  type="submit" size="30" maxlength="10" style="border-radius:5px; position:absolute; " >Modifier</button>
                                  </div>
                                </form>          
                              </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fermer</button>
                            </div>          
                          </div>
                        </div>
                      </div>
          
                            @endforeach                          
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>

    
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/data-table.js"></script>
   <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>

  
  <!--<script src="../../js/alerts.js"></script>-->
  <!-- <script src="../../js/delete.js"></script>-->
  <meta name="csrf-token" content="{{ csrf_token() }}">






 <!-- <script src="../../js/avgrundEns.js"></script>-->
  <!-- End custom js for this page-->
@endsection








