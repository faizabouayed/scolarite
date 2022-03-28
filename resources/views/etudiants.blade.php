
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
                <li class="breadcrumb-item"><a href="#">Liste des étudiants</a></li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des Etudiants</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
                  </div>
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
                                <th>Promo</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>cc</td>
                                <td>Eddine</td>
                                <td>Sawssen</td>
                                <td>25-03-2001</td>
                                <td>SIC 112</td>
            
                                
                                <td class="text-right">
                                  <a href="/Releve">
                                   <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
                                  <button class="btn btn-light">
                                    <i class="fa fa-edit text-success "></i>Edit
                                  </button>
                                  <button class="btn btn-light" onclick="showSwal('warning-message-and-cancel')">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            
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


  
   <script src="../../js/alerts.js"></script>
  <script src="../../js/avgrund.js"></script>
  @endsection