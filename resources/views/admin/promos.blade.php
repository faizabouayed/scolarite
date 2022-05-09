@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
            
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Etudiant</a></li>
                <li class="breadcrumb-item active" aria-current="page">Options</li>
                <li class="breadcrumb-item"><a href="#">Promotion</a></li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Promotion</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
                    <div class="row grid-margin">
                  <a href="{{url('createPromoOPT')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouvel Promo</button></a>
                     
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                
                                <th>Libellé</th>
                                <th>Année</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($promos as $promo)
                            <tr>
                                <td>{{$promo->libelle_pr}}</td>
                                <td>{{$promo->annee_debut.'-'.$promo->annee_fin}}</td>
            
                                
                                <td class="text-right">
                                  @if(request()->has('trashed'))
                                    <a href="{{ route('promotions.restore', $promo->id_pr) }}" class="btn btn-success">Restore</a>
                                   <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  <form method="POST" action="{{ route('promotions.supp', $promo->id_pr) }}">
                                        @csrf
                                       <!-- {{method_field('delete')}}-->
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                @else                                
                                    <form method="POST" action="{{ route('promotions.destroy', $promo->id_pr) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                   <a href="{{ route('promotions.update',$promotion->id_pr) }}" data-bs-toggle="modal" data-bs-target="#promotion{{$promotion->id_pr}}"><i class="fa fa-edit text-success "></i></a>
                     <a href="{{ route('promos.viewEtud', $promo->libelle_pr) }}" class="btn btn-success">View</a>
                                @endif
                                  
                                </td>
                                
                            </tr>
                            
                          </tbody>
                          <div class="modal" id="promo{{promo->id_pr}}">
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
                                <form method="POST" action="{{ route('promotions.update',promo->id_pr) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">libelle</label>
                                    <input id="libelle_pr" type="text" class="form-control form-little-squirrel-control @error('libelle_pr') is-invalid @enderror" placeholder="Libelle" name="libelle_pr" value="{{promo->libelle_pr}}" autocomplete="libelle_pr"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>
                                 
                                  <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">Année de début:</label>
                                    <input id="anneeD" type="year" class="form-control form-little-squirrel-control @error('anneeD') is-invalid @enderror" placeholder="anneeD" name="anneeD" value="{{promo->annee_debut}}"  autocomplete="anneeD"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div> 
                                    <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">Année de fin:</label>
                                    <input id="anneeF" type="year" class="form-control form-little-squirrel-control @error('anneeF') is-invalid @enderror" placeholder="anneeF" name="anneeF" value="{{promo->annee_fin}}"  autocomplete="anneeF"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
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
                    <a href="{{ route('promotions.index') }}" class="btn btn-info">View All promotions</a>
                    <a href="{{ route('promotions.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('promotions.index', ['trashed' => 'promotion']) }}" class="btn btn-primary">View Deleted promotions</a>
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
