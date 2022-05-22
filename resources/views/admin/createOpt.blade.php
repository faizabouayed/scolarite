
 
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

                  <form action= "{{url('options')}}" method="POST">

                  {{ csrf_field()}}

                    <fieldset>
                      <div class="form-group">
                        <label for="lastname">Libellé:</label>
                        <input id="lastname" class="form-control" type="year" name="libelle_opt" required>
                      </div>                    

                      <div class="form-group">
                        <label for="firstname">Niveau:</label>
                        <select class="form-control" id="exampleSelectGender" name="niveau" required>
                                <option value="niveau"></option>                                
                                <option name="niveau">licence</option>
                                <option name="niveau">master</option>
                        </select>                      
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



