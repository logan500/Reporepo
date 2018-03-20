<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vista ejemplo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<body>  

    {!! Form::model($user,['route'=>['user.update',$user->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name','Usuario: ') !!}
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

        {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    {!! Form::open(['route'=>['user.destroy',$user->id],'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
</body>
</html>