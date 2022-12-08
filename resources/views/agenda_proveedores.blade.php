@extends('layouts.plantilla')

@section('contenido')

@if(session()->has('eliminado'))

    <script>
        Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Eliminado!',
              'El proveedor ha sido eliminado.',
              'success'
            )
          }
        })
    </script>

@endif

<main class="main-proveedores">
    <div class="form-proveedores">
        <div class="header-proveedores">
            <div class="header-proveedores__titulo" for="">
                <h1>Listado de proveedores</h1>
            </div>
            <div class="header-proveedores__buscador">
                <input type="text" placeholder="Buscar">
            </div>
        </div>
        <div class="contenido-scroll">
            <div class="contenido-proveedores">
                @foreach($proveedores as $proveedor)

                <form action=" {{ route('proveedor.destroy', $proveedor->id_proveedor) }} " method="post">
                    <div class="contenido-proveedores__lista">
                        @csrf
                        @method('delete')
                        <div class="c-p__lista-foto">
                            <img src="/img/siu.png" alt="">
                        </div>
                        <div class="c-p__lista-datos">
                            <label for="">Empresa: {{ $proveedor->empresa }}</label>
                            <label for="">Dirección: {{ $proveedor->direccion }}</label>
                            <label for="">País: {{ $proveedor->pais }}</label>
                        </div>
                        <div class="c-p__lista-datos">
                            <label for="">Contacto: {{ $proveedor->contacto }}</label>
                            <label for="">No. Fijo: {{ $proveedor->no_fijo }}</label>
                            <label for="">No. Celular: {{ $proveedor->no_celular }}</label>
                        </div>
                        <div class="c-p__lista-datos">
                            <label for="">Correo: {{ $proveedor->correo }}</label>
                        </div>
                        <div class="c-p__lista-op">
                            <button> 
                                <img src="/img/eliminar.png" alt="">
                            </button>
                            <a href="{{ route('proveedor.edit', $proveedor->id_proveedor) }}"> 
                                <img src="/img/recargar.png" alt=""> 
                            </a>
                            <a href=" {{ route('pedido.create', [$proveedor->id_proveedor, $id_usuario, 'todos', 'vacio']) }} "> 
                                <img src="/img/pedido.png" alt=""> 
                            </a>
                        </div>
                    </div>
                </form>
                
                @endforeach
                @for($i = 1; $i <= 0; $i++)
                <div class="contenido-proveedores__lista">
                    <div class="c-p__lista-foto">
                        <img src="img/siu.png" alt="">
                    </div>
                    <div class="c-p__lista-datos">
                        <label for="">Nombre_Empresa</label>
                        <label for="">Dirección</label>
                        <label for="">País</label>
                    </div>
                    <div class="c-p__lista-datos">
                        <label for="">Contacto</label>
                        <label for="">No. Fijo</label>
                        <label for="">No. Celular</label>
                    </div>
                    <div class="c-p__lista-datos">
                        <label for="">Correo</label>
                    </div>
                    <div class="c-p__lista-op">
                        <a href=" {{ route('eli_pro') }} "> <img src="img/eliminar.png" alt=""> </a>
                        <a> <img src="img/recargar.png" alt=""> </a>
                        <a href=" {{ route('ped') }} "> <img src="img/pedido.png" alt=""> </a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="fondo-proveedores"></div>
</main>

@endsection