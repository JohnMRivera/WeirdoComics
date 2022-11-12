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
            <form class="form-login" action=" {{ route('pro_log') }} " method="post">
                @csrf
                <div class="titulo-login">
                    <h2>Ingresar</h2>
                </div>
                <div class="datos-login">
                    <div>
                        <input name="txtUsuario" type="text"  placeholder="Usuario">
                        {{-- <label class="lbl-usuario">
                            <span class="txt-usuario">Nombre</span>
                        </label> --}}
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
                        <a href=" {{ route('reg_usu') }} ">Crear una Cuenta</a>
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