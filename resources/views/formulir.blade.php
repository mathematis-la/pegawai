<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel</title>
</head>
<body>

	<form action="/formulir/proses" method="POST"> 
	@csrf
		<!-- <input type="hidden" name="_token" value=" echo csrf_token() ?>"> -->

		Nama
		<input type="text" name="nama"><br/>
		Alamat
		<input type="text" name="alamat"><br/>
		<input type="submit" name="Simpan"><br/>
	</form>


</body>
</html>