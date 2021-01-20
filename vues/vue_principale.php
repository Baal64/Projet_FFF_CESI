<!DOCTYPE html>
<html>
	<head>
		<title>Interface</title>
		<!-- Inclusion des css -->
		<link rel="stylesheet" type="text/css" href="./public/css/flex_css.css">
		<link rel="stylesheet" type="text/css" href="./public/css/interface.css">
		<link rel="stylesheet" type="text/css" href="./public/css/libs/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="./public/css/libs/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="./public/css/libs/jquery-ui.theme.min.css">
		<!-- Inclusion des js -->
		<script type="text/javascript" src="./public/js/libs/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./public/js/libs/jquery-ui.min.js"></script>
	</head>
	<body>
		<div id="wrapper" class="flex flex_col">
			<?php require_once('./vues/vue_header.php'); ?>
			<div id="content" class="flex flex_sa flex_aic">
				<?php
						require_once("./vues/$view.php");
				?>
			</div>
		</div>
	</body>
</html>