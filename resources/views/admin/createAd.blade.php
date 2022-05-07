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
                  <h4 class="card-title">Ajouter un enseignant</h4>
                    <form action= "{{url('Admin-User')}}" method="POST">
	                    {{ csrf_field()}}
                    <fieldset>
                     
                      <div class="form-group">
                        <label for="firstname">Nom:</label>
                        <input id="firstname" class="form-control" name="name" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Prenom:</label>
                        <input id="lastname" class="form-control" name="prenom" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">date de naissance:</label>
                        <input id="firstname" class="form-control" name="date_n" type="date" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">E-mail:</label>
                        <input id="firstname" class="form-control" name="email" type="email" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">Mot de passe:</label>
                        <input id="firstname" class="form-control" name="password" type="password" required>
                      </div>
                      <input class="btn btn-primary" type="submit" value="Enregistrer">
                      <button class="btn btn-light">Annuler</button>

                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
