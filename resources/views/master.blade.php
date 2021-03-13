<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #8 : Sistem Template Blade Laravel</title>
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.gstatic.com" />
<link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" media="print" onload="this.media='all'">
</head>
<body data-rsssl=1>

	<header>

		<h2>Blog MalasNgoding</h2>
		<nav>
			<a href="/blog">HOME</a>
			|
			<a href="/blog/tentang">TENTANG</a>
			|
			<a href="/blog/kontak">KONTAK</a>
		</nav>
	</header>
	<hr/>
	<br/>
	<br/>

	<!-- bagian judul halaman blog -->
	<h3> @yield('judul_halaman') </h3>


	<!-- bagian konten blog -->
	@yield('konten')


	<br/>
	<br/>
	<hr/>
	<footer>
		<p>© <a href="https://www.malasngoding.com">www.malasngoding.com</a>. 2018 - 2019</p>
	</footer>

</body>
</html>