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
          <table id="table-javascript"></table>
        </div>

      </div>
    </div>
    <?php require_once 'footer.php'; ?>
    <script src="Resources/Libs/bootstrap-table-master/dist/bootstrap-table.min.js" type="text/javascript"></script>
    <script src="Resources/Libs/bootstrap-table-master/dist/locale/bootstrap-table-es-AR.min.js" type="text/javascript"></script>
    <script type="text/javascript">
                  $(function () {


                    $('#table-javascript').bootstrapTable({
                      method: 'post',
                      url: 'Controller/usuarioListController.php',
                      cache: false,
                      height: 400,
                      striped: true,
                      pagination: true,
                      pageSize: 50,
                      pageList: [5, 10, 15, 20, 25],
                      search: true,
                      showColumns: false,
                      showRefresh: false,
                      minimumCountColumns: 2,
                      clickToSelect: true,
                      columns: [{
                          field: 'nro',
                          title: 'N°',
                          align: 'right',
                          valign: 'middle',
                          sortable: true
                        }, {
                          field: 'rut',
                          title: 'Rut',
                          align: 'left',
                          valign: 'middle',
                          sortable: true
                        }, {
                          field: 'nombre',
                          title: 'Nombre',
                          align: 'left',
                          valign: 'middle',
                          sortable: true
                        }, {
                          field: 'email',
                          title: 'Email',
                          align: 'left',
                          valign: 'top',
                          sortable: true
                        }, {
                          field: 'celular',
                          title: 'Celular',
                          align: 'right',
                          valign: 'middle',
                          sortable: true
                        },{
                          field:'telefono',
                          title:'Teléfono',
                          align:'right',
                          valign:'middle',
                          sortable:true
                        },{
                          field:'direccion',
                          title:'Dirección',
                          align:'left',
                          valign:'middle',
                          sortable:true
                        },{
                          field:'nombre_usuario',
                          title:'Nombre Usuario',
                          align:'left',
                          valign:'middle',
                          sortable:true
                        }
                      ]
                    });
                  });
    </script>
  </body>
</html>
