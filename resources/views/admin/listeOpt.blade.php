@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Options
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Etudiant</a></li>
                <li class="breadcrumb-item"><a href="#">Options</a></li>
                
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Options</h4>
                  <div class="row grid-margin">
                 <!-- <a href="{{url('createOpt')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouvel Option</button></a>-->
                       <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter une option
                   </a>
                     
                  </div>
                 
      
                <!--  <div class="row grid-margin">
                  <a href="{{url('corbeilleOpt')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-trash text-danger"></i>Corbeille</button></a>
                     
                  </div>-->

     
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Libellé</th>
                                <th>Niveau</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          @foreach($options as $option)
                            <tr>
                                <td>{{$option->libelle_opt}}</td>
            
                                <td> {{$option->niveau}}
                                  
                                </td>
                                <td class="text-center">
                                 <div class="btn-group">
                              <!--  <a href="/promo"> <button class="btn btn-light" >

                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                  <button class="btn btn-light" id="show">
                                    <i class="fa fa-edit text-success "></i>Edit
                                 </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  @if(request()->has('trashed'))
                                      <a href="{{ route('option.restore', $option->id_opt) }}" class="btn btn-success"><i class="fa fa-reply"></i></a>
                                   <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  <form method="POST" action="{{ route('option.supp', $option->id_opt) }}">
                                        @csrf
                                       <!-- {{method_field('delete')}}-->
                                        <button type="submit" class="btn btn-danger delete" title='Delete'><i class="fa fa-times"></i></button>
                                    </form>
                                @else  
                                <a href="{{ route('option.update',$option->id_opt)}}" data-bs-toggle="modal" data-bs-target="#option{{$option->id_opt}}"><button class="btn btn-success mr-1  ">
                                        <i class="fa fa-edit"></i>
                                      </button></a>
                                    <a href="{{ route('option.viewPromo', $option->libelle_opt) }}" ><button class="btn btn-light mr-1"><i class="fa fa-eye text-primary"></i></button></a>                              
                                    <form method="POST" action="{{ route('option.destroy', $option->id_opt) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                     
                                @endif
                                  </div>
                                </td>
                            </tr>
                      <div class="modal" id="option{{$option->id_opt}}">
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
                                <form method="POST" action="{{ route('option.update',$option->id_opt) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Libellé:</label>
                                    <div class="input-group">
                                     
                                    <input id="libelle_opt" type="text" class="form-control form-little-squirrel-control @error('libelle_opt') is-invalid @enderror" placeholder="Nom" name="libelle_opt" value="{{$option->libelle_opt}}" autocomplete="libelle_opt"  size="30" maxlength="10"   autofocus/>
                                  </div>
                               

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Niveau:</label>
                                    
                                     <select class="form-control" id="exampleSelectGender" name="niveau" required>
                                <option value="{{$option->niveau}}">{{$option->niveau}}</option>                                
                                <option name="niveau">licence</option>
                                <option name="niveau">master</option>
                                 </select>
                                    
                                  </div> 
                                  <br>                                   
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
                          </tbody>
                          
                        </table>
                        <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('option.index') }}" class="btn btn-info">Voir tout les options</a>
                    <a href="{{ route('option.restoreAll') }}" class="btn btn-success"><i class="fa fa-reply-all"> Restorer tout</i></a>
                @else
                    <a href="{{ route('option.index', ['trashed' => 'option']) }}" class="btn btn-primary">Voir les options supprimés</a>
                @endif
            </div>
        </div>
        <!--pop up-->
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
  <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>

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
                    
                      
                <form class="needs-validation" method="POST" action="{{ route('option.store') }}" novalidate>
      @csrf
        
                     
                    <fieldset>
                      <div class="form-group">
                        <label for="lastname">Libellé:</label>
                        <input id="lastname" class="form-control" type="year" name="libelle_opt" required>
                      </div>                    

                      <div class="form-group">
                        <label for="firstname">Niveau:</label>
                        <select class="form-control" id="exampleSelectGender" name="niveau" required>
                                <option value="niveau"></option>                                
                                <option name="niveau">licence</option>
                                <option name="niveau">master</option>
                        </select>                      
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

  <script src="../../js/avgrundOpt.js"></script>
  <!-- End custom js for this page-->
@endsection

<!--@section('scripts')
 <script>
   $(document).ready(function(){
   $(document).on('click','editbtn',function(){
     var stud_id = $(this).val();
     alert(stud_id);

   });
   });
 </script>

@endsection-->
<script>

</script>

