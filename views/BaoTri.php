<?php
    function minify_output($buffer) {
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );

        if (preg_match("/\<html/i", $buffer) == 1 && preg_match("/\<\/html\>/i", $buffer) == 1) {
            $buffer = preg_replace($search, $replace, $buffer);
        }

        return $buffer;
    }
?>

<?php require_once "./libs/config_link.php"; ob_start('minify_output'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bảo Trì</title>
	<base href="<?php echo $config_Home; ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./public/css/all.min.css">
	<link rel="shortcut icon" href="./public/icons/logo.ico" type="image/icon">
	<script src="./public/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<h1 class="text-center shadow">HỆ THỐNG ĐANG BẢO TRÌ</h1>
		<img class="mb-3" src="./public/images/error_1.png" style="width: 100%;">
	</div>

	<script src="./public/js/popper.min.js"></script>
	<script src="./public/js/bootstrap.min.js"></script>
	<script src="./public/js/main.js"></script>
</body>
</html>