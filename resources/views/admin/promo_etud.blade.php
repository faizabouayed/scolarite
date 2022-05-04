@extends('layouts.MenuAdmin')
@Section('content')      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Orders
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
                  <h4 class="card-title">Etudiants de Promo {{$promotion->libelle_pr}}
                   <!-- <button type="button" class="btn btn-danger btn-icon-text">
                      <i class="fa fa-upload btn-icon-prepend"></i>                                                    
                      Upload
                    </button> !-->
                   <!-- <button type="button" class="btn btn-info btn-icon-text">
                      Print
                      <i class="fa fa-print btn-icon-append"></i>                                                                              
                    </button>-->
                  </h4> 
                  
                  <div class="row grid-margin">
                    
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($etudiants as $etudiant)
                            <tr>
                                <td>{{$etudiant->nom}}</td>
                                <td>{{$etudiant->prenom}}</td>
                                <td>{{$etudiant->date_de_naissance}}</td>
                                <td class="text-right">
                            
                            @if(request()->has('trashed'))
                              <a href="{{ route('etudiants.restore', $etudiant->id_etud) }}" class="btn btn-success">Restore</a>
                             
                            </button> 
                            <form method="POST" action="{{ route('etudiants.supp', $etudiant->id_etud) }}">
                                  @csrf
                                  <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                              </form>
                          @else                                
                              <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id_etud) }}">
                                  @csrf
                                  {{method_field('delete')}}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                              </form>
              <button class="btn btn-light " type="button" value="{{$etudiant->id_etud}}" id="popup" onclick="div_show()">
               <i class="fa fa-edit text-success"></i>edit</button>
               <a href="/Releve">
                             <button class="btn btn-light">
                              <i class="fa fa-eye text-primary"></i>View
                            </button></a>
                          @endif
                            
                          </td>
                          
                      </tr>
                      
                    </tbody>
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
                                
            
                                
                              <!--  <td class="text-right">
                               <a href="/promo"> <button class="btn btn-light" >

                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                  <button class="btn btn-light" id="show">
                                    <i class="fa fa-edit text-success "></i>Edit
                                 </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> --><!--@if(request()->has('trashed'))
                                   <a href="{{ route('etudiants.restore', $etudiant->id) }}" class="btn btn-success">Restore</a>
                                   <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                <!--  <form method="POST" action="{{ route('etudiants.supp', $etudiant->id) }}">
                                        @csrf
                                       <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                @else                                
                                    <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                    <button class="btn btn-light " type="button" value="{{$etudiant->id}}" id="popup" onclick="div_show()">
                     <i class="fa fa-edit text-success"></i>edit</button>
                     <a href="/Releve">
                                   <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                @endif
                                  
                                </td>
                                
                            </tr>
                            
                          </tbody>
                          
                        </table>-->
                      <!--  <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('promos.viewEtud') }}" class="btn btn-info">View All etudiants</a>
                    <a href="{{ route('etudiants.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('etudiants.index', ['trashed' => 'option']) }}" class="btn btn-primary">View Deleted etudiants</a>
                @endif
            </div>
        </div>
        pop up-->
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