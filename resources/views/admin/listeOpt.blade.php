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
                  <a href="{{url('createOpt')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouvel Option</button></a>
                     
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
                                  <!--<select id="monselect">
                                    <option value="Licence">Licence</option>
                                    <option value="Master" selected>Master</option>
                                  </select>-->
                                </td>
                                <td class="text-right">
                                  <a href="{{ route('options.update',$option->id_opt)}}" data-bs-toggle="modal" data-bs-target="#option{{$option->id_opt}}"><i class="fa fa-edit text-success "></i></a>
                              <!--  <a href="/promo"> <button class="btn btn-light" >

                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                  <button class="btn btn-light" id="show">
                                    <i class="fa fa-edit text-success "></i>Edit
                                 </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->@if(request()->has('trashed'))
                                    <a href="{{ route('options.restore', $option->id_opt) }}" class="btn btn-success">Restore</a>
                                   <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  <form method="POST" action="{{ route('options.supp', $option->id_opt) }}">
                                        @csrf
                                       <!-- {{method_field('delete')}}-->
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                @else                                
                                    <form method="POST" action="{{ route('options.destroy', $option->id_opt) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                 <!--   <a href="{{url('editOpt')}}"> -->
                    <button class="btn btn-light " type="button" value="{{$option->id_opt}}" id="popup" onclick="div_show()">
                     <i class="fa fa-edit text-success"></i>edit</button><!--</a>-->
                     <a href="{{ route('options.viewPromo', $option->libelle_opt) }}" class="btn btn-success">View</a>
                                @endif
                                  
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
                                <form method="POST" action="{{ route('options.update',$option->id_opt) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Libe</label>
                                    <input id="libelle_opt" type="text" class="form-control form-little-squirrel-control @error('libelle_opt') is-invalid @enderror" placeholder="Nom" name="libelle_opt" value="{{$option->libelle_opt}}" autocomplete="libelle_opt"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Niveau:</label>
                                    <input id="niveau" type="text" class="form-control form-little-squirrel-control @error('niveau') is-invalid @enderror" placeholder="Niveau" name="niveau" value="{{$option->niveau}}"  autocomplete="niveau"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                    
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
                    <a href="{{ route('options.index') }}" class="btn btn-info">View All options</a>
                    <a href="{{ route('options.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('options.index', ['trashed' => 'option']) }}" class="btn btn-primary">View Deleted options</a>
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

