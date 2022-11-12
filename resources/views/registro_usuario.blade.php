<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/estilos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <main class="main-login">
        <div class="contenido-login">
            <header class="header-login">
                <h1>Weirdo Comics</h1>
            </header>
            <form class="form-login" action=" {{ route('pro_reg_usu') }} " method="post">
                @csrf
                <div class="titulo-login">
                    <h2>Ingresar</h2>
                </div>
                <div class="scroll-registro-usuario">
                  <div class="datos-login">
                    <div>
                        <input name="txtCorreo" type="text"  placeholder="Correo">
                    </div>
                    @if($errors->first('txtCorreo'))
                      <div class="alert">
                        <p> {{ $errors->first('txtCorreo') }} </p>
                      </div>
                    @endif
                    <div>
                        <input name="txtUsuario" type="text" placeholder="Usuario">
                    </div>
                    @if($errors->first('txtUsuario'))
                      <div class="alert">
                        <p> {{ $errors->first('txtUsuario') }} </p>
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
                    <div>
                      <input name="txtConfirmarContra" type="text" placeholder="Confirmar Contraseña">
                    </div>
                    @if($errors->first('txtConfirmarContra'))
                      <div class="alert">
                        <p> {{ $errors->first('txtConfirmarContra') }} </p>
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