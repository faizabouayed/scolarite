@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Admin
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les admins</h4>
                   <div>
                  <a class="btn btn-light "
                    data-bs-toggle="modal" data-bs-target="#wnd" aria-haspopup="true" aria-expanded="false" role="button"
                     v-pre> <i class="fa fa-plus text-success"></i> Ajouter un admin</a>

                  </div>
                   <!--<a href="{{url('Admin-User/createAd')}}">
                     <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Ajouter un admin
                     </button>
                   </a>--><br>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white" >                               
                              
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($users as $user)
                            <tr>
                               
                                <td>{{$user->name}} </td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->date_n}}</td>
                                 <td class="text-center">

                                       <div class="btn-group">                                                                                  
                                @if(request()->has('trashed'))
                                    <a href="{{ route('Admin-User.restore', $user->id) }}" class="btn btn-success mr-1"><i class="fa fa-reply"></i></a>
                                   
                                  <form method="POST" action="{{ route('Admin-User.supp', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete " title='Delete'><i class="fa fa-times"></i></button>
                                  
                                    </form>
                                @else        
                                <a href="{{ route('Admin-User.update',$user->id) }}" data-bs-toggle="modal" data-bs-target="#user{{$user->id}}">
                                      <button class="btn btn-success mr-1 ">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                    </a>                         
                                    <form method="POST" action="{{ route('Admin-User.destroy', $user->id) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete " title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                                    
                                    
                                @endif 
                                </div>                                 
                                </td>
                            </tr>
                      <div class="modal" id="user{{$user->id}}">
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
                                <form method="POST" action="{{ route('Admin-User.update',$user->id) }}" class="sign-up-form" onsubmit="return userformcheck(this)">
                                  @csrf
                                  @method('PUT')
                                  <div class="input-group-icon mb-3 "> 
                                    <label class="form-label col-12" for="inputCategories">Nom:</label>
                                    <input id="name" type="text" class="form-control form-little-squirrel-control @error('name') is-invalid @enderror" placeholder="Nom" name="name" value="{{$user->name}}" autocomplete="name"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus/>
                                  </div>

                                  <div class="input-group-icon mb-3"> 
                                    <label class="form-label col-12" for="inputCategories">Prénom:</label>
                                    <input id="prenom" type="text" class="form-control form-little-squirrel-control @error('prenom') is-invalid @enderror" placeholder="Prenom" name="prenom" value="{{$user->prenom}}"  autocomplete="prenom"  size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
                                  </div>
                                  <div class="input-group-icon mb-3"> 
                                    <br><br><br><br><br>
                                    <label class="form-label col-12" for="inputCategories">Date de naissance:</label>
                                    <input id="prenom" type="date" class="form-control form-little-squirrel-control @error('date_n') is-invalid @enderror" placeholder="date_n" name="date_n" value="{{$user->date_n}}"  autocomplete="date_n"  style="border-radius:5px; box-shadow:1px 1px 2px #C0C0C0 inset"  autofocus>
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
<a href="{{ route('Admin-User.index') }}" class="btn btn-info"><i class="fa fa-eye "></i>Voir tout les admins</a>
<a href="{{ route('Admin-User.restoreAll') }}" class="btn btn-success"><i class="fa fa-reply-all"> Restorer tout</i></a>
@else
<a href="{{ route('Admin-User.index', ['trashed' => 'user']) }}" class="btn btn-primary">Voir les admins supprimés</a>
@endif
                </div>
        </div>
        <!--pop up-->
        <div id="popupContact">
<!-- Contact Us Form -->

       <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this user?')) {
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
     
        <!-- partial -->
      </div>
      <!-- L'ajout -->
     <div class="modal" id="wnd">
<div class="modal-dialog modal-md">
<div class="modal-content">



<!-- Modal Header -->
   <div class="modal-header">

      <h3 class="font-sans-serif text-center fw-bold fs-1 text-dark mx-auto ms-8"> Remplir les informations </h3>
      <a class="close" data-bs-dismiss="modal"aria-label="Close">&times;</a>
  </div>
          <!-- Modal body -->
        <div class="modal-body mx-auto">
         <div class="row align-items-center mb-3">
       <form class="needs-validation" method="POST" action="{{ route('Admin.store') }}" novalidate>
        @csrf


       <div class="input-group-icon mb-3 ">
        <label for="exampleInputEmail" class="col-md-4 col-form-label text-md-end">Nom: </label>
        <div class="input-group">
         <div class="input-group-prepend bg-transparent">
             <span class="input-group-text bg-transparent border-right-0">
                <i class="fa fa-user text-primary"></i>
             </span>
         </div>
        <input id="name" type="text" class="form-control form-little-squirrel-control @error('name') is-invalid @enderror" placeholder="Nom" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required />
       </div>
      </div>
        <div class="input-group-icon mb-3">
          <label for="exampleInputEmail" class="col-md-4 col-form-label text-md-end">Prénom: </label>
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                  <i class="fa fa-user text-primary"></i>
                </span>
              </div>
           <input id="prenom" type="text" class="form-control form-little-squirrel-control @error('prenom') is-invalid @enderror" placeholder="Prenom" name="prenom" value="{{ old('prenom') }}" autocomplete="prenom" autofocus required>

         </div>
      </div>



        <div class="input-group-icon mb-3">
         <label class="form-label col-12" for="inputCategories">Date de naissance:</label>
           <div class="input-group">
             <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                  <i class="fas fa-calendar text-primary"></i>
                </span>
            </div>
            <input type="date" class="form-control form-little-squirrel-control form-control-sm @error('date_n') is-invalid @enderror" name="date_n" required autofocus>

          </div>
       </div>

         <div class="input-group-icon mb-3">
           <label class="form-label col-12" for="inputCategories">Email:</label>
            <div class="input-group">
           <div class="input-group-prepend bg-transparent">
              <span class="input-group-text bg-transparent border-right-0">
                <i class="fas fa-envelope text-primary"></i>
              </span>
          </div>
        <input id="email" type="email" class="form-control form-little-squirrel-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email">
       </div>
    </div>
         <div class="input-group-icon mb-3">
          <label class="form-label col-12" for="inputCategories">Mot de passe:</label>
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                     <i class="fas fa-lock text-primary"></i>
                </span>
              </div>
           <input id="password" type="password" class="form-control form-little-squirrel-control @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password" autocomplete="new-password" required>
          </div>
         </div>

           <div class="input-group-icon ms-3 mb-3 mt-7">
             <button class="btn btn-primary form-little-squirrel-control" type="submit">Ajouter</button>
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
   <!--<script src="../../js/alerts.js"></script>-->
    <!--<script src="../../js/delete.js"></script>-->

  <!--<script src="../../js/avgrund.js"></script>-->
  <!-- End custom js for this page-->
@endsection

