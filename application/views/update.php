<!DOCTYPE html>
<html>
<head>
	<title>update işlemi</title>
</head>
<body>
	<form action="<?php echo base_url("dbislem/update") ?>" method="post">
		<label>Kayıt Numarası</label>
		<select name="id">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select><br>
		<input type="text" name="title" placeholder="lütfen isim giriniz"><br>
		<textarea name="detail" cols="30" rows="10"></textarea>
		<button type="submit">Kaydet</button>
	</form>
</body>
</html>