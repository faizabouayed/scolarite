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