<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Sistema Carga Académica</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap theme -->
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<!-- Estilo Personalizado -->
		<link href="css/estilo.css" rel="stylesheet">
		<!-- Jquery UI -->
		<link rel="stylesheet" href="css/jquery-ui-1.10.4.css">
	</head>

	<body data-ng-app="carga">

	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" data-ng-controller="navegacion">
		<div class="container">
			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img alt="Brand" src="img/iutag.png" height="183" width="210" style="
    width: 10%; height: auto;
"> SADCA Iutag
				</a>
			</div>
			<div class="pull-right usuario" data-ng-if="usuario.accedio">
				<span>{{usuario.info.nombre}} {{usuario.info.apellido}}</span>
				<span class="glyphicon glyphicon-log-out clickable" title="Cerrar Sesion" data-ng-click="logout()"></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li data-ng-class="{active:actual==link}" data-ng-repeat="link in links" data-ng-click="ubicacion(link)"><a href="#{{link.href}}">{{link.name}}</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Contenedor Principal -->

	<main class="container theme-showcase" data-ng-view>

	</main>
	<script src="js/jquery-1.11.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).on("blur", "input", function () {
			$(this).val($(this).val().toUpperCase());
		});
	</script>
	<script src="js/libreries/jquery-ui.min.js"></script>
	<script src="js/libreries/angular.min.js"></script>
	<script src="js/libreries/angular-router.js"></script>

	<script src="js/app.js"></script>
	<script src="js/routing.js"></script>


	<?php 

	$folders=array("service","directive","filter","controller","animation");

	foreach ($folders as $folder) {
	foreach (glob("js/$folder/*.js") as $file) {?>
		<script src="<?php echo $file; ?>"></script>
	<?php } } ?>

  </body>
</html>
