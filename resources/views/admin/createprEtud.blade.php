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
                  <h4 class="card-title">Ajouter un etudiant à la promotion : {{$promotion}}</h4>

                  <form action= "{{url('liste-des-etudiants')}}" method="POST"> 

                     {{ csrf_field()}}

                    <fieldset>

                                   
                      </div>
                      <div class="form-group">
                        <label for="lastname">Promotion:</label>
                        <input id="lastname" class="form-control" type="year" name="promotion" value="{{$promotion}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="firstname">Nom:</label>
                        <input id="firstname" class="form-control" name="nom" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Prenom:</label>
                        <input id="lastname" class="form-control" name="prenom" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">date de naissance:</label>
                        <input id="firstname" class="form-control" name="date_de_naissance" type="date" required>
                      </div>   
                      <div class="form-group">
                        <label for="firstname">date_inscription:</label>
                        <input id="firstname" class="form-control" name="date_inscription" type="date" required>
                      </div>           
                      <input class="btn btn-primary" type="submit" value="Enregistrer">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection 