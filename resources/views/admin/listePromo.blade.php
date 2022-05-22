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
                <li class="breadcrumb-item"><a href="#">Etudiant</a></li>
                <li class="breadcrumb-item active" aria-current="page">promotion</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Les Promotions</h4>
                 <div class="row grid-margin">
                  <!--<a href="{{url('createPromo')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouvel Promotion</button></a>-->
                     <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter une promo
                   </a>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Option</th>
                                <th>Libellé</th>
                                <th>Année</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          @foreach($promotions as $promotion )
                          <tbody>
                            <tr>
                                <td>{{$promotion->libelle_opt}}</td>
                                <td>{{$promotion->libelle_pr}}</td>
            
                                <td>
                                {{$promotion->annee_debut.'-'.$promotion->annee_fin}}
                                </td>
                               
                                
                                 <td class="text-center">
                                  <div class="btn-group">
                                  @if(request()->has('trashed'))
                                    <a href="{{ route('promotions.restore', $promotion->id_pr) }}" class="btn btn-success"><i class="fa fa-reply"></i></a>
                                   <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  <form method="POST" action="{{ route('promotions.supp', $promotion->id_pr) }}">
                                        @csrf
                                       <!-- {{method_field('delete')}}-->
                                        <button type="submit" class="btn btn-danger delete" title='Delete'><i class="fa fa-times"></i></button>
                                    </form>
                                @else 
                                <a href="{{ route('promotions.update',$promotion->id_pr) }}" data-bs-toggle="modal" data-bs-target="#promotion{{$promotion->id_pr}}"><button class="btn btn-success mr-1  "><i class="fa fa-edit"></i>
                                      </button></a> 
                                  <a href="{{ route('promos.viewEtud', $promotion->libelle_pr) }}" ><button class="btn btn-light mr-1"><i class="fa fa-eye text-primary"></i></button></a>
                                                                      
                                    <form method="POST" action="{{ route('promotions.destroy', $promotion->id_pr) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                    
                     
                                @endif
                                  </div>
                                </td>
                                
                            </tr>
                            
                          </tbody>
                          <div class="modal" id="promotion{{$promotion->id_pr}}">
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
                                <form method="POST" action="{{ route('promotions.update',$promotion->id_pr) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3">
                                   <label for="firstname">Option:</label>
                                   <select class="form-control" id="exampleSelectGender" name="option" required>
                                 <option value="{{$promotion->id_opt}}">{{$promotion->libelle_opt}}</option>
                                 @foreach($listeOpt as $option)
                                <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                 @endforeach
                                </select>                      
                      </div>
                                  
                                  </div>

                                  
                                  <div class="input-group-icon mb-3"> 
                                    <div class="form-group">
                        <label for="lastname">Année de début:</label>
                          <input id="anneeD" type="year" class="form-control form-little-squirrel-control @error('anneeD') is-invalid @enderror" placeholder="anneeD" name="anneeD" value="{{$promotion->annee_debut}}"  autocomplete="anneeD"   autofocus>
                      </div>
                                    
                                  
                                  </div>
                                  
                                    <div class="input-group-icon mb-3"> 
                                    
                                    <label class="form-label col-12" for="inputCategories">Année de fin:</label>
                                    
                                    <input id="anneeF" type="year" class="form-control form-little-squirrel-control @error('anneeF') is-invalid @enderror" placeholder="anneeF" name="anneeF" value="{{$promotion->annee_fin}}"  autocomplete="anneeF"   autofocus>
                                  </div> 
                                   
                                  
                                  

                                  <div class="input-group-icon ms-3 mb-3 mt-7">                                 
                                  <button class="btn btn-primary form-little-squirrel-control" type="submit">Modifier</button>
            <i class="fas fa-user-plus amber-text input-box-icon" style="color:white"></i>
            

            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Annuler</button>
                                  </div>
                                </form>          
                              </div>
                            </div>
                            <!-- Modal footer -->
                                    
                          </div>
                        </div>
                      </div>
                          @endforeach
                        </table>
                              <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('promotions.index') }}" class="btn btn-info">Voir tout les  promotions</a>
                    <a href="{{ route('promotions.restoreAll') }}" class="btn btn-success"><i class="fa fa-reply-all"> Restorer tout</i></a>
                @else
                    <a href="{{ route('promotions.index', ['trashed' => 'promotion']) }}" class="btn btn-primary">Voir les promotions supprimés</a>
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
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
                    
                      
             <form class="needs-validation" method="POST" action="{{route('promotions.store')}}" novalidate>
      @csrf
        
       <fieldset>

                      <div class="form-group">
                        <label for="firstname">Option:</label>
                        <select class="form-control" id="exampleSelectGender" name="option" required>
                                 <option value="">--Please choose an option--</option>
                                 @foreach($listeOpt as $option)
                                <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                 @endforeach
                                </select>                      
                      </div>
                      <div class="form-group">
                        <label for="lastname">Année de début:</label>
                        <input id="lastname" class="form-control" type="year" name="annee_debut" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Année de fin:</label>
                        <input id="lastname" class="form-control" type="year" name="annee_fin" required>
                      </div>
                      
                      
                      <div class="input-group-icon ms-3 mb-3 mt-7">
          <button class="btn btn-primary form-little-squirrel-control" type="submit">Ajouter</button>
          <i class="fas fa-user-plus amber-text input-box-icon" style="color:white"></i>
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Annuler</button>
         </div>
                    </fieldset>
       
        
      </form>

                      


</div>
  </div>

                 

                  <!-- Modal footer -->
                  

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
