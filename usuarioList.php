<!DOCTYPE html>
<html>
  <head>
    <?php require_once 'head.php'; ?>
    <link href="Resources/Libs/bootstrap-table-master/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <?php require_once 'header.php'; ?>
    <div class="container">
      <div class="well bs-component">
        <h1>Lista de Usuarios</h1>
        <button class=" btn btn-success" name="btnNew" id="btnNew" 
                title="Nuevo Usuario" onclick="window.location.href = 'usuarioAdd.php'">Nuevo Usuario</button>
        <div class="table-responsive">
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th data-field="name">Name</th>
                <th data-field="stargazers_count">Stars</th>
                <th data-field="forks_count">Forks</th>
                <th data-field="description">Description</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
    <?php require_once 'footer.php'; ?>
    <script src="Resources/Libs/bootstrap-table-master/dist/bootstrap-table.min.js" type="text/javascript"></script>
    <script src="Resources/Libs/bootstrap-table-master/dist/locale/bootstrap-table-es-AR.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).on("ready", function () {
        var data = [
          {
            "name": "bootstrap-table",
            "stargazers_count": "526",
            "forks_count": "122",
            "description": "An extended Bootstrap table with radio, checkbox, sort, pagination, and other added features. (supports twitter bootstrap v2 and v3) "
          },
          {
            "name": "multiple-select",
            "stargazers_count": "288",
            "forks_count": "150",
            "description": "A jQuery plugin to select multiple elements with checkboxes :)"
          },
          {
            "name": "bootstrap-show-password",
            "stargazers_count": "32",
            "forks_count": "11",
            "description": "Show/hide password plugin for twitter bootstrap."
          },
          {
            "name": "blog",
            "stargazers_count": "13",
            "forks_count": "4",
            "description": "my blog"
          },
          {
            "name": "scutech-redmine",
            "stargazers_count": "6",
            "forks_count": "3",
            "description": "Redmine notification tools for chrome extension."
          }
        ];


        $('#table').bootstrapTable({
          data: data
        });
      });
    </script>
  </body>
</html>
