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
                  <h4 class="card-title">Ajouter un module</h4>

                  <form class="cmxform" id="signupForm" action= "{{url('module')}}" method="POST">
                    {{ csrf_field()}}

                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Libelle:</label>
                        <input id="firstname" class="form-control" name="libelle" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Code:</label>
                        <input id="lastname" class="form-control" name="code" type="text" required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Semestre:</label>
                        <select class="form-control" id="exampleSelectGender" name="semestre" required>
                                <option ></option>
                                <option >S1</option>
                                <option >S2</option>
                                
                        </select>                      
                      </div>

                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Option:</label>
                        <select class="form-control" id="exampleSelectGender" name="option" required>
                                 <option value=""></option>
                                 @foreach($listeOpt as $option)
                                <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                 @endforeach
                        </select>                      
                      </div>

                      <div class="form-group">
                        <div class="form-group">
                        <label for="firstname">Enseignat par:</label>
                        <select class="form-control" id="exampleSelectGender" name="enseignant">
                                 <option value=""></option>
                                 @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}    {{$user->prenom}}</option>
                                 @endforeach
                        </select>                      
                      </div>                          
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
