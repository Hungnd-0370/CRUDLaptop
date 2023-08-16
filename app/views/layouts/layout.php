<?php
    include_once __DIR_ROOT.'/helpers/session_helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		$this->render('components/header');
		$this->render($content, $subContent);
		$this->render('components/footer');
	?>
</body>
</html>