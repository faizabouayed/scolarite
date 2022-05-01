
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Orders
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
                  <h4 class="card-title">Listes des Etudiants</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
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
                                <th>Promo</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          @foreach($etudiants as $etudiant)
                          <tbody>
                            <tr>
                                <td>{{$etudiant->photo}}</td>
                                <td>{{$etudiant->nom}}</td>
                                <td>{{$etudiant->prenom}}</td>
                                <td>{{$etudiant->date_de_naissance}}</td>
                                <td>{{$etudiant->promo}}</td>
            
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
        </div>>
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