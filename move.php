<!DOCTYPE html>
<html>
<head>
	<title>Download file from url and save it to server</title>
	<style type="text/css">
		.container{
			width: 600px;
			margin: 0 auto;
		}
		input[type="text"]{
			padding: 5px 10px;
			width: 100%;
		}

		input[type="submit"]{
			display: block;
			background: #fff;
			border: 2px solid #000;
			padding: 10px 20px;
			margin: 0 auto;
		}
		input[type="submit"]:hover{
			cursor: pointer;
			background: #ccc;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Download file from url and save it to server</h1>
		<p>by: Ahmad Hajar</p>
		<form action="" method="post">
			<p><input type="text" name="target_url" placeholder="target url"></p>
			<p><input type="text" name="filename" placeholder="filename"></p>
			<p><input type="submit" name="submit" value="Download"></p>
		</form>
		<br />
		<br />
		<?php

		if(isset($_POST['submit'])){
			if(!isset($_POST['target_url'], $_POST['filename']) || empty($_POST['target_url']) || empty($_POST['filename'])){
				echo 'target_url and filename is required';
			}else{
				ob_start();

				$file = fopen ($_POST['target_url'], 'rb');
				if ($file) {
					echo 'Start reading ' . $_POST['target_url'] . '<br /><br />';
					ob_flush();
					
					$dir = dirname($_POST['filename']);
					if(!is_dir($dir)){
						mkdir($dir, 0755, true);
					}
					$newFile = fopen ($_POST['filename'], 'wb');
					
					if ($newFile) {
						echo 'Start writing <strong>' . $_POST['filename'] . '</strong><br /><br />';
						ob_flush();
						
					    while(!feof($file)) {
					        fwrite($newFile, fread($file, 1024 * 8), 1024 * 8);
					    }

					    echo 'Closing the new file <br /><br />';
						ob_flush();
						
						fclose($newFile);
					}else{
						echo 'Can not open <strong>' . $_POST['filename'] . '</strong> <br /><br />';
						ob_flush();
					}

					echo 'Closing the source file <br /><br />';
					ob_flush();
					
					fclose($file);
				}else{
					echo 'Can not open <strong>' . $_POST['target_url'] . '</strong> <br /><br />';
					ob_flush();
				}

				echo 'Done';
				ob_end_flush();
			}
		}

		?>
	</div>
</body>
</html>