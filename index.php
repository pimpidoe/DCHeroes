<?php include 'include/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="DC Heroes">
	<meta name="author" content="Pim Merkx">
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>DC Heroes</title>
</head>
<body>

	<header id="header">
		<a href="index.php?teamId=1"><img id="header-logo" src="img/logo.jpg"></a>
		<img id="header-img" src="img/header.jpg" />
	</header>

	<div id="main-container">

		<div id="main-left">
			<?php include ('include/team.php') ?>
		</div>

		<div id="main-center">
			<?php include ('include/hero.php') ?>
		</div>

		<div id="main-right">
			<?php include ('include/hero-info.php') ?>
		</div>
	</div>
	<?php include ('include/footer.php') ?>
</body>
</html>
