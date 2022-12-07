@extends('layouts.plantilla')

@section('titulo_documento', 'Carrito')

@section('diseño')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/estilos/estilos-b.css">
@endsection

@section('contenido')

@if(session()->has('vendido'))

    <script>
        Swal.fire(
            'Vendido!',
            'Articulos vendidos exitosamente!',
            'success'
        )
    </script>

@elseif(session()->has('sin_vender'))

    <script>
        Swal.fire(
            'Si articulos',
            'No hay nada para vender en el carrito!',
            'error'
        )
    </script>

@endif

<div class="cont-carrito">
    <form class="form-carrito" action="{{ route('carrito.create', $id_usuario) }}" method="post">
        @csrf
        <h1 class="h1"><strong>Carrito de ventas</strong></h1>
        <div class="cont-info">
            <label for="exampleDataList" class="form-label">Busca el id del articulo</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
            <option value="Comic #1 Amazing Fantasy">
            <option value="Comic #116 Superman Infinitte Crisis">
            <option value="Comic #20 The Amazing Spiderman">
            <option value="Comic #5 The Avengers">
            <option value="Comic #20 Secret Avengers">
            </datalist>
        </div>
        <div class="rectangulo">
            <table class="carrito-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id Articulo</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>1</td>
                        <td>{{ $consulta->id_articulo }}</td>
                        <td>{{ $consulta->tipo }}</td>
                        <td>{{ $consulta->cantidad }}</td>
                        <td>{{ $consulta->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="cont-labels">
            <div>
                <label for="">Total: </label>
                <label for="">$0</label>
            </div>
            <div>
                <button type="submit" class="btn btn-success btn-carrito">Comprar</button>
            </div>
        </div>
    </form>
</div>

@stop
