<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTRO DE DATOS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>REGISTRO DE DATOS</h1>
</div>

<div class="container">
    <form method="post" action="{{ route('form.ci.query') }}">
        @csrf
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h3>Ingrese Número de cedula para validar su registro</h3>
                <hr>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" class="form-control" id="cedula" name="cedula">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Validar</button>
    </form>
</div>
</body>
</html>
