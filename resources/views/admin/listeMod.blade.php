@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des modules
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">module</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les module</h4> 
                 <a href="{{url('module/createMod')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add module</button></a><br><br>              
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">                             
                                <th>Libelle</th>
                                <th>Code</th>    
                                <th>Option</th>   
                                <!--<th>Anneé</th> -->     
                                <th>Enseinger Par</th>                 
                                <th>Actions</th>                               
                            </tr>
                          </thead>                                                
                          <tbody>
                            @foreach($modules as $module)

                            <tr> 
                                <input type="hidden" class="serdelete_val_id" value="{{$module->id}}">                               
                                <td>{{$module->libelle}} </td>
                                <td>{{$module->code}}</td>
                                <td>{{$module->libelle_opt}}</td>
                                <td>{{$module->name}} {{$module->prenom}}</td>                               
                                <td class="text-right">
                                  <p>
                                  <button class="btn btn-light button" data-modal="modalOne" >
                                  <i class="fa fa-edit text-success "></i>Edit
                                  </button>                                 
                                 </p>                                                              
                                
                                @if(request()->has('trashed'))
                                <a href="{{ route('module.restore', $module->id_mod) }}" class="btn btn-success">Restore</a>
                                   
                                   <form method="POST" action="{{ route('module.supp', $module->id_mod) }}">
                                         @csrf
                                         <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                     </form>
                                 @else                                
                                     <form method="POST" action="{{ route('module.destroy', $module->id_mod) }}">
                                         @csrf
                                         {{method_field('delete')}}
                                         <input name="_method" type="hidden" value="DELETE">
                                         <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                     </form>
                                      <a href="{{ route('module.update',$module->id_mod) }}" data-bs-toggle="modal" data-bs-target="#module{{$module->id_mod}}"><i class="fa fa-edit text-success "></i></a>
                    
                                @endif
                                  
                                </td>
                            </tr>
                            <div class="modal" id="module{{$module->id_mod}}">
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
                                <form method="POST" action="{{ route('module.update',$module->id_mod) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Libelle:</label>
                                    <input id="libelle_opt" type="text" class="form-control form-little-squirrel-control @error('libelle') is-invalid @enderror" placeholder="Libelle" name="libelle" value="{{$module->libelle}}" autocomplete="libelle"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Code:</label>
                                    <input id="niveau" type="text" class="form-control form-little-squirrel-control @error('code') is-invalid @enderror" placeholder="Code" name="code" value="{{$module->code}}"  autocomplete="code"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                    
                                  </div> 
                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Option:</label>
                                    <select class="form-control" id="exampleSelectGender" name="option" required>
                                         <option value="{{$module->libelle_opt}}">{{$module->libelle_opt}}</option>
                                          @foreach($listeOpt as $option)
                                        <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                          @endforeach
                                </select>  
                                    
                                  </div>
                                  
                                  
                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Enseignat par:</label>
                                    <select class="form-control" id="exampleSelectGender" name="enseignant">
                                      <option value="{{$module->name.' '.$module->prenom}} ">{{$module->name.' '.$module->prenom}}</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} {{$user->prenom}}</option>
                                         @endforeach
                                       </select>   
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
                        <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('module.index') }}" class="btn btn-info">View All modules</a>
                    <a href="{{ route('module.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('module.index', ['trashed' => 'module']) }}" class="btn btn-primary">View Deleted modules</a>
                @endif
            </div>
        </div>
        <!--pop up-->
        <div id="popupContact">
<!-- Contact Us Form -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this module?')) {
                        e.preventDefault();
                    }
                });
            });
        </script>                               
                            
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

<!-- edit -->


 <!-- <script src="../../js/avgrundEns.js"></script>-->
  <!-- End custom js for this page-->
@endsection

