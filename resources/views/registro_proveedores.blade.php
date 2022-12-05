@extends('layouts.plantilla')

@section('titulo_documento', 'Registro de proveedores')

@section('contenido')

@if(session()->has('registrado'))

    {!! 
        "<script> Swal.fire({
          icon: 'success',
          title: 'Proveedor " . session()->get("agregar") . " se ha guardado exitosamente',
          showConfirmButton: false,
          timer: 2000
        }) </script>"
    !!}

@endif

<main class="main-reg_pro">
    <div>
        <form class="form-reg_pro" action=" {{ route('proveedor.store') }} " method="post">
            @csrf
            <div class="header-reg_pro">
                <h1>Registrar Proveedor</h1>
            </div>
            <div class="datos-reg_pro__scroll">
                <div class="datos-reg_pro">
                    <section class="datos-reg_pro__seccion">
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtEmpresaProveedor" type="text" value="{{ old('txtEmpresaProveedor') }}" placeholder="Empresa">
                                <label for="">Nombre</label>
                            </div>
                            @if($errors->first('txtEmpresaProveedor'))
                                <div class="alert2">
                                    <p> {{ $errors->first('txtEmpresaProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtDireccionProveedor" type="text" value="{{ old('txtDireccionProveedor') }}" placeholder="Dirección">
                                <label for="">Dirección</label>
                            </div>
                            @if($errors->first('txtDireccionProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtDireccionProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtPaisProveedor" type="text" value="{{ old('txtPaisProveedor') }}" placeholder="País">
                                <label for="">País</label>
                            </div>
                            @if($errors->first('txtPaisProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtPaisProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtContactoProveedor" type="text" value="{{ old('txtContactoProveedor') }}" placeholder="Contacto">
                                <label for="">Contacto</label>
                            </div>
                            @if($errors->first('txtContactoProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtContactoProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                    </section>
                    <section class="datos-reg_pro__seccion">
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtNoFijoProveedor" type="text" value="{{ old('txtNoFijoProveedor') }}" placeholder="No. Fijo">
                                <label for="">No. Fijo</label>
                            </div>
                            @if($errors->first('txtNoFijoProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtNoFijoProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtNoCelularProveedor" type="text" value="{{ old('txtNoCelularProveedor') }}" placeholder="No. Celular">
                                <label for="">No. Celular</label>
                            </div>
                            @if($errors->first('txtNoCelularProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtNoCelularProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtCorreoProveedor" type="text" value="{{ old('txtCorreoProveedor') }}" placeholder="Correo">
                                <label for="">Correo</label>
                            </div>
                            @if($errors->first('txtCorreoProveedor'))
                                <div style="color: red">
                                    <p> {{ $errors->first('txtCorreoProveedor') }} </p>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
            <div class="btn-reg_pro">
                <button>
                    Registrar
                </button>
            </div>
        </form>
        <div class="fondo-reg_pro"></div>
    </div>
</main>

@stop
