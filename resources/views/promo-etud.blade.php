@extends('layouts.MenuAdmin')
@Section('content')      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Orders
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Etudiant</li>
                <li class="breadcrumb-item active" aria-current="page">Options</li>
                <li class="breadcrumb-item active" aria-current="page">Promotions</li>
                <li class="breadcrumb-item"><a href="#">Liste des etudiants</a></li>


              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Etudiants de Promo flanya
                   <!-- <button type="button" class="btn btn-danger btn-icon-text">
                      <i class="fa fa-upload btn-icon-prepend"></i>                                                    
                      Upload
                    </button> !-->
                    <button type="button" class="btn btn-info btn-icon-text">
                      Print
                      <i class="fa fa-print btn-icon-append"></i>                                                                              
                    </button>
                  </h4> 
                  
                  <div class="row grid-margin">
                    
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
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
                                  <a href="/Releve">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button></a>
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
                                  <a href="/Releve">
                                  <button class="btn btn-light">
                                    <i class="fa fa-eye text-primary" ></i>View
                                  </button></a>
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