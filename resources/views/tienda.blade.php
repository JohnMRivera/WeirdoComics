@extends('layouts.plantilla')

@section('titulo_documento', 'Tienda')

@section('contenido')

<main class="main-tienda">
    <form class="form-tienda" action="" method="post">
        @csrf
        <header class="header-tienda">
            <h1>Nuevo Articulo</h1>
        </header>
        <div class="datos-tienda__scroll">
            <div class="datos-tienda">
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNombreArticulo" type="text" value="{{ old('txtNombreArticulo') }}" placeholder="Nombre">
                        <label for="">Nombre</label>
                    </div>
                </div>
                @if($errors->first('txtNombreArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtNombreArticulo') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input-reg_pro">
                        {{-- <input type="text"> --}}
                        <select name="txtTipo" id="tipo">
                            <option value="" disabled selected="">Tipo</option>
                            <option value="todos">Todos</option>
                            <option value="comics">Comics</option>
                            <option value="articulos">Articulos</option>
                        </select>
                        <label for="tipo">Tipo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-comics">
            <button>
                ¡Agregar!
            </button>
        </div>
    </form>
    <div class="contenido-tienda__scroll">
        <div class="contenido-tienda">
            {{-- <div class="contenido-tienda__seccion"> --}}
                @for($i = 1; $i <= 7; $i++)
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/superman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                    @for($j = 1; $j <= 2; $j++)
                    <div class="c-t__seccion-carta">
                        <div class="c-t__seccion-carta__img">
                            <img src="img/cell.jpeg" alt="">
                        </div>
                        <div class="c-t__seccion-carta__contenido">
                            <div class="c-t__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-t__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="c-t__seccion-carta">
                        <div class="c-t__seccion-carta__img">
                            <img src="img/DocStrange.jpeg" alt="">
                        </div>
                        <div class="c-t__seccion-carta__contenido">
                            <div class="c-t__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-t__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endfor
            {{-- </div> --}}
        </div>
    </div>
  </main>



{{-- 
<div class="cont-tienda">
    <div class="icono">
        <a href="{{route('shCar')}}"><img class="img-tienda" src="/img/carrito-de-compras.png" alt=""></a>
    </div class="icono">
    <div class="row row-cols-1 row-cols-md-3 g-4 cont-cards">
        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/spiderman.jpg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #1 Amazing Fantasy</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt="Eliminar"></a>
                            <a href="" class=""><img src="/img/editar.png" alt="Editar"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/superman.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #116 Superman Infinitte Crisis</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/spiderman.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #20 The Amazing Spiderman</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/Avengers.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #5 The Avengers</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/Secret.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #20 Secret Avengers</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/x-men.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Comic #24 X-men</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/Pinocho.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Funco de Pinocho</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/DocStrange.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Funco de Doctor Strange</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" id="card-color">
                <img src="/img/cell.jpeg" class="card-img-top img-card" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Funco de Cell</h5>
                    <p class="card-text">Hay en existencia: <label for="">5</label> piezas </p>
                    <div class="tienda-selec">
                        <button type="button" class="btn btn-primary">Comprar</button>
                        <div class="iconos">
                            <a href="" class="icon-a"><img src="/img/basura.png" alt=""></a>
                            <a href="" class=""><img src="/img/editar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
</div> --}}

@stop