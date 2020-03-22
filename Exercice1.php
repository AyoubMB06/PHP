<!DOCTYPE html>
<html>
<head>
	<title>Exercice1</title>
</head>
<body>

	<table border="1" width="100%" align="center">
	<h1 align="center">Délice de Fruits & Légumes</h1>
	<?php 
		$tabPics=array("1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg"); 
		shuffle($tabPics);
		for($i=0;$i<3;$i++) { ?>
			
			 	<td align="center">
					<img src=" <?php echo ($tabPics[$i]); ?> "height="352" width="400">
				</td>

		<?php } ?>
	</table>


</body>
</html>
