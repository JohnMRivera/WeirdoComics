<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/estilos/estilos.css">

    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <h1 style="text-align: center">Reporte de ventas</h1>
        </header>
        <section>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>Id Venta</th>
                        <th>Id Empleado</th>
                        <th>Nombre Empleado</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ventas as $venta)
                    <tr style="text-align: center">
                        <td>{{ $venta->id_venta }}</td>
                        <td>{{ $venta->id_usuario }}</td>
                        <td>{{ $venta->nombre_usuario }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>