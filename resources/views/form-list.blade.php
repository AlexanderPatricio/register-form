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
    <script src="{{ asset('/js/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>
<body>

<div class="jumbotron text-center">
    <h1>REGISTRO DE DATOS</h1>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    <a class="btn btn-default" href="{{ route('form.ci') }}">< Inicio</a>
    <div class="row">
        <div class="col-md-12">
            <h3>Informacion Personal</h3>
            <hr>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" class="form-control" id="cedula" disabled value="{{ $datos->cedula }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="codigo_dactilar">Código Dactilar:</label>
                <input type="text" class="form-control" id="codigo_dactilar" disabled value="{{ $datos->codigo_dactilar }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombres">Nombres y Apellidos:</label>
                <input type="text" class="form-control" id="nombres" disabled value="{{ $datos->nombres }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="provincias">Provincia:</label>
                <input type="text" class="form-control" id="provincias" name="provincias" disabled value="{{ $datos->provincia }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cantones">Canton:</label>
                <input type="text" class="form-control" id="cantones" name="cantones" disabled value="{{ $datos->canton }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="parroquias">Parroquia:</label>
                <input type="text" class="form-control" id="parroquias" name="parroquias" disabled value="{{ $datos->parroquia }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" disabled value="{{ $datos->direccion }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="correo">Correo electronico:</label>
                <input type="email" class="form-control" id="correo" disabled value="{{ $datos->correo }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="celular">Número Celular:</label>
                <input type="text" class="form-control" id="celular" disabled value="{{ $datos->celular }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="convencional">Número Convencional:</label>
                <input type="text" class="form-control" id="convencional" disabled value="{{ $datos->convencional }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="estado_civil">Estado Civil:</label>
                <input type="text" class="form-control" id="estado_civil" disabled value="{{ $datos->estado_civil }}">
            </div>
        </div>
        @if ( $datos->estado_civil == 'Casado/a' )
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula_conyuge">Cédula Conyuge:</label>
                    <input type="text" class="form-control" id="cedula_conyuge" disabled value="{{ $datos->cedula_conyuge }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres_conyuge">Nombres y Apellidos Conyuge:</label>
                    <input type="text" class="form-control" id="nombres_conyuge" disabled value="{{ $datos->nombres_conyuge }}">
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                <label for="numero_hijos">Numero Hijos:</label>
                <input type="text" class="form-control" id="numero_hijos" disabled value="{{ $datos->numero_hijos }}">
            </div>
        </div>
    </div>
    <a class="btn btn-default" href="{{ route('form.ci') }}">Atras</a>
    <br><br><br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Información</h5>
            </div>
            <div class="modal-body">
                <div class="message">
                    Felicitaciones el mensaje aqui
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
