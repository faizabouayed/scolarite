

@extends('layouts.MenuAdmin')
@Section('content')
      <!-- partial -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            
           
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un enseignant</h4> 
                <form action= "{{url('Enseignants-User')}}" method="POST">
	                {{ csrf_field()}}
                 	<table>
                        <tr><td>nom</td><td><input type="text" name="name"></td></tr>
		                    <tr><td>prenom</td><td><input name="prenom"></input ></td></tr>
		                    <tr><td>date de naissance </td><td><input type="date" name="date_n"></td></tr>
	    	                <tr><td>grade</td><td><input name="grade"></input></td></tr>
	                </table>
	                <input type="submit" name="" value="Enregistrer">
                </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>





@endsection
