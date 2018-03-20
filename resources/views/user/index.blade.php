<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vista ejemplo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1>Usuarios</h1>

    <table class="table">
      <thead>
        <th>Nombre</th>
        <th>Correo</th>
      </thead>
      @foreach($users as $user)
      <tbody>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{!! link_to_route('user.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']) !!}</td>
      </tbody>
      @endforeach
    </table>
</body>
</html>