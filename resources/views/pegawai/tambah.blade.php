<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.gstatic.com" />
<link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" media="print" onload="this.media='all'">
</head>
<body data-rsssl=1>

	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Pegawai</h3>

	<a href="/pegawai"> Kembali</a>
	
	<br/>
	<br/>

	<form action="/pegawai/store" method="post">
		{{ csrf_field() }}
		ID <input type="text" name="id" required="required" /> <br/>
		Nama <input type="text" name="nama" required="required" /> <br/>
		Keterangan <input type="text" name="keterangan" required="required" /> <br/>
		<input type="submit" name="simpan" value="Simpan Data">
