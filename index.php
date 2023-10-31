<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Trabajo Practico Clase N°24</title>
</head>
<body>

    <!---------------->
    <!-- ENCABEZADO -->
    <!---------------->
    <div id="encabezado-div">
        <button id="btn-menu-encabezado">
           Menu
        </button>
        <button id="btn-addproducto-encabezado">
            Agregar un nuevo producto
        </button>
        <button id="btn-edtproducto-encabezado">
            Editar un producto
        </button>
        <button id="btn-dltproducto-encabezado">
            Eliminar un producto
        </button>
    </div>
    <?php

        include 'abm.php';
        include 'productos.php';

        $conexion = new BaseDeDatos('localhost', 'root','datos_productos', '');
        $abm = new ABM($conexion);


        if (isset($_POST["Guardar"])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
                
            $producto = new Producto($id=null,$nombre, $precio, $cantidad);
            $abm->agregar($producto);

        }elseif(isset($_POST["Editar"])){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $id = $_POST['id'];

            $producto = new Producto($id, $nombre, $precio, $cantidad);
            echo('<script>consele.log($producto->getNombre)</script>');
            $abm->editar($producto);

        }elseif(isset($_POST["Eliminar"])){
            $id = $_POST['id'];

            $producto = new Producto($id, $nombre=null, $precio=null, $cantidad=null);
            $abm->eliminar($producto);

        }
            

    ?>

    <!---------------------------------------------->    
    <!-- IMPRECION DE LA BASE DE DATOS EN PANTALL -->
    <!---------------------------------------------->
    <div id="tabla-contenedor">
        <?php $productos_db = $abm->listar(); ?>

        <table id="tabla-db">
                <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>
                <?php foreach ($productos_db as $producto) : ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>         
    
    <div id="forms">
        <form action="index.php" method="post" id="add-producto-form">
            <label for="producto-nombre">Nombre: </label>
            <input type="text" name="nombre" id="producto-nombre">
            <label for="producto-precio">Precio: </label>
            <input type="text" name="precio" id="producto-precio">
            <label for="producto-cantidad">Cantidad: </label>
            <input type="text" name="cantidad" id="producto-cantidad">
            <input type="submit" value="Agregar Producto" name="Guardar">

        </form>
        <form action="index.php" method="post" id="edt-producto-form">
            <label for="producto-nombre-e">Nombre: </label>
            <input type="text" name="nombre" id="producto-nombre-e">
            <label for="producto-precio-e">Precio: </label>
            <input type="text" name="precio" id="producto-precio-e">
            <label for="producto-cantidad-e">Cantidad: </label>
            <input type="text" name="cantidad" id="producto-cantidad-e">
            <label for="producto-id-e">Id: </label>
            <input type="text" name="id" id="producto-id-e">
            <input type="submit" value="Editar Producto" name="Editar">
            
        </form>
        <form action="index.php" method="post" id="dlt-producto-form">
            <label for="producto-id-d">Id: </label>
            <input type="text" name="id" id="producto-id-d">
            <input type="submit" value="Eliminar Producto" name="Eliminar">
            
        </form>

    </div>
    <!---------------------------------------->
    <!-- IMPORTACION DEL CODIGO JAVA SCRIPT -->
    <!---------------------------------------->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="javascript/main.js"></script>
</body>
</html>
