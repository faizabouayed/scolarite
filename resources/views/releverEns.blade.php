<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@foreach($b as $b)
  <title>Scolarité</title>
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
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html"><img src="/telechargement/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="/telechargement/avatar/{{ $b->photo }}" alt="logo"/></a>
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
              <img src="/telechargement/avatar/{{ $b->photo }}" alt="profile"/>
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
               <a href="/profile" ><img src="/telechargement/avatar/{{$b->photo}}" alt="image"/> </a>
              </div>
              <div class="profile-name">
                <p class="name">
                    
                          
                  Bonjour  {{$b->name}}

                </p>
                @endforeach
                <p class="designation">
                  {{$b->role}} {{$b->grade}}
                </p>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('index/')}}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
      
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="/modules" aria-expanded="false" aria-controls="e-commerce">
              <i class="fas icon-sm fa fa-list-alt menu-icon"></i>
             <span class="menu-title">Modules</span> 
              <i class="menu-arrow"></i>
            </a>
             <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
             
                <li class="nav-item"> <a class="nav-link" href="/Admin-User"> Admin </a></li>
                <li class="nav-item"> <a class="nav-link" href="/Enseignants-User"> Enseignants </a></li>

              </ul>
            </div>




        </li>-->
         <li class="nav-item">
            <a class="nav-link" href="/calendrier_en">
            <i class="fa fa-calendar menu-icon"></i>
             <span class="menu-title">Calendrier</span> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Lockscreen">
              <i class="fa fa-list-alt menu-icon"></i>
             <span class="menu-title">Lock screen</span> 
            </a>
          </li>


          <li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
<i class="fa fa-book menu-icon"></i>
<span class="menu-title">Promotions</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="page-layouts">
<ul class="nav flex-column sub-menu">
@foreach($m as $m)
<li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ URL::to('modules',[ $m->option,$m->id_pr]) }}">Promo {{$m->libelle_pr}} </a></li>



@endforeach

