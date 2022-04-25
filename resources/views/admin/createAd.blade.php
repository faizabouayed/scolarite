@extends('layouts.MenuAdmin')
@Section('content')
      
  <form action= "{{url('Admin-User')}}" method="POST">
	{{ csrf_field()}}
	<table>
    <tr><td>Nom:</td><td><input type="text" name="name"></td></tr>
		<tr><td>Prenom:</td><td><input name="prenom"></input ></td></tr>
		<tr><td>Date de naissance:</td><td><input type="date" name="date_n"></td></tr>
	</table>
	<input type="submit" name="" value="Enregistrer">
</form>
   

@endsection
