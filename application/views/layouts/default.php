<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/public/styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<?php echo $content;?>
	</form>
	<script type="text/javascript" src="/public/scripts/content.js"></script>
</body>
</html>