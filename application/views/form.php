<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form action="<?=base_url();?>kablosuzkedi/kaydet" method="post">
		<input type="text" name="isim" placeholder="isim giriniz...">
		<input type="email" name="email" placeholder="email giriniz...">
		<select name="cinsiyet">
			<option value="bay">bay</option>
			<option value="bayan">bayan</option>
		</select>
		<button type="submit">Gönder</button>
	</form>
</body>
</html>