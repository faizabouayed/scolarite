@extends('layouts.MenuAdmin')
@Section('content')      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Liste des Etudiants
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Etudiant</li>
                <li class="breadcrumb-item active" aria-current="page">Options</li>
                <li class="breadcrumb-item active" aria-current="page">Promotions</li>
                <li class="breadcrumb-item"><a href="#">Liste des etudiants</a></li>


              </ol>
            </nav>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Etudiants de {{$promotion->libelle_pr}}
                   <!-- <button type="button" class="btn btn-danger btn-icon-text">
                      <i class="fa fa-upload btn-icon-prepend"></i>                                                    
                      Upload
                    </button> !-->
                   <!-- <button type="button" class="btn btn-info btn-icon-text">
                      Print
                      <i class="fa fa-print btn-icon-append"></i>                                                                              
                    </button>-->
                  </h4> 
                  <div>
                    <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter une promo
                   </a>
<!--<a href="{{url('createprEtud',$promotion->libelle_pr)}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouveau Etudiant</button></a>-->
</div>
                  
                  <div class="row grid-margin">
                    
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
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($etudiants as $etudiant)
                            <tr>
                              <td><img src="/telechargement/avatar/{{$etudiant->photo}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="300">
                                </td>
                                <td>{{$etudiant->nom}}</td>
                                <td>{{$etudiant->prenom}}</td>
                                <td>{{$etudiant->date_de_naissance}}</td>
                                <td>{{$etudiant->date_inscription}}</td>
                                <td class="text-right">
                            
                            @if(request()->has('trashed'))
                              <a href="{{ route('etudiants.restore', $etudiant->id_etud) }}" class="btn btn-success">Restore</a>
                             
                            </button> 
                            <form method="POST" action="{{ route('etudiants.supp', $etudiant->id_etud) }}">
                                  @csrf
                                  <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                              </form>
                          @else                                
                              <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id_etud)}}">
                                  @csrf
                                  {{method_field('delete')}}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                              </form>
              <a href="{{ route('etudiantpromo.update',$etudiant->id_etud) }}" data-bs-toggle="modal" data-bs-target="#etudiant{{$etudiant->id_etud}}"><i class="fa fa-edit text-success "></i></a>
               <a href="/Releve">
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
                                <form method="POST" action="{{ route('etudiantpromo.update',$promotion->id_pr) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  

                                  <fieldset>
                  <!--<div class="file btn btn-lg btn-primary">
                          <input type="file" name="photo"/>
                      </div>-->
                      <div class="form-group">
                        <label for="firstname">Nom:</label>
                        <input id="firstname" class="form-control" name="nom" type="text" value="{{$etudiant->nom}}" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Prenom:</label>
                        <input id="lastname" class="form-control" name="prenom" type="text" value="{{$etudiant->prenom}}" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">date de naissance:</label>
                        <input id="firstname" class="form-control" name="date_de_naissance" type="date" value="{{$etudiant->date_de_naissance}}" required>
                      </div>   
                      <div class="form-group">
                        <label for="firstname">date_inscription:</label>
                        <input id="firstname" class="form-control" name="date_inscription" type="date" value="{{$etudiant->date_inscription}}" required>
                      </div> 

                      <div class="form-group">
                       <input id="lastname" class="form-control" type="year" name="promotion" value="{{$promotion->libelle_pr}}" readonly>
                      </div>
                      <div class="form-group"> 
                                    <label class="form-label col-12" for="inputCategories">Insérer une nouvelle photo </label>
                                    <input id="photo" type="file" name="photo">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                       </div> 
                                  <div class="input-group-icon ms-3 mb-3 mt-7">                                 
                                  <button class="btn btn-primary form-little-squirrel-control"  type="submit"  style="border-radius:5px; position:absolute; " >Modifier</button>
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
                    if(!confirm('Are you sure you want to delete this promotion?')) {
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
                                
            
                                
                              
        <div id="popupContact">
<!-- Contact Us Form -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this option?')) {
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
                    
                      
             <form class="needs-validation" method="POST" action="{{route('etudiantpromo.store')}}" novalidate>
      @csrf
        
      <fieldset>

                                   
                      <div class="form-group">
                        <label for="lastname">Promotion:</label>
                        <input id="lastname" class="form-control" type="year" name="promotion" value="{{$promotion->libelle_pr}}" readonly>
                      </div>
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
@endsection