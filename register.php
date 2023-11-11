<?php include_once('./includes/head.php') ?>
<div class="login-form">
    <h2>Artcademy (Registro)</h2>
    <form action="register-user.php" method="POST" id="formulario">
        <input type="text" name="nombre" id="nombre" placeholder="Crear Usuario">
        <input type="password" name="pass" id="pass" placeholder="Crear Contraseña">
        <input type="submit" value="Crear Usuario">
        <a href="./index.php">Ya tengo cuenta</a>
    </form>
</div>
<?php include_once('./includes/footer.php') ?>