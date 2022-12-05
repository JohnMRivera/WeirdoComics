<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/estilos.css">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
</head>
<body>

@if(session()->has('registrado'))

    <script>
        Swal.fire(
            'Registro Exitoso!',
            'El usuarioha sido registrado exitosamente!',
            'success'
        )
    </script>


@elseif(session()->has('correo_no_disponible'))

  <script>
      Swal.fire(
          'Correo no disponible!',
          'El correo ingresado ya esta en uso!',
          'error'
      )
  </script>

@elseif(session()->has('incorrecto'))

    <script>
        Swal.fire(
            'Vuelva a intentarlo!',
            'Correo o contraseña incorrectos!',
            'error'
        )
    </script>

@endif
    <main class="main-login">
        <div class="contenido-login">
            <header class="header-login">
                <h1>Weirdo Comics</h1>
            </header>
            <form class="form-login" action=" {{ route('pro_log') }} " method="post">
                @csrf
                <div class="titulo-login">
                    <h2>Ingresar</h2>
                </div>
                <div class="datos-login">
                    <div>
                        <input name="txtCorreo" type="text"  placeholder="Nombre" value="{{ old('txtCorreo') }}">
                        {{-- <label class="lbl-usuario">
                            <span class="txt-usuario">Nombre</span>
                        </label> --}}
                    </div>
                    @if($errors->first('txtCorreo'))
                        <div class="alert">
                            <p> {{ $errors->first('txtCorreo') }} </p>
                        </div>
                    @endif
                    <div>
                        <input name="txtContra" type="text" placeholder="Contraseña">
                    </div>
                    @if($errors->first('txtContra'))
                        <div class="alert">
                            <p> {{ $errors->first('txtContra') }} </p>
                        </div>
                    @endif
                    {{-- @foreach($errors->all() as $error)
                        <div class="alert" style="width:83%">
                            <p> {{ $error }} </p>
                        </div>
                    @endforeach --}}
                </div>
                <div class="btn-login">
                    <div>
                        <button> <a>Iniciar Sesión</a> </button>
                    </div>
                    <div>
                      <p>¿Eres nuevo en WeirdoComics?
                        <a href=" {{ route('usuario.create') }} ">Crear una Cuenta</a>
                      </p>
                    </div>
                </div>
            </form>
            <footer class="footer-login">
                <p>Siu</p>
            </footer>
        </div>
        <div class="fondo-login"></div>
    </main>
</body>
</html>