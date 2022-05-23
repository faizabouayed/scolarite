
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Scolarite</title>
  <!-- plugins:css -->
  <!--<link href="{{ asset('css/vendors/iconfonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/css/vendor.bundle.addons.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/../../css/Profile-CSS.css">

  <!--<link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
   <link href="../../css/Profile-CSS.css" rel="stylesheet" id="bootstrap-css">-->
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- endinject -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/style.css">

  <!--<link rel="stylesheet" href="css/style.css">-->
  <!-- endinject -->
  <link rel="shortcut icon" type="text/css" href="{{URL::to('/')}}/www.urbanui.com">

  <!--<link rel="shortcut icon" href="http://www.urbanui.com/" />-->


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
            google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart1);
     


      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Année', 'Enseignants', 'Etudiants'],
          ['2018', {{$s1}}, {{$se1}}],
          ['2019', {{$s2}}, {{$se2}}],
          ['2020', {{$s3}}, {{$se3}}],
          ['2021',  {{$s4}}, {{$se4}}],
          ['2022',  {{$s5}}, {{$se5}}]
        ]);

        var options = {
          chart: {
            
            subtitle: 'Etudiants, Enseignants',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
     
  google.charts.setOnLoadCallback(drawChart2);
       function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['SIC',    {{$etud_sic}}],
          ['GL',      {{$etud_gl}}],
          ['MID',   {{$etud_mid}}],
          ['RSD',     {{$etud_rsd}}]
        ]);

        var options = {
          title: 'nombre,%'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }




    </script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!--looogooooooooooo -->
        <a class="navbar-brand brand-logo" href="#"><img src="telechargement/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
 
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-bell mx-0"></i>
              <span class="count">16</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fas fa-exclamation-circle mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              
              <div class="dropdown-divider"></div>
           
            </div>
          </li>
     
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="/telechargement/avatar/admin.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>-->
              <div class="dropdown-divider"></div>
              <a href="{{ url('/logout') }}" class="dropdown-item">
                 
                <i class="fas fa-power-off text-primary"></i>

                Déconnexion
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fa fa-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="/telechargement/avatar/admin.png" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Bonjour  Admin
                </p>
                <p class="designation">
                  Super Admin
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>       
          <!-----------------------------User-------------->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
              <!--<i class="fas fa-shopping-cart menu-icon"></i>-->
              <i class="fas icon-sm fa fa-user  menu-icon"></i>
              <span class="menu-title"> User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
             
                <li class="nav-item"> <a class="nav-link" href="/Admin-User"> Admin </a></li>
                <li class="nav-item"> <a class="nav-link" href="/Enseignants-User"> Enseignants </a></li>

              </ul>
            </div>
          </li>
          <!----------------------------------------->
          <!-----------------------------Etudiant-------------->


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fa fa-book menu-icon"></i>
              <span class="menu-title">Etudiant</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/options">Options</a></li>
                <li class="nav-item"> <a class="nav-link" href="/promotions">Promotions</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/liste-des-etudiants">Liste des etudiants</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/module">
              <i class="fa fa-list-alt menu-icon"></i>
             <span class="menu-title">Modules</span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="verrouiller">
              <i class="fa fa-lock menu-icon"></i>
             <span class="menu-title">Lock screen</span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/calendrier">
              <i class="fa fa-calendar menu-icon"></i>
             <span class="menu-title">Calendrier</span> 
            </a>
          </li>
        </ul>
      </nav>
     
 
  


   




      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Tableau de bord
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-user-graduate mr-2" ></i>
                          Etudiants
                        </p>
                        <h2>{{$etudiant}}</h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                         Enseignants
                        </p>
                        <h2>{{$enseignant}}</h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                         Option
                        </p>
                        <h2>{{$option}}</h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Promotions
                        </p>
                        <h2>{{$promotion}}</h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                         Modules
                        </p>
                        <h2>{{$module}}</h2>
                      </div>
                     <!-- <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Pending
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>



            


          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                     <i class="fas fa-chart-line"></i>
                   Date Incription et Recrutement
                  </h4>
                 

                         <div id="columnchart_material" style="width: 480px; height: 300px;"></div>
                       

                  <div id="orders-chart-legend" class="orders-chart-legend"></div>                  
                </div>
              </div>
            </div>
            
         
              <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                     <i class="fas fa-chart-pie"></i>
                           Etudiants par option                  </h4>
                                  <div id="piechart" style="width: 480px; height: 300px;"></div>

                </div>
              </div>
            </div>
            </div>
          
          <div class="row">
           
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-calendar-alt"></i>
                    Calendar
                  </h4>
                  <div id="inline-datepicker-example" class="datepicker"></div>
                </div>
              </div>
            </div>
         

         
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-thumbtack"></i>
                    Todo
                  </h4>
                  <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
                  </div>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list">
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Meeting with Alisa
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                      <li class="completed">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked>
                            Call John
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Create invoice
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Print Statements
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                      <li class="completed">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked>
                            Prepare for presentation
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Pick up kids from school
                          </label>
                        </div>
                        <i class="remove fa fa-times-circle"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
 
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


</html>

