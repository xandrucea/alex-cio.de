<?php
require __DIR__ . "/vendor/autoload.php";
ini_set("display_errors", "on");

$content = new Xandrucea\ItemListDisplay([
    "contentDirectory" => "content/",
    "templateDirectory" => "templates/",
    "itemKey" => "entry",
    "sortOrder" => "descending",
]);

$content->configureRouter([
    "list" => "item.html",
    "display" => "display.html",
    "error" => "error-page.html",
]);
?>

<!DOCTYPE HTML>
<!--
	Strata by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?= include "lib/google-api.php" ?>
		<?= include "lib/facebook-pixel.php" ?>

		<title>Alex Cio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body class="is-preload">

	<?php
 include "assets/partials/header.php";
 $content->render();
 include "assets/partials/footer.php";
 ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>