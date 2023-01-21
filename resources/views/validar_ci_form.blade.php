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
    <script>
        var error_message = {!! json_encode(session('error')) !!};
    </script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>
<body>

<div class="jumbotron text-center">
    <h1>REGISTRO DE DATOS</h1>
</div>

<div class="container">
{{--    <form method="post" action="{{ route('form.ci.query') }}">--}}
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

<!-- Modal -->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="exampleModalLabel">Error</h3>
            </div>
            <div class="modal-body">
                <div class="message">
                    Información de registro no encotrada
                </div>
                <div class="information">
                    Para mayor informacion comunicarse al numero: <label class="number-label">09999999999</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
