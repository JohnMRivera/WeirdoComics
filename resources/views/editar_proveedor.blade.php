@extends('layouts.plantilla')

@section('contenido')

    <main class="main-editar">
        @foreach($proveedorId as $proveedor)
        <form action="{{ route('proveedor.update', $proveedor->id_proveedor) }}" method="post">
            @csrf
            @method('put')
            <div class="editar-titulo">
                <h1>Editar Proveedor</h1>
            </div>
            <div class="editar-inputs">
                <div>
                    <div class="input-reg_pro">
                        <input name="txtEmpresaProveedor" type="text" value="{{ $proveedor->empresa }}" placeholder="Empresa">
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
                        <input name="txtDireccionProveedor" type="text" value="{{ $proveedor->direccion }}" placeholder="Dirección">
                        <label for="">Dirección</label>
                    </div>
                    @if($errors->first('txtDireccionProveedor'))
                        <div class="alert2">
                            <p> {{ $errors->first('txtDireccionProveedor') }} </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtPaisProveedor" type="text" value="{{ $proveedor->pais }}" placeholder="País">
                        <label for="">País</label>
                    </div>
                    @if($errors->first('txtPaisProveedor'))
                    <div class="alert2">
                            <p> {{ $errors->first('txtPaisProveedor') }} </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtContactoProveedor" type="text" value="{{ $proveedor->contacto }}" placeholder="Contacto">
                        <label for="">Contacto</label>
                    </div>
                    @if($errors->first('txtContactoProveedor'))
                    <div class="alert2">
                            <p> {{ $errors->first('txtContactoProveedor') }} </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNoFijoProveedor" type="text" value="{{ $proveedor->no_fijo }}" placeholder="No. Fijo">
                        <label for="">No. Fijo</label>
                    </div>
                    @if($errors->first('txtNoFijoProveedor'))
                    <div class="alert2">
                            <p> {{ $errors->first('txtNoFijoProveedor') }} </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNoCelularProveedor" type="text" value="{{ $proveedor->no_celular }}" placeholder="No. Celular">
                        <label for="">No. Celular</label>
                    </div>
                    @if($errors->first('txtNoCelularProveedor'))
                    <div class="alert2">
                            <p> {{ $errors->first('txtNoCelularProveedor') }} </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtCorreoProveedor" type="text" value="{{ $proveedor->correo }}" placeholder="Correo">
                        <label for="">Correo</label>
                    </div>
                    @if($errors->first('txtCorreoProveedor'))
                    <div class="alert2">
                            <p> {{ $errors->first('txtCorreoProveedor') }} </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="editar-btn">
                <button type="submit">Actualizar</button>
            </div>
        </form>
        @endforeach
    </main>

@endsection