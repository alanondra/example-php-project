<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?= $title ?? 'Example Website'; ?></title>
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
		<link rel="manifest" href="/site.webmanifest" />
		<link rel="stylesheet" href="/assets/css/app.css" type="text/css" />
		<script defer src="/assets/js/app.js"></script>
	</head>
	<body>
		<header>
			<h1>Example Website</h1>
		</header>
		<main><?= $content; ?></main>
	</body>
</html>