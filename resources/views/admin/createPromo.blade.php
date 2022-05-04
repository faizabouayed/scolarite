 @extends('layouts.MenuAdmin')
@Section('content')

<form action= "{{url('promotions')}}" method="POST"> 

{{ csrf_field()}} <!--for security bch mbnch cha ketbo la ken kyn attacks-->

<table>

          

          <tr><td>Option</td><td><select id="pet-select" name="option">
<option value="">--Please choose an option--</option>
@foreach($listeOpt as $option)
<option value="{{$option->id_opt}}">{{$option->libelle_opt}}</option>
@endforeach

</select>
</td></tr>
        <!-- <tr><td>Option</td><td><input type="text" name="option"></td></tr>-->
          <tr><td>Année de début</td><td><input type="year" name="anneeD"></td></tr>
          <tr><td>Année de fin</td><td><input type="year" name="anneeF"></td></tr>

</table>

<input type="submit" name="" value="Enregistrer"> <!--submit y3ayat l action li y3ayat l url b post w nmedoulha swlh li t3mro-->

</form>
<!--<datalist id="options">
@foreach($listeOpt as $option)
$op=$option->libelle_opt;-->
  <!--<option value="{{$option->id_opt}}"> {{$option->libelle_opt}}</option>
@endforeach
</datalist>-->
@endsection 