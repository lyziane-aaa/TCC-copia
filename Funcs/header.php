<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("config.php");
include_once(SITE_ROOT . "/funcs/functions.php");
include_once(SITE_ROOT . "/funcs/conexao.php");



?>
<html lang="pt-br">

<head>
	<script type="text/javascript" src="/TCC/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap-->
	<link rel="stylesheet" href="/TCC/_css/bootstrap/css/bootstrap.css">
	<!-- <script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.bundle.js"></script> -->
	<script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/teste.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/listar.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/documentos.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">
	
<!-- Sweet alert -->  
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>


	<!-- scrips js-->
	<script src="/TCC/js/menu.js"></script>
	<script src="/TCC/js/modal.js"></script>

	<script src="/TCC/js/scripts.js"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>


	<link rel="stylesheet" type="text/css" href="/TCC/DataTables/datatables.css" />
	<script type="text/javascript" src="/TCC/DataTables/datatables.js"></script>
	<!-- FontAwesome-->
	<link href="/TCC/_css/fontawesome/css/all.css" rel="stylesheet">

	<link rel="shortcut icon" href="/TCC/imagens/favicon ver2.ico" />

	<!--Estilo-->
	<!-- ck editor-->
	<script src="/TCC/ckeditor/ckeditor/ckeditor.js" charset="utf-8"></script><!-- Arquivos para o editor de texto opensource CKEditor-->
	<script src="/TCC/ckeditor/ckfinder/ckfinder.js"></script>
	<script src="/TCC/ckeditor/js/javascript.js"></script>


	<!-- o name da página fica abaixo, depois é necessário fechar o head-->