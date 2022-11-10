<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container col-md-6 vh-100 mt-5 align-items-center">
        <div class="card text-center font-monospace">
            <div class="card-body">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <form method="post" action="guardarEmpleado">
                @csrf
                <div class="input-group mb-3 m-lg-2 col-sm-7">
                    <input type="text" class="form-control" placeholder="Correo" name="txtCorreo" aria-describedby="basic-addon1">
                </div>
                @if ($errors->all())
                <p class="text-danger fst-italic">{{ $errors->first('txtCorreo') }}</p>

                @endif
                <div class="input-group mb-3 m-lg-2 col-sm-7">
                    <input type="password" class="form-control" placeholder="Contraseña" name="txtContraseña" aria-describedby="basic-addon1">
                </div>
                @if ($errors->all())
                <p class="text-danger fst-italic">{{ $errors->first('txtContraseña') }}</p>

                @endif

                    <div class="card-footer text-muted">
                        <button type="button" class="btn btn-danger">Entrar</button>
                    </div>
                    <div class="text-center p-3">
                        Si no estas registrado
                        <a clas="text-black" href="singup">Registrate</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>