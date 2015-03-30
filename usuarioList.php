<!DOCTYPE html>
<html>
  <head>
    <?php require_once 'head.php';?>
  </head>
  <body>
    <?php require_once 'header.php'; ?>
    <div class="container">
      <h1>Lista de Usuarios</h1>
      <button class=" btn btn-success" name="btnNew" id="btnNew" title="Nuevo Usuario" onclick="window.location.href='usuarioAdd.php'">Nuevo Usuario</button>
    </div>
    <?php require_once 'footer.php'; ?>
  </body>
</html>
