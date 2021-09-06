<?php

include('libs/phpqrcode/qrlib.php');

function getUsernameFromEmail($email)
{
	$find = '@';
	$pos = strpos($email, $find);
	$username = substr($email, 0, $pos);
	return $username;
}

if (isset($_POST['submit'])) {
	$tempDir = 'temp/';
	$filename = rand(1, 9999999999);
	$web =  $_POST['web'];
	$codeContents = $web;

	QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Quick Response (QR) Code Generator | Graphicsocean</title>
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
</head>

<body>

	<div class="container  px-4">
		<div class="row">
			<div class="col-md-12">
				<h3><strong>Quick Response (QR) Code Generator by Graphicsocean</strong></h3>
				<div class="input-field">
					<h3>Please Fill-out All Fields</h3>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<div class="form-group">
							<label>Value</label>
							<input type="text" class="form-control" name="web" style="width:20em;" placeholder="Enter value" value="<?php echo @$web; ?>" required />
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
						</div>
					</form>
				</div>
			</div>
			<?php
			if (!isset($filename)) {
				$filename = "aziz";
			}
			?>
			<div class="col-md-12">
				<div class="qr-field">
					<h2 style="text-align:center">QR Code Result: </h2>
					<center>
						<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/' . @$filename . '.png" style="width:200px; height:200px;"><br>'; ?>
						</div>
						<a class="btn btn-default submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</body>

</html>