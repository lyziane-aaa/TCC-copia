<?php include_once("funcs/header.php"); ?>

</head>
<body class = "bg-primary">
<?php include_once("funcs/menu.php"); ?>

    <div class = "bg-dark">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal hidden fade in" style = "display:none !important;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







        <button type="button" data-target="#visulUsuarioModal" class="btn btn-primary" data-toggle="modal" id="1">
Visualizar
</button>
a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>
    <div id="visulUsuarioModal"  tabindex="-1" class="modal hidden fade in" style = "display:none !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <!-- <div  class="modal fade"  > -->
  <div class="modal-dialog" style = "">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="visulUsuarioModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span id="visul_usuario"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onClick="window.location.reload(); modal.hide();" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-info">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
    <script>
    $(document).ready(function() {
      $(document).on('click', '.view_data', function() {
        var id_achados = $(this).attr("id");
        // alert(id_achados);
        //Verificar se há valor na variável "id_achados".
        if (id_achados !== '') {
          var dados = {
            id_achados: id_achados
          };
          $.post('achados/visu_achados.php', dados, function(retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_usuario").html(retorna);
            $('#visulUsuarioModal').modal('show');
          });
        }
      });
    });
  </script>

</div>
</body>
</html>