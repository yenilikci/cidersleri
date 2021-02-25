<!DOCTYPE html>
<html>
<head>
	<title>Database İşlemleri</title>
</head>
<body>
	<h3>test</h3>
	<ul>
		<?php
		foreach ($rows as $row ) {
			?>
			
			<li><?=$row->title?> ~ <?=$row->detail?></li>
		
			<?php
		}
		?>
	</ul>
</body>
</html>