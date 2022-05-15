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
                <!-- <a href="{{url('/createMod')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add module</button></a>-->
                      <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter un module</a><br><br>              
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">                             
                                <th>Libelle</th>
                                <th>Code</th>
                                <th>Semestre</th>    
                                <!--<th>contorle</th>   
                                <th>tp</th> 
                                <th>examen</th> -->    
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
                                <td>{{$module->semestre}}</td>
                                <!--<td>{{$module->controle}}</td>
                                <td>{{$module->tp}}</td>
                                <td>{{$module->examen}}</td>-->
                                <td>{{$module->name}} {{$module->prenom}}</td>                               
                                <td class="text-right">
                                                                                              
                                
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
                                    <input id="libelle" type="text" class="form-control form-little-squirrel-control @error('libelle') is-invalid @enderror" placeholder="libelle" name="libelle" value="{{$module->libelle}}" autocomplete="libelle"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>
                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Code:</label>
                                    <input id="code" type="text" class="form-control form-little-squirrel-control @error('code') is-invalid @enderror" placeholder="code" name="code" value="{{$module->code}}"  autocomplete="code"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>                                   
                                  </div>                                  
                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Semestre:</label>
                                    <select class="form-control" id="exampleSelectGender" name="semestre">
                                         <option value="{{$module->semestre}}">{{$module->semestre}}</option>
                                        <option >S1</option>
                                        <option >S2</option>
                                    </select>  
                                    
                                  </div>
                                  <div class="input-group-icon mb-3">
                                    <label class="form-label col-12" for="inputCategories"> option:</label>
                                    <select class="form-control" id="exampleSelectGender" name="option">
                                      <option value="{{$module->id_opt}}">{{$module->libelle_opt}}</option>
                                      @foreach($listeOpt as $option)
                                       <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                      @endforeach
                                      </select> 
                                  </div> 
                                  <div class="input-group-icon mb-3">
                                    <label class="form-label col-12" for="inputCategories"> Ens par:</label>
                                    <select class="form-control" id="exampleSelectGender" name="enseignant">
                                      <option value="{{$module->id}}">{{$module->name}}{{$module->prenom}}</option>
                                      @foreach($users as $user)
                                       <option value="{{$user->id}}">{{$user->name}}{{$user->prenom}}</option>
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

    <div class="modal" id="wnd">
              <div class="modal-dialog modal-md">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                 
                    <h3 class="font-sans-serif text-center fw-bold fs-1 text-dark mx-auto ms-8"> Remplir les informations </h3>
                    <a class="close"  data-bs-dismiss="modal"aria-label="Close">&times;</a> 
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body mx-auto">
                    <div class="row align-items-center mb-3">
                    
                      
                <form class="needs-validation" method="POST" action="{{ route('module.store') }}" novalidate>
                 @csrf
        
                     
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Libelle:</label>
                        <input id="firstname" class="form-control" name="libelle" type="text" required >
                      </div>
                      <div class="form-group">
                        <label for="lastname">Code:</label>
                        <input id="lastname" class="form-control" name="code" type="text" required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Semestre:</label>
                        <select class="form-control" id="exampleSelectGender" name="semestre" required>
                                <option ></option>
                                <option >S1</option>
                                <option >S2</option>
                                
                        </select>                      
                      </div>
                     </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Option:</label>
                        <select class="form-control" id="exampleSelectGender" name="option" required>
                                 <option value=""></option>
                                 @foreach($listeOpt as $option)
                                <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                 @endforeach
                        </select>                      
                      </div>
                    </div>
                       <div class="form-group">
                        <div class="form-group">                      
                        <label for="firstname">controle:</label>           
                        <input type="checkbox" value="1"  name="controle"/>

                        <label for="firstname">tp:</label>
                        <input type="checkbox" value="1" name="tp"/>

             
                      </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Enseignat par:</label>
                        <select class="form-control" id="exampleSelectGender" name="enseignant" required>
                                 <option></option>
                                 @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}    {{$user->prenom}}</option>
                                 @endforeach
                        </select>                      
                      </div>                          
                      </div>
                      
                      <div class="input-group-icon ms-3 mb-3 mt-7">
          <button class="btn btn-primary form-little-squirrel-control" type="submit">Ajouter</button>
          <i class="fas fa-user-plus amber-text input-box-icon" style="color:white"></i>
         </div>
         </fieldset>
       
      </form>
</div>
  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Annuler</button>
                  </div>

                </div>
              </div>
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

