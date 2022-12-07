<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('estilos/estilos.css')}}" type="text/css">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h5 class=" font-weight-bold">Reporte de ventas</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th class="tabla">#</th>
                    <th class="tabla">Nombre de Usuario</th>
                    <th class="tabla">Canitdad</th>
                    <th class="tabla">Fecha</th>
                    <th class="tabla">Total</th>

                </tr>
            </thead>
            <tbody>
            @foreach ( $datos as $consulta )
                <tr>
                    <td>{{ $consulta->id_venta }}</td>
                    <td>{{ $consulta->nombre_usuario }}</td>
                    <td>{{ $consulta->nombre_cantidad }}</td>
                    <td>{{ $consulta->fecha }}</td>
                    <td><strong>{{ $consulta->Total }}</strong></td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
