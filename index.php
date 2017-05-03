<!DOCTYPE html>
<html>
<head>
	<title>CarParkr - See live data</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<img src="logo.png">
</header>
<main>
	<?php
	//Include php files
	include('class_request.php');
	include('garageNames.php');

	//Output garage names
	//var_dump($garageNames);

	// Make a new Request
	$request = new Request();

	// Get JSON data from Open Data Aarhus and decode it
	$data = json_decode(
      $request->getFile("http://www.odaa.dk/api/action/datastore_search?resource_id=2a82a145-0195-4081-a13c-b0e587e9b89c")
		);

	// Create new array to store the combined data
	$dataList = array();

	// Loop through all of the result records from the live data
	foreach ($data->result->records as $record) {
		// Find the correct garage name for each record
		foreach ($garageNames as $garage) {
				 $garageName = $garage["garageName"];
				 $garageCode = $garage["garageCode"];

				 $recordCode = $record->garageCode;

				 // If there is a match, then the correct name is known
		 		if($garageCode === $recordCode) {
					$date = date_create($record->date);
					$timestamp = date_format($date,"Y-m-d H:i:s");
					$record->date = $timestamp;

		 			$dataList[] = array(
		 				"name" => $garageName,
		 				"data" => $record,
		 			);
		 		}
		}
	};
	// Loop  through $dataList and populate the <article> structure for each card
	foreach ($dataList as $record) {
	?>
	
	<article class="card">
		<h2 class="title"><?php echo $record["name"];?></h2>
		<div class="bar">
			<div class="indicator"></div>
		</div>
		<dl class="stats">
		    <dt><?php echo $record["data"]->vehicleCount;?></dt>
		    <dd>Occupied</dd>
	    </dl>
		<dl class="stats">
		    <dt><?php echo $record["data"]->totalSpaces;?></dt>
		    <dd>Capacity</dd>
	    </dl>
		<dl class="stats">
		    <dt>500</dt>
		    <dd>Free</dd>
	   </dl>
	</article>

	<?php
	}
	?>

</main>
</html>
