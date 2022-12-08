<!doctype html>
<html lang="en">

<head>
    <title>Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('estilos/estilos.css')}}" type="text/css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="ticket" style="text-align: center">
            <h1>Ticket de venta</h1>
            <input type="hidden" name="i" value="{{$i=0}}">
            <input type="hidden" name="i" value="{{$j=0}}">
            @foreach ($datos as $consultaG)
                @if ($i < 1)
                    <p>Fecha de compra: {{$consultaG->created_at}}</p>
                @endif
                @if (count($comicN) > $i && $consultaG->tipo == "comics")
                    <p> Producto:
                        {{$comicN[$i]}} x{{$consultaG->cantidad}} ${{$comicPrecio[$i]}}</p>
                    <input type="hidden" name="i" value="{{$i++}}">
                @endif
                @if (count($articuloN) > $j && $consultaG->tipo == "articulos")
                    <p>Producto: {{$articuloN[$j]}} {{$consultaG->cantidad}} ${{$articuloPrecio[$j]}}</p>
                    <input type="hidden" name="i" value="{{$j++}}">
                @endif
            @endforeach

            <p>Vendedor: {{$nombre}}</p>
            <h2>Total: {{$total}}</h2>
    </div>
</body>

</html>