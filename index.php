<!DOCTYPE html>
<html>
<head>
	<title>CarParkr - See live data</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	include('class_request.php');
	$request = new Request();

	// Get JSON data from Open Data Aarhus and decode it
	$data = json_decode(
      $request->getFile("http://www.odaa.dk/api/action/datastore_search?resource_id=2a82a145-0195-4081-a13c-b0e587e9b89c")
		);
	?>
<header>
	<img src="logo.png">
</header>
<main>
	<article class="card">
		<h2 class="title">Nørreport</h2>
		<div class="bar">
			<div class="indicator"></div>
		</div>
		<dl class="stats">
		    <dt>130</dt>
		    <dd>Occupied</dd>
	    </dl>
		<dl class="stats">
		    <dt>630</dt>
		    <dd>Capacity</dd>
	    </dl>
		<dl class="stats">
		    <dt>500</dt>
		    <dd>Free</dd>
	    </dl>
	</article>
	<article class="card">
		<h2 class="title">Nørreport</h2>
		<div class="bar">
			<div class="indicator low"></div>
		</div>
		<dl class="stats">
		    <dt>130</dt>
		    <dd>Occupied</dd>
	    </dl>
		<dl class="stats">
		    <dt>630</dt>
		    <dd>Capacity</dd>
	    </dl>
		<dl class="stats">
		    <dt>500</dt>
		    <dd>Free</dd>
	    </dl>
	</article>
	<article class="card">
		<h2 class="title">Nørreport</h2>
		<div class="bar">
			<div class="indicator med" style="width:87%"></div>
		</div>
		<dl class="stats">
		    <dt>130</dt>
		    <dd>Occupied</dd>
	    </dl>
		<dl class="stats">
		    <dt>630</dt>
		    <dd>Capacity</dd>
	    </dl>
		<dl class="stats">
		    <dt>500</dt>
		    <dd>Free</dd>
	    </dl>
	</article>

</main>
</html>
