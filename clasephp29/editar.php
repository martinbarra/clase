<?php

include("conexion.php");
$id_recibido=$_GET["id_enviado"];
$consulta = "SELECT * FROM marcas WHERE id=".$id_recibido."";
$respuesta = mysqli_query($conexion, $consulta);

while($row= mysqli_fetch_assoc($respuesta)){
    $nombre = $row;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejerciciosphp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 p-5">

                <div class="mb-3">
                    <form action="guardar.php" method="POST">

                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1">
                        <label for="exampleFormControlInput1" class="form-label">Origen</label>
                        <select class="form-select" name="origen" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">japon</option>
                            <option value="2">francia</option>
                            <option value="3">china</option>
                        </select>

                        <label for="exampleFormControlInput1" class="form-label">Logo</label>
                        <input type="text" class="form-control " name="logo" id="exampleFormControlInput1">
                        <input class="btn btn-danger float-end " type="submit">
                    </form>
                </div>


            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 p-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php


                        while ($row = mysqli_fetch_assoc($respuesta)) {
                            echo "<tr>";
                            echo "<td> " . $row["id"] . "</td>";
                            echo "<td> " . $row["nombre"] . "</td>";

                            echo "<td> " . $row["origen"] . "</td>";

                            echo "<td> " . $row["logo"] . "</td>";
                            echo "<td>";
                            echo "<a href='eliminar.php?id_enviado=" . $row["id"] . "'>";
                            echo "<button class='btn btn-sm btn-danger m-1'>eliminar</button>";
                            echo "</a>";
                            echo "<a href='editar.php?id_enviado=" . $row["id"] . "'>";
                            echo "<button class='btn btn-sm btn-danger'>editar</button>";
                            echo "</a>";
                            echo "</td>";
                        }
                        ?>



                    </tbody>
                </table>

            </div>


        </div>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>