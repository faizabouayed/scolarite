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
                   <a href="{{url('Admin-User/createAd')}}">
                     <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add Admin
                     </button>
                   </a><br><br>
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
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($user as $user)
                            <tr>
                                <td></td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->date_n}}</td>
                                 <td class="text-right">                    
                                @if(request()->has('trashed'))
                                    <a href="{{ route('Admin-User.restore', $user->id) }}" class="btn btn-success">Restore</a>
                                   
                                  <form method="POST" action="{{ route('Admin-User.supp', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                @else                                
                                    <form method="POST" action="{{ route('Admin-User.destroy', $user->id) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                    <a href="{{url('Admin-User/'.$user->id.'/editAd')}}">
                                       <button class="btn btn-light editbtn" >
                                          <i class="fa fa-edit text-success "></i>Edit
                                        </button>
                                    </a>
                                    <a href="#" class="btn btn-success">View</a>
                                @endif                                  
                                </td>
                            </tr>
                            @endforeach
                          </tbody>                          
                        </table>
                 <div class="float-end">
                    @if(request()->has('trashed'))
                        <a href="{{ route('Admin-User.index') }}" class="btn btn-info">View All Admin-User</a>
                        <a href="{{ route('Admin-User.restoreAll') }}" class="btn btn-success">Restore All</a>
                    @else
                        <a href="{{ route('Admin-User.index', ['trashed' => 'user']) }}" class="btn btn-primary">View Deleted Admin-User</a>
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
     
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    
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
<script>
     
     $(document).ready(function (){
           
         $('.servideletebtn').click(function (e){
                  e.preventDefault();
                  swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this imaginary file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                      if (willDelete) {
                         swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                  });
                  } else {
                     swal("Your imaginary file is safe!");
                    }
                  });

                  });
         


     });
</script>
  <!--<script src="../../js/avgrund.js"></script>-->
  <!-- End custom js for this page-->
@endsection

