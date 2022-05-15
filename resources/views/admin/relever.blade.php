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
                           <!-- <th>Nature</th>
                            <th style="width: 180.5px;">Code et Intitulé</th>
                            <th>Crédits Requis</th>
                            <th>Coef</th>-->
                            <th style="width: 200.5px;">Code                            
                            <th>Intitulé</th>
                            <th>contole</th>                                                      
                            <th >TPs</th>
                            <th >Examan</th>
                            <th >Note</th>
                          </tr>
                          @foreach($var1 as $module)
                          <tr>                           
                         <!--<td>1</td>
                             <td>2</td>
                             <td>3</td>-->
                             <td>{{$module->code}}</td>
                             <td>{{$module->libelle}}</td>              
                             <td>{{$module->note_cc}}</td>                           
                             <td>{{$module->note_tp}}</td>
                             <td>{{$module->note_ef}}</td>
                             @if(!empty('$module->note_cc') && empty('$module->note_tp'))
                             <td>{{$module->total}}</td>
                             @else
                             @if(!empty('$module->note_cc') || !empty('$module->note_tp'))
                             <td>{{$module->total/4}}</td>
                             @else
                             @if(empty('$module->note_cc') && empty('$module->note_tp'))
                             <td>{{$module->total}}</td>
                             @endif
                             @endif
                             @endif
                          </tr>                        
                          @endforeach
                          
                          
                          
                       </table>
                  </div>
                  <h6 class="card-title" style="text-align: center">Deuxiéme Semestre</h6>
                      <div class="col-lg-12 grid-margin stretch-card">
                        <table width="100%" border="2"cellpadding="5" id="sortable-table-2" class="table table-striped">
                         <tr>
                          <!--<th colspan="4" style="text-align: center">Unité d'Enseignement(U.E)</th>  -->               
                          <th colspan="5" style="text-align: center">Matiere(s) Contitutive de l'unité d'enseignement</th>
                          <th colspan="1">Résultats obtenus</th>
                         </tr>
                         <tr>                          
                           <!-- <th>Nature</th>
                            <th style="width: 180.5px;">Code et Intitulé</th>
                            <th>Crédits Requis</th>
                            <th>Coef</th>-->
                            <th style="width: 200.5px;">Code                            
                            <th>Intitulé</th>
                            <th>contole</th>                                                      
                            <th >TPs</th>
                            <th>Examan</th>
                            
                          </tr>
                          @foreach($var2 as $module)
                          <tr>                           
                         <!--<td>1</td>
                             <td>2</td>
                             <td>3</td>-->
                             <td>{{$module->code}}</td>
                             <td>{{$module->libelle}}</td>              
                             <td>{{$module->note_cc}}</td>                           
                             <td>{{$module->note_tp}}</td>
                             <td>{{$module->note_ef}}</td>
                             @if(empty('$module->note_cc') || empty('$module->note_tp'))
                             <td>{{$module->total/3}}</td>
                             @else 
                             <td>{{$module->total/4}}</td>
                             @endif
                          </tr>                        
                          @endforeach
                          
                              
                          
                       </table>
                        <!--<table width="100%" border="3" cellspacing="0" cellpadding="3">
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
                       </table>-->              
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