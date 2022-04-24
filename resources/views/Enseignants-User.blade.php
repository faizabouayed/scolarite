
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des Enseignants
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Enseignants</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Enseignants</h4>               
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
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                                                 
                          <tbody>
                            @foreach($user as $user)

                            <tr> 
                              <input type="hidden" class="serdelete_val_id" value="{{$user->id}}">
                                <td></td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->date_n}}</td>
                                <td>
                                  <label class="badge badge-info">{{$user->grade}}</label>
                                </td>
                                <!--<td class="text-right">
                                  <a href="{{url('Enseignants-User/'.$user->id.'/Admin.shwo')}}">
                                
                                  
                                  <button class="btn btn-light" onclick="window.location.href='/Profile-Ens';">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                  </form>
                                  <button class="btn btn-light editbtn">
                                    <i class="fa fa-edit text-success "></i>Edit
                                  </button>

                                 <button class="btn btn-light" id="show">
                                    <i class="fa fa-edit text-success "></i>Edit
                                  </button>-->
                                 <!-- <form action ="{{url('Enseignants-User/'.$user->id)}}" method="post">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}-->
                                  <!--<button class="btn btn-drang servideletebtn"  >
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                  <button class="btn btn-light" onclick="showSwal('warning-message-and-cancel')">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>onclick="return confirm('Are you sure?')"--><!--</form>-->                                
                               <!-- </td> -->                               
                            </tr> 
                            @endforeach                          
                          </tbody>                        
                          
                        </table>
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
  <!-- <script src="../../js/delete.js"></script>-->
  <meta name="csrf-token" content="{{ csrf_token() }}">

<script>
     
     $(document).ready(function (){
          
           
         $('.servideletebtn').click(function (e){
                  e.preventDefault();
                  $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
                  var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
                 // alert(delete_id);
                  swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this imaginary file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                      if (willDelete) {
                        var  data ={
                          "_token": $('input[name=_token]').val(),
                          "id": delete_id,
                        }

                        $.ajax({
                             type: "DELETE",
                             url: '/Enseignants-User-delete/'+delete_id,
                             data: data,
                             success: function (response){
                                     swal(response.status, {
                                     icon: "success",
                             })
                                     .then((result) => {
                                        location.reload();
                                     });
                             }
                        });                    
                  } 
                  });

                  });
     });
</script>

  <script src="../../js/avgrundEns.js"></script>
  <!-- End custom js for this page-->
@endsection





@Section('scripts')
<script>
      $(document).ready(function (){

        $(document).on('click', '.editbtn', function(){
          var stud_id = $(this).val();
          //alert(stud_id);
           
           swal({
   text: 'Search for a movie. e.g. "La La Land".',
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null;
 
  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
})
.then(results => {
  return results.json();
})
.then(json => {
  const movie = json.results[0];
 
  if (!movie) {
    return swal("No movie was found!");
  }
 
  const name = movie.trackName;
  const imageURL = movie.artworkUrl100;
 
  swal({
    title: "Top result:",
    text: name,
    icon: imageURL,
  });
})
.catch(err => {
  if (err) {
    swal("Oh noes!", "The AJAX request failed!", "error");
  } else {
    swal.stopLoading();
    swal.close();
  }
});
        });


      });
</script>



@endsection
