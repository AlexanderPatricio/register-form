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
        var provinces = {!! json_encode($provinces) !!};
    </script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>
<body>

<div class="jumbotron text-center">
    <h1>REGISTRO DE DATOS</h1>
</div>

<div class="container">
    <form method="post" action="{{ route('form.data.store', [$cedula]) }}" enctype="multipart/form-data">
        @csrf
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
                    <input type="text" class="form-control" id="cedula" disabled value="{{ $cedula }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo_dactilar">Código Dactilar:</label>
                    <input type="text" class="form-control" maxlength="10" pattern="[A-Za-z0-9]*" id="codigo_dactilar" name="codigo_dactilar"
                           oninput="this.value = this.value.toUpperCase()" onkeypress="validateCodigoD(event);" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres">Nombres y Apellidos:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" maxlength="100" onkeypress="validateName(event);" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="provincias">Provincia:</label>
                    <select class="form-control provincias-select" id="provincias" name="provincias" required>
                        <option value="" selected disabled hidden>Seleccione una Opción</option>
                        @foreach ($provinces as $key => $province)
                            @isset($province['provincia'])
                                <option value="{{ $key }}">{{ $province['provincia'] }}</option>
                            @endisset
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cantones">Canton:</label>
                    <select class="form-control cantones-select" id="cantones" name="cantones">
                        <option value="" selected disabled hidden>Seleccione una Opción</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parroquias">Parroquia:</label>
                    <select class="form-control parroquias-select" id="parroquias" name="parroquias" required>
                        <option value="" selected disabled hidden>Seleccione una Opción</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="correo">Correo electronico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="celular">Número Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular" onkeypress="validatePhone(event);" maxlength="13">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="convencional">Número Convencional (Opcional):</label>
                    <input type="text" class="form-control" id="convencional" name="convencional" maxlength="15" onkeypress="validatePhone(event);">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil:</label>
                    <select class="form-control estado_civil-select" id="estado_civil" name="estado_civil">
                        <option value="" selected disabled hidden>Seleccione una Opción</option>
                        <option value="Soltero/a">Soltero/a</option>
                        <option value="Casado/a">Casado/a</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 cedula-conyuge-div">
                <div class="form-group">
                    <label for="cedula_conyuge">Numero Cédula Conyuge:</label>
                    <input type="text" class="form-control" id="cedula_conyuge" name="cedula_conyuge" onkeypress="validatePhone(event);" maxlength="10">
                </div>
            </div>
            <div class="col-md-6 nombre-conyuge-div">
                <div class="form-group">
                    <label for="nombres_conyuge">Nombres y Apellidos Conyuge:</label>
                    <input type="text" class="form-control" id="nombres_conyuge" name="nombres_conyuge" onkeypress="validateName(event);">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_hijos">Numero Hijos:</label>
                    <input type="text" class="form-control" id="numero_hijos" name="numero_hijos">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Guardar</button>
        <br><br><br><br>
    </form>
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
