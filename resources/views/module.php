
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des Modules
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Modules</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Modules</h4> 
                 <!-- <a href="{{url('Enseignants-User/create')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add Modules</button></a><br><br> -->             
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">                             
                                <th>Libelle</th>
                                <th>Code</th>
                               
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Grade</th>
                                <th>Actions</th>
                                
                            </tr>
                          </thead>                                                
                          <tbody>
                            @foreach($modules as $module)

                            <tr> 
                                <input type="hidden" class="serdelete_val_id" value="{{$module->id}}">
                                
                                <td>{{$module->libelle_opt}} </td>
                                <td>{{$module->code}}</td>
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td>
                                  <label class="badge badge-success">{{$user->grade}}</label>
                                </td>
                                <td class="text-right">
                                  <p>
                                  <button class="btn btn-light button" data-modal="modalOne" >
                                  <i class="fa fa-edit text-success "></i>Edit
                                  </button>
                                  
                                 </p>                                
                              
                                </td>                                
                            </tr> 
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
 
@endsection








