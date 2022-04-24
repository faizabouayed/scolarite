@extends('layouts.MenuEnseignant')
@Section('content')



     <!-- partial -->

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Modules
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modules</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modules</h4>
                  

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Module</th>
                                <th>Option</th>
                                <th>Code</th>
                                <th>Semestre</th>
                                
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($mo as $f)
                            <tr>
                                <td>{{$f->libelle}}</td>
                                <td>{{$f->libelle_opt}}</td>
                                <td>{{$f->code}}</td>
                                <td>{{$f->semestre}}</td>
                                <td>
                                  <label class="badge badge-info">
                                  <i class="fa fa-print btn-icon-append"></i>  

                                  Télécharger</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>  Liste Etudiants
                                  </button>
                                 <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Supprimer
                                  </button> -->
                                    <a href="{{ URL::to('notes/'.$f->id_mod) }}"><button class="btn btn-light">
                                    <i class="fa fa-edit text-success"></i>  Notes
                                  </button> </a>
                                </td>
                            </tr>
                             @endforeach

                           <!-- <tr>
                                <td>WD-69</td>
                                <td>John</td>
                                <td>Tokyo</td>
                                <td>$2100</td>
                               
                                <td>
                                  <label class="badge badge-success">Closed</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr> -->
                           
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
