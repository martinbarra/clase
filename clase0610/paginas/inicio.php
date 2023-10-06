<?php

include("conexion.php");
$consulta = "SELECT * FROM marcas";
$respuesta = mysqli_query($conexion, $consulta);

?>


    <div class="container p-5">
        <div class="row">
            <div class="col">
                <form action="marcas/guardar.php" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                        <input type="text" name="nombre" class="form-control" placeholder="Peugeot"  required>
                    </div>
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Origen</span>
                        <select class="form-select" name="origen" aria-label="Default select example">
                        <option selected>Listado</option>
                        <option value="japon">Japón</option>
                        <option value="china">China</option>
                        <option value="francia">Francia</option>
                    </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">logo</span>
                        <input type="text" name="logo" class="form-control" placeholder="../logo-Peugeot.jpg">
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>

            
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($respuesta)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["origen"] . "</td>";
                            echo "<td> <img src=". $row["logo"] ."></td>";
                            echo "<td> <a value='hola' href='marcas/eliminar.php?id_enviado=" . $row["id"] . "'><button class='btn btn-sm'>Eliminar</button></a>";
                            echo "<a value='hola' href='marcas/Editar.php?id_enviado=" . $row["id"] . "'><button class='btn btn-sm'>Editar</button></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

