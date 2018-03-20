<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vista ejemplo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    {!! Form::open(['route'=>'user.store','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('nombre','Usuario: ') !!}
            {!! Form::text('name',null,['class' =>'form-control','placeholder' => 'ingresa usuario']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','email: ') !!}
            {!! Form::text('email',null,['class' =>'form-control','placeholder' => 'ingresa email']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','password: ') !!}
            {!! Form::password('password',['class' =>'form-control','placeholder' => 'ingresa contraseña']) !!}
        </div>

        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <h1>Hola mundo desde crear turno</h1>
</body>
</html>