<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<style>
    th{
        width: 8rem;
        text-align: left;
        border-bottom: 1px solid black;
    }
    td{
        width: 8rem;
    }
</style>

<h1>Ejemplo 6: Vista de coche</h1>
<table>
    <tr>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Propietario</th>
    </tr>

    <tr>
        <td><?php echo $row->marca ?></td>
        <td><?php echo $row->modelo ?></td>
        <td><?php echo $row->color ?></td>
        <td><?php echo $row->propietario ?></td>
    </tr>
</table>

</body>
</html>
