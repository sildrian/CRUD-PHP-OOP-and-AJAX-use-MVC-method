
<!DOCTYPE html>
<html>
	<head>
		<title>Contoh CRUD dengan AJAX</title>
		<link rel="stylesheet" type="text/css" href="<?= BASE_PATH ?>/public/bootstrap/css//bV4/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= BASE_PATH ?>/public/dataTables/css/bst4/dataTables.bootstrap4.min.css">
		
		<script type="text/javascript" src="<?= BASE_PATH ?>/public/jquery/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php 
				use library\View;

				$view = new View($viewName);
				$view->bind('data', $data);
				$view->render();
			?>
		</div>

		<script type="text/javascript" src="<?= BASE_PATH ?>/public/bootstrap/js/bV4/tether.min.js"></script>
		<script type="text/javascript" src="<?= BASE_PATH ?>/public/bootstrap/js/bV4/bootstrap.min.js"></script>

		<script type="text/javascript" src="<?= BASE_PATH ?>/public/dataTables/js/bst4/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?= BASE_PATH ?>/public/dataTables/js//bst4/dataTables.bootstrap4.min.js"></script>
		
	</body>
</html>