</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="/archives">
<i class="fa fa-list-alt menu-icon"></i>
<span class="menu-title">Archives</span>
</a>
</li>
          <!-----------------------------User-------------->
        
        </ul>
      </nav>
  

    
   <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>

   <!-- partial -->
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Relevé
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Enseignant</a></li>
                <li class="breadcrumb-item active" aria-current="page">Relevé</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-transform: uppercase;">Université Abou Bekr BelKaid -Tlemcen-</h4>
                  <p class="page-description">Faculté : de Sciences</p>
                  <p class="page-description">Departement : Informatique</p>
                  <p class="page-description">Promo: {{$etudiant->libelle_pr}}</p>

                  <h4 class="card-title" style="text-align: center;">RELEVE DE NOTE</h4>
                  <p class="page-description">Nom : {{$etudiant->nom}}  Prénom :{{$etudiant->prenom}}  Né (e) le :{{$etudiant->date_de_naissance}}  </p>
                 
                  <h5 class="card-title" style="text-align: center;">Premier Semestre <h6 style="text-align: right;">Niveau:{{$etudiant->niveau}}</h6></h5>
                     <div class="col-lg-12 grid-margin stretch-card">              
                       <table width="100%" border="2"cellpadding="5" id="sortable-table-2" class="table table-striped">
                         <tr>
                          <!--<th colspan="4" style="text-align: center">Unité d'Enseignement(U.E)</th>  -->               
                          <th colspan="5" style="text-align: center">Matiere(s) Contitutive de l'unité d'enseignement</th>
                          <th colspan="1">Résultats obtenus</th>
                         </tr>
                         <tr>                          
                           
                            <th style="width: 200.5px;">Code                            
                            <th>Intitulé</th>
                            <th>contole</th>                                                      
                            <th >TPs</th>
                            <th >Examan</th>
                            <th >Note</th>
                          </tr>
                          <?php
                          $somme1=0;
                          $n1=$nbrMS1;
                          ?>
                           
                          @foreach($var1 as $module)
                          <tr>                           
                         
                            
                             <td>{{$module->code}}</td>
                             <td>{{$module->libelle}}</td>              
                             <td>{{$module->note_cc}}</td>                           
                             <td>{{$module->note_tp}}</td>
                             <td>{{$module->note_ef}}</td>
                             @if(($module->note_cc==NULL && $module->note_tp==NULL) )
                             <td>{{(float)($module->note_ef)}}</td>
                             <?php
                             $somme1+=(float)($module->note_ef);
                             ?>

                             @elseif(($module->note_cc==NULL) )
                             <td>{{number_format(((float)($module->note_tp)+(float)($module->note_ef)*2)/3,2)}}</td>
                            <?php
                            $somme1+=((float)($module->note_tp)+(float)($module->note_ef)*2)/3;
                            ?>
                             @elseif(($module->note_tp==NULL) )
                             <td>{{number_format(((float)($module->note_cc)+(float)($module->note_ef)*2)/3,2)}}</td>
                             <?php
                             $somme1+=((float)($module->note_cc)+(float)($module->note_ef)*2)/3;
                             ?>
                             @else 
                             <td>{{number_format(((float)($module->note_tp)+(float)($module->note_cc)+(float)($module->note_ef)*2)/4,2)}}</td>
                             <?php
                             $somme1+=((float)($module->note_tp)+(float)($module->note_cc)+(float)($module->note_ef)*2)/4;
                             ?>
                             @endif
                          </tr>                        
                          @endforeach
                          
                          
                          
                       </table>
                  </div>
                  <h6 class="card-title" style="text-align: center">Deuxiéme Semestre</h6>
                      <div class="col-lg-12 grid-margin stretch-card">
                        <table width="100%" border="2"cellpadding="5" id="sortable-table-2" class="table table-striped">
                         <tr>
                                       
                          <th colspan="5" style="text-align: center">Matiere(s) Contitutive de l'unité d'enseignement</th>
                          <th colspan="1">Résultats obtenus</th>
                         </tr>
                         <tr>                          
                           
                            <th style="width: 200.5px;">Code                            
                            <th>Intitulé</th>
                            <th>contole</th>                                                      
                            <th >TPs</th>
                            <th>Examan</th>
                            <th >Note</th>

                            
                          </tr>
                          <?php
                          $somme2=0;
                          $n2=$nbrMS2;
                          ?>
                          @foreach($var2 as $module)
                          <tr>                           
                         
                             <td>{{$module->code}}</td>
                             <td>{{$module->libelle}}</td>              
                             <td>{{$module->note_cc}}</td>                           
                             <td>{{$module->note_tp}}</td>
                             <td>{{$module->note_ef}}</td>
                             @if(($module->note_cc==NULL && $module->note_tp==NULL) )
                             <td>{{(float)($module->note_ef)}}</td>
                             <?php
                             $somme1+=(float)($module->note_ef);
                             ?>

                             @elseif(($module->note_cc==NULL) )
                             <td>{{number_format(((float)($module->note_tp)+(float)($module->note_ef)*2)/3,2)}}</td>
                            <?php
                            $somme2+=((float)($module->note_tp)+(float)($module->note_ef)*2)/3;
                            ?>
                             @elseif(($module->note_tp==NULL) )
                             <td>{{number_format(((float)($module->note_cc)+(float)($module->note_ef)*2)/3,2)}}</td>
                             <?php
                             $somme2+=((float)($module->note_cc)+(float)($module->note_ef)*2)/3;
                             ?>
                             @else 
                             <td>{{number_format(((float)($module->note_tp)+(float)($module->note_cc)+(float)($module->note_ef)*2)/4,2)}}</td>
                             <?php
                             $somme2+=((float)($module->note_tp)+(float)($module->note_cc)+(float)($module->note_ef)*2)/4;
                             ?>
                             @endif
                          </tr>                        
                          @endforeach
                          
                              
                          
                       </table>
                               
                      </div>
                      @if($n1!=0 && $n2!=0)
                      <p class="page-description">Moyenne génerale S1 : <?php $moy1=$somme1/$n1; $m1=number_format($moy1,2); echo "$m1";
                    ?></p>
                      <p class="page-description">Moyenne génerale S2  :<?php $moy2=$somme2/$n2; $m2=number_format($moy2,2); echo "$m2";
                    ?> </p>
                    <p class="page-description">Moyenne génerale   :<?php $moy=$moy1+$moy2; $m=$moy/2;
                    $n=number_format($m,2); echo "$n";
                    ?> </p>
                    @endif
                </div>
              </div>
            </div>

           
          </div>
        </div>
  