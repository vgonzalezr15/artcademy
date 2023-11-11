<?php include_once('./includes/head.php') ?>
<div class="login-form">
    <h2>Artcademy (Inicio Sesión)</h2>
    <form action="login-user.php" method="POST" id="formulario">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre Usuario">
        <input type="password" name="pass" id="pass" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesión">
        <a href="./register.php">Crear nuevo usuario</a>
    </form>
</div>
<?php include_once('./includes/footer.php') ?>