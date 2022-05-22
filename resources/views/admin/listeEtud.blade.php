
@extends('layouts.MenuAdmin')
@Section('content')

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script>
    jQuery(document).ready(function($) {
      $('#example').DataTable(
        {
        dom: 'Bfrtip',
        buttons: [
                    
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
              }
      );
     
    } );
    
    </script>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Etudiants
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Etudiant</a></li>
                <li class="breadcrumb-item"><a href="#">Liste des étudiants</a></li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les étudiants</h4> 
                  <div class="row grid-margin">
                  <!--<a href="{{url('liste-des-etudiants/createEtud')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add étudiant</button></a>
                      -->
                      <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter un enseignant</a>
                   </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table  id="example" class="table" >
                          <thead>
                         

                            <tr class="bg-primary text-white">
                                <th class="not-export-col">Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Date d'inscription</th>
                                <th>Promo</th>
                                <th>Option</th>
                                <th class="not-export-col">Actions</th>
                            </tr>
                          </thead>
                          @foreach($etudiants as $etudiant)
                          <tbody>
                            <tr>
                                <td><img src="/telechargement/avatar/{{$etudiant->photo}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="300">
                                </td>
                                <td>{{$etudiant->nom}}</td>
                                <td>{{$etudiant->prenom}}</td>
                                <td>{{$etudiant->date_de_naissance}}</td>
                                <td>{{$etudiant->date_inscription}}</td>
                                <td>{{$etudiant->libelle_pr}}</td>
                                <td>{{$etudiant->libelle_opt}}</td>
            
                                <td class="text-right">
                            
                                  @if(request()->has('trashed'))
                                    <a href="{{ route('etudiants.restore', $etudiant->id_etud) }}" class="btn btn-success">Restore</a>
                                   
                                  
                                  <form method="POST" action="{{ route('etudiants.supp', $etudiant->id_etud) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                  @else                                
                                    <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id_etud) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'><i class=" fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('etudiants.update',$etudiant->id_etud) }}" data-bs-toggle="modal" data-bs-target="#etudiant{{$etudiant->id_etud}}"><i class="fa fa-edit text-success "></i></a>
                                    <a href="{{url('Relever',[$etudiant->id_etud,$etudiant->promo,$etudiant->option])}}">
                                     <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                     </button></a>
                                   @endif
                                  
                                </td>
                                
                            </tr>
                            
                          </tbody>
                          <div class="modal" id="etudiant{{$etudiant->id_etud}}">
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('etudiants.update',$etudiant->id_etud) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')

                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Nom:</label>
                                    <input id="nom" type="text" class="form-control form-little-squirrel-control @error('nom') is-invalid @enderror" placeholder="Nom" name="nom" value="{{$etudiant->nom}}" autocomplete="nom"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Prénom:</label>
                                    <input id="prenom" type="text" class="form-control form-little-squirrel-control @error('prenom') is-invalid @enderror" placeholder="Prenom" name="prenom" value="{{$etudiant->prenom}}"  autocomplete="prenom"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                    
                                  </div>
                                 
                                  <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">Date de naissance:</label>
                                    <input id="date" type="date" class="form-control form-little-squirrel-control @error('date_de_naissance') is-invalid @enderror" placeholder="date_de_naissance" name="date_de_naissance" value="{{$etudiant->date_de_naissance}}"  autocomplete="date_de_naissance"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div> 
                                  
                                  <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">date_inscription:</label>
                                    <input id="date" type="date" class="form-control form-little-squirrel-control @error('date_inscription') is-invalid @enderror" placeholder="date_inscription" name="date_inscription" value="{{$etudiant->date_inscription}}"  autocomplete="date_inscription"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div> 
                                  <div class="input-group-icon mb-3">
                                    <label class="form-label col-12" for="inputCategories"> Promo:</label>
                                    <select class="form-control" id="exampleSelectGender" name="promo" required>
                                      @foreach($listePromo as $promo)
                                       <option value="{{$promo->id_pr}}">{{$promo->libelle_pr}}</option>
                                      @endforeach
                                      </select> 
                                  </div>

                                  
                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Insérer une nouvelle photo </label>
                                    <input id="photo" type="file" name="photo">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


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
                        </table>
                        <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('etudiants.index') }}" class="btn btn-info">View All etudiants</a>
                    <a href="{{ route('etudiants.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('etudiants.index', ['trashed' => 'etudiant']) }}" class="btn btn-primary">View Deleted etudiants</a>
                @endif
            </div>
        </div>
        <!--pop up-->
        <div id="popupContact">
<!-- Contact Us Form -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this student?')) {
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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
                    
                      
                <form class="needs-validation" method="POST" action="{{ route('etudiants.store') }}" novalidate>
      @csrf
        
                     
                    <fieldset>
                  <!--<div class="file btn btn-lg btn-primary">
                          <input type="file" name="photo"/>
                      </div>-->
                      <div class="form-group">
                        <label for="firstname">Nom:</label>
                        <input id="firstname" class="form-control" name="nom" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Prenom:</label>
                        <input id="lastname" class="form-control" name="prenom" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">date de naissance:</label>
                        <input id="firstname" class="form-control" name="date_de_naissance" type="date" required>
                      </div>   
                      <div class="form-group">
                        <label for="firstname">date_inscription:</label>
                        <input id="firstname" class="form-control" name="date_inscription" type="date" required>
                      </div>                    
                      <div class="form-group">
                       <select class="form-control" id="exampleSelectGender" name="promo" required>
                                      <option ></option>
                                      @foreach($listePromo as $promo)
                                       <option value="{{$promo->id_pr}}">{{$promo->libelle_pr}}</option>
                                      @endforeach
                                      </select> 
                      </div>
                      <div class="form-group"> 
                                    <label class="form-label col-12" for="inputCategories">Insérer une nouvelle photo </label>
                                    <input id="photo" type="file" name="photo">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


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
  <!-- End custom js for this page-->


  
   <script src="../../js/alerts.js"></script>
  <script src="../../js/avgrund.js"></script>
  @endsection