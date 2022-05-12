<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>EMAIL</title>
    </head>
    <body>
      <h1>lOGIN INFORMATION</h1>
      <p>Bonjour , {{$data['name']}} {{$data['prenom']}}</p>
      <p>votre email :{{$data['email']}}</p>
      <p>votre mdp :{{$data['password']}}</p>
    </body>

</html>