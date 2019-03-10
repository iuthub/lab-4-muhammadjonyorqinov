<?php 
	error_reporting(0);


	$dir = 'songs/';
	$file = scandir($dir);
	$isGet = $_SERVER["REQUEST_METHOD"]=="GET";
	$txt = $_GET["playlist"];
	

 //   echo "<pre>";
	// print_r($file);
	// echo "<pre/>";
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">

			<ul id="musiclist">
				

				<?php if(is_null($txt)){  
					foreach ($file as $music ) {
					list($name,$type) = explode(".", $music);
					if ($type == "mp3") { ?>
					<li class="mp3item">
					<a href="songs/<?= $music ?>" download ><?=  $music ?> </a>
				</li>	
					<?php } 	
					}
	 			?>
	 			<?php  foreach ($file as $music ) {
					list($name,$type) = explode(".", $music);
					if ($type == "txt") { ?>
					<li class="playlistitem">
					<a href="?playlist=<?= $music ?>" > <?=  $music ?></a>
				</li>

					<?php } 	
					}
				}else{ 
					$lines = file("songs/".$txt);
					foreach ($lines as $line) {
					?>
					<li class="mp3item">
					<a href="songs/<?= $line ?>" download ><?=  $line ?></a>
				</li>
				<?php }
				}
	 			?>
				


				
			</ul>
			
		</div>
	</body>
</html>
