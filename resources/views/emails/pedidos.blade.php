<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <h1>Información de pedido</h1>
        </header>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id_Proveedor</th>
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $id_proveedor }}</td>
                        <td>{{ $consulta->nombre }}</td>
                        <td>{{ $consulta->cantidad }}</td>
                        <td>{{ $consulta->precio }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>