
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
                <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Promotion</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      <div class="alert alert-warning" role="alert">
                          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Option</th>
                                <th>Libellé</th>
                                <th>Année</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>WD-61</td>
                                <td>Edinburgh</td>
            
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-edit text-sucess"></i>Edit
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-62</td>
                                <td>Doe</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light" onclick="window.location.href='promo-etud.html';">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                   <button class="btn btn-light">
                                    <i class="fa fa-edit text-sucess"></i>Edit
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-63</td>
                                <td>Sam</td>
                               
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-64</td>
                                <td>Joe</td>
                                
                                <td>
                                   <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-65</td>
                                <td>Edward</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-66</td>
                                <td>Stella</td>
                                
                                <td>
                                  <label class="badge badge-info">On hold</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-67</td>
                                <td>Jaqueline</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-68</td>
                                <td>Tim</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-69</td>
                                <td>John</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-70</td>
                                <td>Tom</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-71</td>
                                <td>Aleena</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-72</td>
                                <td>Alphy</td>
                                
                                <td>
                                  <select id="monselect">
                                    <option value="Licence">Licence</option>
                                    <option value="Master" selected>Master</option>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-73</td>
                                <td>Twinkle</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-74</td>
                                <td>Catherine</td>
                                
                                <td>
                                  <input type="date"></input>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-75</td>
                                <td>Daniel</td>
                                
                                <td>
                                  <select id="monselect">
                                    <option value="Licence">Licence</option>
                                    <option value="Master" selected>Master</option>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-76</td>
                                <td>Tom</td>
                                
                                <td>
                                  <select id="monselect">
                                    <option value="Licence">Licence</option>
                                    <option value="Master" selected>Master</option>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-77</td>
                                <td>Cris</td>
                                
                                <td>
                                  <label class="badge badge-warning">Open</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-78</td>
                                <td>Tim</td>
                               
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
                            </tr>
                            <tr>
                                <td>WD-79</td>
                                <td>Jack</td>
                                
                                <td>
                                  <label class="badge badge-danger">Pending</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button>
                                </td>
                            </tr>
                            <tr>
                                <td>WD-80</td>
                                <td>Tony</td>
                                
                                <td>
                                  <label class="badge badge-info">On hold</label>
                                </td>
                                <td class="text-right">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                  <button class="btn btn-light">
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
