<!DOCTYPE html>
<html>
<head>
	<title>Liste</title>
</head>
<body>
	<table border="1">
		<thead>
			<th>Ad-Soyad</th>
			<th>Email Adresi</th>
		</thead>
		<tbody>
			<?php foreach ($personelListesi as $personel) {
				?>

				<tr>
					<td><?= $personel["isim"]; ?></td>
					<td><?= $personel["email"] ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</body>
</html>