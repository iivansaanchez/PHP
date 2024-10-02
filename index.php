<?php
#Con esta funcion creamos la conexion a la BBDD mysql

function connection(){

    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "Northwind";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;
}

#Almacenamos en una variable la conexion
$con = connection();

#En una variable almacenamos la query que queremos hacer a la BBDD externa
$sql = "SELECT * FROM Products";

#mysqli_query devuelve un objeto iterador que es almacenado en $query
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mostrar datos de BBDD </title>
</head>
<body>
    <div class="container mt-5" align="center">
    <h2 class="mb-4">Product Table</h2>
    <table class="table table-dark table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td> <?= $row["ProductID"] ?> </td>
                    <td> <?= $row["ProductName"] ?> </td>
                    <td> <?= $row["UnitsInStock"] ?> </td>
                </tr>
                <?php endwhile; ?>  
            </tbody>
        </table>
    </div>
</body>
</html>