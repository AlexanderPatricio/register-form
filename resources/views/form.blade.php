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
                    <input type="text" class="form-control" id="codigo_dactilar" name="codigo_dactilar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres">Nombres y Apellidos:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="provincias">Provincia:</label>
                    <select class="form-control provincias-select" id="provincias" name="provincias">
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
                    <select class="form-control parroquias-select" id="parroquias" name="parroquias">
                        <option value="" selected disabled hidden>Seleccione una Opción</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="correo">Correo electronico:</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="celular">Número Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="convencional">Número Convencional:</label>
                    <input type="text" class="form-control" id="convencional" name="convencional">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula_conyuge">Nombres y Apellidos Conyuge:</label>
                    <input type="text" class="form-control" id="cedula_conyuge" name="cedula_conyuge">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres_conyuge">Nombres y Apellidos Conyuge:</label>
                    <input type="text" class="form-control" id="nombres_conyuge" name="nombres_conyuge">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_hijos">Numero Hijos:</label>
                    <input type="text" class="form-control" id="numero_hijos" name="numero_hijos">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="comprobante_deposito">Comprobante de deposito:</label>
                    <input type="file" class="form-control" id="comprobante_deposito" name="comprobante_deposito">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="frontal_cedula">Foto Frontal de Cedula:</label>
                    <input type="file" class="form-control" id="frontal_cedula" name="frontal_cedula">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="posterior_cedula">Foto Posterior de Cedula:</label>
                    <input type="file" class="form-control" id="posterior_cedula" name="posterior_cedula">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Guardar</button>
    </form>
</div>
</body>
</html>
