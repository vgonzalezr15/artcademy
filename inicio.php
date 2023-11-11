<?php include_once('./includes/head.php') ?>
<?php include_once("./includes/header.php"); ?>
<div class="contenedor-general">
    <div class="añadir-alumno">
        <h2>Añadir Usuario</h2>
        <form method="POST" action="añadir-alumno.php" id="formulario">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre Alumno">
            <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" placeholder="Fecha nacimiento">
            <input type="submit" value="Crear Alumno">
        </form>
    </div>

    <div>
        <?php include_once('./getAlumnos.php') ?>
    </div>
</div>

<?php include_once('./includes/footer.php') ?>