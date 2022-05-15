 
@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="main-panel">
         <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>

                  <div class="modal" id="user{{$user->id}}">
  <div class="modal-dialog modal-dialog-centered modal-dm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         
      </div>

      <!-- Modal body -->
      <div class="modal-body mx-auto">
         
        <div class="row align-items-center mb-3">
          <p> Voulez-vous vraiment supprimer <br>
            @foreach($modules as $modules)
            <b> {{$modules->libelle}}  </b> 
            @endforeach
          </p>
          
    </div>
    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection 