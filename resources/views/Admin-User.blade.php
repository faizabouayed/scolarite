
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
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
              </ol>
            </nav>
           <!-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
              </ol>
            </nav>-->
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les admin</h4>
                  
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
                            <tr>
                                <td></td>
                                <td>Edinburgh</td>
                                <td>York</td>
                                <td>12-02-1967</td>

                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
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
   <script src="../../js/alerts.js"></script>
  <script src="../../js/avgrund.js"></script>
  <!-- End custom js for this page-->
@endsection