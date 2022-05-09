
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
    <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left:0%;
        top: 10%;
        width: 100%;
        height: 100%;
        overflow: auto;
       /* background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);*/
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      h2,
      p {
        margin: 0 0 20px;
        font-weight: 400;
        color: #999;
      }
      span {
        color: #666;
        display: block;
        padding: 0 0 5px;
      }
      form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #eee;
      }
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      /*.contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      /*button:hover {
        background: #2371a0;
      }*/
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
     /* button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }*/
      /*button.button:hover {
        border-bottom: #a99567 1px solid;
        color: #a99567;
      }*/
    </style>     

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des mos
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">mos</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les mos</h4> 
                 <a href="{{url('mo/createMod')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add mos</button></a><br><br>              
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">                             
                                <th>Libelle</th>
                                <th>Code</th>    
                                <th>Option</th>   
                                <th>Promo</th> 
                                <!--<th>Anneé</th> -->     
                                <th>Enseinger Par</th>                 
                                <th>Actions</th>                               
                            </tr>
                          </thead>                                                
                          <tbody>
                            @foreach($modules as $module)

                            <tr> 
                                <input type="hidden" class="serdelete_val_id" value="{{$module->id}}">                               
                                <td>{{$module->libelle}} </td>
                                <td>{{$module->code}}</td>
                                <td>{{$module->libelle_opt}}</td>
                                <td>{{$module->libelle_pr}}</td>
                                <td>{{$module->name}} {{$module->prenom}}</td>                               
                                <td class="text-right">
                                  <p>
                                  <button class="btn btn-light button" data-modal="modalOne" >
                                  <i class="fa fa-edit text-success "></i>Edit
                                  </button>                                 
                                 </p>                                                              
                                
                                @if(request()->has('trashed'))
                                <a href="{{ route('module.restore', $module->id_mod) }}" class="btn btn-success">Restore</a>
                                   
                                   <form method="POST" action="{{ route('module.supp', $module->id_mod) }}">
                                         @csrf
                                         <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                     </form>
                                 @else                                
                                     <form method="POST" action="{{ route('module.destroy', $module->id_mod) }}">
                                         @csrf
                                         {{method_field('delete')}}
                                         <input name="_method" type="hidden" value="DELETE">
                                         <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                     </form>
                                      <button class="btn btn-light " type="button" value="{{$module->id_mod}}" id="popup" onclick="div_show()">
                                      <i class="fa fa-edit text-success"></i>edit</button>
                    
                                @endif
                                  
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                          
                        </table>
                        <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('module.index') }}" class="btn btn-info">View All modules</a>
                    <a href="{{ route('module.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('module.index', ['trashed' => 'module']) }}" class="btn btn-primary">View Deleted modules</a>
                @endif
            </div>
        </div>
        <!--pop up-->
        <div id="popupContact">
<!-- Contact Us Form -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this module?')) {
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
        
        <!-- partial -->
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
   <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!--<script src="../../js/alerts.js"></script>-->
  <!-- <script src="../../js/delete.js"></script>-->
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- edit -->


 <!-- <script src="../../js/avgrundEns.js"></script>-->
  <!-- End custom js for this page-->
@endsection








