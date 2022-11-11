@extends('layouts.plantilla')

@section('titulo_documento', 'Tienda')

@section('diseño')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos-b.css">
@endsection

@section('contenido')

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
</div>

@stop
