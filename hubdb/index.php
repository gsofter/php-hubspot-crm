<?php
require_once __DIR__ . '/../api.php';

$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$response = HubDBAPI::GetAllTables($testhapikey);
$responseData = json_decode($response['response'], true);
$tables = $responseData['objects'];

$hubid = '6986385';
$response = HubDBAPI::GetTableRows($hubid, 2038922);
$rowData = json_decode($response['response'], true);
$rows = $rowData['objects'];

echo json_encode($rows);
?>
<!DOCTYPE html>
<html>
<head>
	<title> PHP HUBSPOT CRM | HUBDB API TEST </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/fontawesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center">
		<h1> HUBDB API TEST</h1>
	</div>
	<div class="container">
		<div class="row"> 
			<div class="container"> 
				<h3 class="text-center"> Tables</h3>
				<table class="table table-striped">
					<thead> 
						<th> Id </th>
						<th> Name </th>
						<th> Status </th>
						<th> Rows </th>
					</thead>
					<tbody>
					<?php foreach ($tables as $no => $table) { ?>
						<tr> 
							<td> <?php echo $table['id']; ?> </td> 
							<td> <?php echo $table['name']; ?> </td> 
							<td> <?php if($table['publishedAt'] == 0) echo "Draft"; else echo "published"; ?> </td> 
							<td> <?php echo $table['rowCount']; ?> </td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr/>
		<div class="row"> 
			<div class="container"> 
				<h3 class="text-center"> Pledge</h3>
				<table class="table table-striped">
					<thead>
						<th> ID </th>
						<th> Pledge Name </th>
						<th> Pledge Amount </th>
						<th> Pledge Update </th>
					</thead>
					<tbody>
					<?php foreach ($rows as $no => $row) { ?>
						<tr> 
							<td> <?php echo $row['id']; ?> </td> 
							<?php foreach ($row['values'] as $id => $cell) { ?>
								<td> <?php echo $cell; ?> </td>
							<?php } ?>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr/>
		<div class="row"> 
			<div class="container"> 
				<form method="post" action="addrow.php"> 
					<div class="form-group">
						<label for="pledge-name"> Pledge Name</label>
						<input class="form-control" name="pledge_name" id="pledge-name">
					</div>
					<div class="form-group">
						<label for="pledge-amount"> Pledge Amount</label>
						<input class="form-control" name="pledge_amount" id="pledge-name" type="number">
					</div>
					<div class="form-control"> 
						<input type="submit" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>