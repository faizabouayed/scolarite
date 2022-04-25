 @extends('layouts.MenuAdmin')
@Section('content')

<form action= "{{url('options')}}" method="POST"> <!--nmchiw la route articles li tedina l store-->

{{ csrf_field()}} <!--for security bch mbnch cha ketbo la ken kyn attacks-->

<table>

          <tr><td>ID</td><td><input type="text" name="ID"></td></tr>

          <tr><td>Libelle</td><td><input type="text" name="libelle"></td></tr>
          <tr><td>Niveau</td><td><input type="text" name="niveau"></td></tr>
</table>

<input type="submit" name="" value="Enregistrer"> <!--submit y3ayat l action li y3ayat l url b post w nmedoulha swlh li t3mro-->

</form>
@endsection 



