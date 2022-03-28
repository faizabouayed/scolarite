@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Sortable table
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sortable table</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Unoversité Abou Bekr BelKaid -Tlemcen-</h4>
                  <p class="page-description">Faculté : de Sciences</p>
                  <p class="page-description">Departement : Informatique</p>
                  <h4 class="card-title" style="text-align: center">RELEVE DE NOTE</h4>
                  <p class="page-description">Nom : 
                  Prénom : Né (e) le : </p>

                  <!--<div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-1" class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Product<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Amount<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Deadline<i class="fa fa-angle-down"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Herman Beck</td>
                            <td>John</td>
                            <td>Photoshop</td>
                            <td>$456.00</td>
                            <td>12 May 2017</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Herman Beck</td>
                            <td>Conway</td>
                            <td>Flash</td>
                            <td>$965.00</td>
                            <td>13 May 2017</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>John Richards</td>
                            <td>Alex</td>
                            <td>Premeire</td>
                            <td>$255.00</td>
                            <td>14 May 2017</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>John Richards</td>
                            <td>Jason</td>
                            <td>After effects</td>
                            <td>$975.00</td>
                            <td>15 May 2017</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Messsy max</td>
                            <td>Back</td>
                            <td>Ilustrator</td>
                            <td>$298.00</td>
                            <td>16 May 2017</td>
                          </tr>
                        </tbody>
                      </table>
                      <p>Semster 2</p>
                      <table id="sortable-table-1" class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Product<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Amount<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Deadline<i class="fa fa-angle-down"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Herman Beck</td>
                            <td>John</td>
                            <td>Photoshop</td>
                            <td>$456.00</td>
                            <td>12 May 2017</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Herman Beck</td>
                            <td>Conway</td>
                            <td>Flash</td>
                            <td>$965.00</td>
                            <td>13 May 2017</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>John Richards</td>
                            <td>Alex</td>
                            <td>Premeire</td>
                            <td>$255.00</td>
                            <td>14 May 2017</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>John Richards</td>
                            <td>Jason</td>
                            <td>After effects</td>
                            <td>$975.00</td>
                            <td>15 May 2017</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Messsy max</td>
                            <td>Back</td>
                            <td>Ilustrator</td>
                            <td>$298.00</td>
                            <td>16 May 2017</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>-->
                  <h5 class="card-title" style="text-align: center">Premier Semestre</h5>

                  <div class="col-lg-12 grid-margin stretch-card">
             <!-- <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Unité d'Enseignement(U.E)

                          </th>
                          <th>
                            Matierz
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            6
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            7
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
               
              </div>-->

              <table width="100%" border="1" cellspacing="0" cellpadding="5">
                 <tr>
                 <td colspan="4" style="text-align: center">Unité d'Enseignement(U.E)</td>                 
                 <td colspan="3" style="text-align: center">Matiere(s) Contitutive de l'unité d'enseignement</td>
                 <td colspan="2">Résultats obtenus</td>
                 </tr>
                 <tr>
                 <td>Nature</td>
                 <td style="width: 180.5px;">Code et Intitulé</td>
                 <td>Crédits Requis</td>
                 <td>Coef</td>
                 <td style="width: 200.5px;">Intitulé</td>
                 <td>Crédits Requis</td>
                 <td>Coef</td>
                 <td colspan="2">Matiere(s)</td>
                 <td colspan="2">U.E</td>
                </tr>
                <tr>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                </tr>
                <tr>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                 <td>Contenu</td>
                </tr>
              </table>
            </div>
                </div>
              </div>
            </div>
           <!-- <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Sortable Table</h4>
                  <p class="page-description">Add class <code>.table-striped</code> for table</p>
                  <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-2" class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Product<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Amount<i class="fa fa-angle-down"></i></th>
                            <th class="sortStyle">Deadline<i class="fa fa-angle-down"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Herman Beck</td>
                            <td>John</td>
                            <td>Photoshop</td>
                            <td>$456.00</td>
                            <td>12 May 2017</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Herman Beck</td>
                            <td>Conway</td>
                            <td>Flash</td>
                            <td>$965.00</td>
                            <td>13 May 2017</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>John Richards</td>
                            <td>Alex</td>
                            <td>Premeire</td>
                            <td>$255.00</td>
                            <td>14 May 2017</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>John Richards</td>
                            <td>Jason</td>
                            <td>After effects</td>
                            <td>$975.00</td>
                            <td>15 May 2017</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Messsy max</td>
                            <td>Back</td>
                            <td>Ilustrator</td>
                            <td>$298.00</td>
                            <td>16 May 2017</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
    <!-- page-body-wrapper ends -->
  
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/tablesorter.js"></script>
  <!-- End custom js for this page-->

@endsection