<!DOCTYPE html>
<html>
<head>
	<title>insert işlemi</title>
</head>
<body>
	<form action="<?php echo base_url("dbislem/insert") ?>" method="post">
		<input type="text" name="title" placeholder="lütfen isim giriniz"><br>
		<textarea name="detail" cols="30" rows="10"></textarea>
		<button type="submit">Kaydet</button>
	</form>
</body>
</html>