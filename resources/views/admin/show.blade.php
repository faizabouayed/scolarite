@extends('layouts.MenuAdmin')
@Section('content')


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
<head>
  <!----------------profil------------->
   <link href="../../css/Profile-CSS.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
      <div class="main-panel">
        <div class="content-wrapper">
        </div>
        <!-- content-wrapper ends -->
         <div class="page-header">
            <h3 class="page-title">
              
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Enseignants</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
              </ol>
            </nav>
          </div>
       
<!------ Include the above in your HEAD tag ---------->
      <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                           <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            @foreach($user as $user)
                                    <h5>
                                         {{$user->name}} {{$user->prenom}}                    
                                   </h5>
                                    <h6>
                                         {{$user->grade}}
                                    </h6>
                          <!-- <p class="proile-rating">RANKINGS:<span>8/10</span></p>--> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-inverse-warning btn-fw">Affecter Module</button>
                      <!--  <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Affecter Module"/>-->
                    </div>
                </div>
                <br><br><br>
                <div class="row">                   
                        <div class="profile-work">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-user"></i>Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modules</a>
                                </li>
                            </ul>
                        <div class="col-md-8">
                       <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <!--<div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>-->
                                        </div>
                                    <form method="GET" action="{{ route('show.info', $user->id) }}">
                                       <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prenom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->prenom}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->date_n}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Grade</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->grade}}</p>
                                            </div>
                                        </div>
                                    </form>
                        </div>  

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                             <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                  <table id="sortable-table-2" class="table table-striped">
                                 <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th class="sortStyle">Libelle<i class="fa fa-angle-down"></i></th>
                                      <th class="sortStyle">Promo<i class="fa fa-angle-down"></i></th>
                                      <th class="sortStyle">Option<i class="fa fa-angle-down"></i></th>
                                      <th class="sortStyle">Action<i class="fa fa-angle-down"></i></th>

                                    </tr>
                                 </thead>
                                 <tbody>

                                   
                                    <form method="GET" action="{{ route('show.afficher', $module->id) }}">
                                    <tr>
                                       <td>{{$module->code}}</td>
                                       <td>{{$module->libelle}}</td>
                                       
                                       <td>
                                       
                                        <button class="btn btn-light" id="show">
                                           <i class="fa fa-edit text-success "></i>
                                        </button>
                                       <button class="btn btn-light">
                                         <i class="fa fa-times text-danger"></i>
                                        </button>
                                        </form>
                                        </td>

                                    </tr>                         
                                 </tbody>
                                     </form>
                                 @endforeach 
                               </table>
                             </div>
                             </div>
                            </div>                
                        </div>

                       </div>
                    
                </div>
            </form>           
    </div>
        <!-- partial:../../partials/_footer.html -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
    <script src="../../js/jq.tablesort.js"></script>

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/tablesorter.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
</html>
@endsection
