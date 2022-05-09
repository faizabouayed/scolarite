@extends('layouts.MenuAdmin')
@Section('content')

      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Etudiant</a></li>
                <li class="breadcrumb-item active" aria-current="page">promotion</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Les Promotions</h4>
                 <div class="row grid-margin">
                  <a href="{{url('createPromo')}}">
                    <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Nouvel Promotion</button></a>
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
                          @foreach($promotions as $promotion )
                          <tbody>
                            <tr>
                                <td>{{$promotion->libelle_opt}}</td>
                                <td>{{$promotion->libelle_pr}}</td>
            
                                <td>
                                {{$promotion->annee_debut.'-'.$promotion->annee_fin}}
                                </td>
                               
                                
                                 <td class="text-right">
                                  @if(request()->has('trashed'))
                                    <a href="{{ route('promotions.restore', $promotion->id_pr) }}" class="btn btn-success">Restore</a>
                                   <!-- <button class="btn btn-light">
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button> -->
                                  <form method="POST" action="{{ route('promotions.supp', $promotion->id_pr) }}">
                                        @csrf
                                       <!-- {{method_field('delete')}}-->
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                                @else                                
                                    <form method="POST" action="{{ route('promotions.destroy', $promotion->id_pr) }}">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                    </form>
                    <button class="btn btn-light " type="button" value="{{$promotion->id_pr}}" id="popup" onclick="div_show()">
                     <i class="fa fa-edit text-success"></i>edit</button>
                     <a href="{{ route('promos.viewEtud', $promotion->libelle_pr) }}" class="btn btn-success">View</a>
                                @endif
                                  
                                </td>
                                
                            </tr>
                            
                          </tbody>
                          @endforeach
                        </table>
                              <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('promotions.index') }}" class="btn btn-info">View All promotions</a>
                    <a href="{{ route('promotions.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('promotions.index', ['trashed' => 'promotion']) }}" class="btn btn-primary">View Deleted promotions</a>
                @endif
            </div>
        </div>
        <!--pop up-->
        <div id="popupContact">
<!-- Contact Us Form -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this promotion?')) {
                        e.preventDefault();
                    }
                });
            });
        </script>
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
