@extends('layouts.plantilla')

@section('titulo_documento', 'singup')
@section('contenido')

    @if (session()->has('confirmacion'))
        {!! '<script> swal( "Todo correcto", "Usuario ' .
            session()->get('confirmacion') .
            ' ah sido registrado con éxito",  "success" ) </script> ' !!}
    @endif
    <div class="container col-md-6 mt-4 cardme cont">
        <div class="card text-center font-monospace cardme">
            <div class="card-header">
                <h3>Sing up</h3>
            </div>
            <form method="post" action="guardarRegistro">
                @csrf
                <div class="card-body">
                    <div class="form-floating mb-3 m-sm-2">
                        <input type="text" class="form-control" value="{{ old('TxtNombre') }}" id="floatingInput" name="TxtNombre" placeholder="text">
                        <label for="floatingInput">Nombres</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtNombre') }}</p>
                    @endif


                    <div class="form-floating mb-3 m-sm-2">
                        <input type="text" class="form-control" value="{{ old('TxtApellido') }}" id="floatingInput" name="TxtApellido" placeholder="text">
                        <label for="floatingInput">Apellidos</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtApellido') }}</p>
                    @endif
                    <div class="form-floating mb-3 m-sm-2">
                        <input type="text" class="form-control" value="{{ old('TxtUsuario') }}" id="floatingInput" name="TxtUsuario" placeholder="text">
                        <label for="floatingInput">Nombre de Usuario</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtUsuario') }}</p>
                    @endif
                    <div class="form-floating mb-3 m-sm-2">
                        <input type="text" class="form-control" value="{{ old('TxtE-mail') }}" id="floatingInput" name="TxtE-mail" placeholder="text">
                        <label for="floatingInput">E-mail</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtE-mail') }}</p>
                    @endif
                    <div class="form-floating mb-3 m-sm-2">
                        <input type="password" class="form-control"  id="floatingInput" name="TxtContraseña" placeholder="text">
                        <label for="floatingInput">Contraseña</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtContraseña') }}</p>
                    @endif
                    <div class="form-floating mb-3 m-sm-2">
                        <input type="password" class="form-control" id="floatingInput" name="TxtConfi" placeholder="text">
                        <label for="floatingInput">Confirmar contraseña</label>
                      </div>
                    @if ($errors->all())
                            <p class="text-danger fst-italic">{{ $errors->first('TxtConfi') }}</p>
                    @endif
                        <button type="submit" class="btn btn-danger">Guardar Usuario</button>
                        <div class="text-center p-3">
                            <a clas="text-black" href="/">Iniciar sesion</a>
                        </div>
                    </div>
                </div>
            </form>
     </div>
@stop
