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

@if(session()->has('correo_no_disponible'))

  <script>
      Swal.fire(
          'Correo no disponible!',
          'El correo ingresado ya esta en uso!',
          'error'
      )
  </script>

@endif

    <main class="main-login">
        <div class="contenido-login">
            <header class="header-login">
                <h1>Weirdo Comics</h1>
            </header>
            <form class="form-login" action=" {{ route('usuario.store') }} " method="post">
                @csrf
                <div class="titulo-login">
                    <h2>Registro</h2>
                </div>
                <div class="scroll-registro-usuario">
                  <div class="datos-login">
                    <div>
                        <input name="txtNombre" type="text" placeholder="Nombre" value="{{ old('txtNombre') }}">
                    </div>
                    @if($errors->first('txtNombre'))
                      <div class="alert">
                        <p> {{ $errors->first('txtNombre') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtApellidoP" type="text"  placeholder="Apellido Paterno" value="{{ old('txtApellidoP') }}">
                    </div>
                    @if($errors->first('txtApellidoP'))
                      <div class="alert">
                        <p> {{ $errors->first('txtApellidoP') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtApellidoM" type="text"  placeholder="Apellido Materno" value="{{ old('txtApellidoM') }}">
                    </div>
                    @if($errors->first('txtApellidoM'))
                      <div class="alert">
                        <p> {{ $errors->first('txtApellidoM') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtCorreo" type="text"  placeholder="Correo" value="{{ old('txtCorreo') }}">
                    </div>
                    @if($errors->first('txtCorreo'))
                      <div class="alert">
                        <p> {{ $errors->first('txtCorreo') }} </p>
                      </div>
                    @endif
                    <div>
                      <input name="txtContra" type="text" placeholder="Contraseña" value="{{ old('txtContra') }}">
                    </div>
                    @if($errors->first('txtContra'))
                      <div class="alert">
                        <p> {{ $errors->first('txtContra') }} </p>
                      </div>
                    @endif
                    <div>
                      <input name="txtConfirmarContra" type="text" placeholder="Confirmar Contraseña" value="{{ old('txtConfirmarContra') }}">
                    </div>
                    @if($errors->first('txtConfirmarContra'))
                      <div class="alert">
                        <p> {{ $errors->first('txtConfirmarContra') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtRol" type="text" placeholder="Rol" value="{{ old('txtRol') }}">
                    </div>
                    @if($errors->first('txtRol'))
                      <div class="alert">
                        <p> {{ $errors->first('txtRol') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtTelefono" type="text"  placeholder="Telefono" value="{{ old('txtTelefono') }}">
                    </div>
                    @if($errors->first('txtTelefono'))
                      <div class="alert">
                        <p> {{ $errors->first('txtTelefono') }} </p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="btn-login">
                    <div>
                        <button> <a>Registrar</a> </button>
                    </div>
                    <div>
                      <p>¿Ya tienes una cuenta?
                        <a href=" {{ route('log') }} ">Inciar Sesión</a>
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