<html>
 <head>
  <title>How to use Tabledit plugin with jQuery Datatable in PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h3 align="center">Testando Datatable de Edição em linha</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Bolsa cópia</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="tabela" class="table table-bordered table-striped">
       <thead>
        <tr>
        <th>Id:</th>
        <th>Nome:</th>
        <th>Matrícula</th>
        <th>Laudas:</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#tabela').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"../teste/fetch.php",
   type:"POST"
  }
 });

 $('#tabela').on('draw.dt', function(){
  $('#tabela').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'nome'], [2, 'matricula'], [3, 'laudas']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#tabela' + data.id).remove();
     $('#tabela').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>
