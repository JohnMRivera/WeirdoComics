@extends('layouts.plantilla')

@section('diseño')
<link rel="stylesheet" href="estilos/estilos.css">
@endsection

@section('contenido')

@if(session()->has('agregar_articulo'))

    <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Se ha agregado el articulo',
          showConfirmButton: false,
          timer: 1500
        })
    </script>

@elseif(session()->has('eliminar_articulo'))

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
              'El articulo ha sido eliminado.',
              'success'
            )
          }
        })
    </script>

@elseif(session()->has('generar_pedido'))

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Estas seguro?',
        //   text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Generar Pedido!',
          cancelButtonText: 'No, cancelar!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'Generado!',
              'Tu pedido ha sido genrado.',
              'success'
            )
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'El pedido ha sido cancelado :)',
              'error'
            )
          }
        })
    </script>

@endif

    <main class="main-pedidos">
        <div class="form-pedidos">
            <form action="{{ route('agr_art_ped') }}" method="post">
                @csrf
                <header class="header-pedidos">
                    <div class="header-pedidos__titulo">
                        <h1>Ingresar Articulos</h1>
                    </div>
                    <div class="header-pedidos__buscador">
                        <input name="txtArticulo" type="text" placeholder="Ingrese_nombre">
                    </div>
                    @if($errors->first('txtArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtArticulo') }} </p>
                    </div>
                    @endif
                    <div class="header-pedidos__btn">
                        <input type="submit" value="Agregar">
                    </div>
                </header>
            </form>
            <form class="contenido-pedidos" action=" {{ route('gen_ped') }} " method="post">
                @csrf
                <header class="contenido-pedidos__header">
                    <div class="c-p__header-foto">
                        <img src="img/siu.png" alt="">
                    </div>
                    <div class="c-p__header-datos">
                        <label for="">Vendedor El Bicho</label>
                        <label for="">Fecha</label>
                        <label for="">ID_venta</label>
                    </div>
                </header>
                <div class="c-p__articulos-header">
                    <div>
                        <label for="">Nombre Comic</label>
                    </div>
                    <div>
                        <label for="">Cantidad</label>
                    </div>
                    <div>
                        <label for="">Precio</label>    
                    </div>
                </div>
                    <div class="contenido-pedidos__scroll">
                        @for($i = 1; $i <= 12; $i++)
                        <div class="contenido-pedidos__articulos">
                            <div class="c-p__articulos-datos">
                                <div>
                                    <label for="">Nombre_comic</label>
                                </div>
                                <div>
                                    <label for="">5</label>
                                </div>
                                <div>
                                    <label for="">$400</label>
                                </div>
                                <div>
                                    <a href=" {{ route('eli_art') }} "> <img src="img/eliminar.png" alt=""> </a>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                
                <footer class="contenido-pedidos__footer">
                    <div class="c-p__footer-total">
                        <label for="">Total:</label>
                        <label for="">$6000</label>
                    </div>
                    <div class="c-p__footer-generar">
                            <button> <a>Generar Pedido</a> </button>
                    </div>
                </footer>
            </form>
        </div>
        <div class="fondo-pedidos"></div>
    </main>
@endsection