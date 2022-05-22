 
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
                  <h4 class="card-title">Ajouter une Promotion</h4>

                  <form action= "{{url('promotions')}}" method="POST"> 

                     {{ csrf_field()}}

                    <fieldset>

                      <div class="form-group">
                        <label for="firstname">Option:</label>
                        <select class="form-control" id="exampleSelectGender" name="option" required>
                                 <option value="">--Please choose an option--</option>
                                 @foreach($listeOpt as $option)
                                <option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
                                 @endforeach
                                </select>                      
                      </div>
                      <div class="form-group">
                        <label for="lastname">Année de début:</label>
                        <input id="lastname" class="form-control" type="year" name="anneeD" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Année de fin:</label>
                        <input id="lastname" class="form-control" type="year" name="anneeF" required>
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