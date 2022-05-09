
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
    <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left:0%;
        top: 10%;
        width: 100%;
        height: 100%;
        overflow: auto;
       /* background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);*/
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      h2,
      p {
        margin: 0 0 20px;
        font-weight: 400;
        color: #999;
      }
      span {
        color: #666;
        display: block;
        padding: 0 0 5px;
      }
      form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #eee;
      }
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      /*.contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      /*button:hover {
        background: #2371a0;
      }*/
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
     /* button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }*/
      /*button.button:hover {
        border-bottom: #a99567 1px solid;
        color: #a99567;
      }*/
    </style>
   
      
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
                  <a href="{{url('Enseignants-User/create')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add User</button></a><br><br>              
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
                                  <label class="badge badge-success">{{$user->grade}}</label>
                                </td>
                                <td class="text-right">

                                <a href="{{url('Enseignants-User/'.$user->id.'/shwo')}}">
                                 <button class="btn btn-light" onclick="window.location.href='/Profile-Ens';">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                </a>
                                 <!--<button type="button" data-bs-toggle="modal" data-bs-target="#updateStudentModal" wire:click="editUser({{$user->id}})" class="btn btn-primary">
                                         Edit
                                            </button>-->
                                <!-- <a href="{{url('Enseignants-User/'.$user->id.'/editEns')}}">
                                 <button class="btn btn-light editbtn"  >
                                    <i class="fa fa-edit text-success "></i>Edit
                                </button>
                                 </a>-->
       
      
                                 <p>
                                  <button class="btn btn-light button" data-modal="modalOne" >
                                  <i class="fa fa-edit text-success "></i>Edit
                                  </button>
                                  <!--<button class="button" data-modal="modalOne">Contacter nous</button>-->
                                 </p>
    
                                 <div id="modalOne" class="modal">
                                    <div class="modal-content">
                                     <div class="col-12 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">
                                          <a class="close">&times;</a>
                                            <form action= "{{url('Enseignants-User/'. $user->id)}}" method="POST">

                                            <input type="hidden" name="_method" value="PUT">
                                            {{ csrf_field()}} 
                                            <div class="form-group">
                                             <label for="exampleInputName1">Name</label>
                                              <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$user->name}}">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail3">Prenom</label>
                                            <input type="text" class="form-control" id="exampleInputEmail3" name="prenom"value="{{$user->prenom}}">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputPassword4">Date</label>
                                            <input type="date" class="form-control" id="exampleInputPassword4" name="date_n" value="{{$user->date_n}}">
                                            </div>                   
                                            <button type="submit" class="btn btn-primary mr-2">Edit</button>
                                            <button class="btn btn-light">Cancel</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 </div>
                                  <form action ="{{url('Enseignants-User/'.$user->id)}}" method="post">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}

                                  <button class="btn btn-drang servideletebtn"  >
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button></form>
                                  <!--<button class="btn btn-light" onclick="showSwal('warning-message-and-cancel')">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>onclick="return confirm('Are you sure?')"</form>-->     
                                </td>                                
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
   <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!--<script src="../../js/alerts.js"></script>-->
  <!-- <script src="../../js/delete.js"></script>-->
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- edit -->
<script>
      let modalBtns = [...document.querySelectorAll(".button")];
      modalBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.getAttribute("data-modal");
          document.getElementById(modal).style.display = "block";
        };
      });
      let closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.closest(".modal");
          modal.style.display = "none";
        };
      });
      window.onclick = function (event) {
        if (event.target.className === "modal") {
          event.target.style.display = "none";
        }
      };
    </script>


<script>function togglePopup() {
document.getElementById("popup-1")
.classList.toggle("active");}
</script>
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

 <!-- <script src="../../js/avgrundEns.js"></script>-->
  <!-- End custom js for this page-->
@endsection








