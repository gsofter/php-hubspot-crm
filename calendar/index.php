<?php
require_once __DIR__ . '/../api.php';

$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$start_date = time() * 1000;
$end_date = strtotime("+2 day") * 1000;
$response = CalendarAPI::GetCalendarEvents($testhapikey, $start_date, $end_date);
$events = json_decode($response['response'], true);
?>

<?php require_once __DIR__ . '/../header.php'; ?>
	<div class="jumbotron text-center">
		<h1> CALENDAR API TEST </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="container">
				<table class="table table-striped">
					<thead>
						<th> NO </th>
						<th> DATE </th>
						<th> TYPE </th>
						<th> NAME </th>
						<th> DESCRIPTION </th>
					</thead>
					<tbody>
					<?php
					foreach ($events as $eId => $event) { 
						$eDate = date('Y-m-d H:I:S', substr($event['eventDate'], 0, 10)); ?>
						<tr>
							<td> <?php echo $eId+1; ?> </td>
							<td> <?php echo $eDate; ?> </td>
							<td> <?php echo $event['eventType']; ?> </td>
							<td> <?php echo $event['name']; ?> </td>
							<td> <?php echo $event['description']; ?> </td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="container">
				<h3 class="text-center"> And Event to Calendar </h3>
				<form method="post" action="createevent.php"> 
					<div class="form-group">
						<label for="event-name"> Event Name </label>
						<input class="form-control" name="event_name" id="event-name">
					</div>
					<div class="form-group">
						<label for="event-description"> Event Description </label>
						<input class="form-control" name="event_description" id="event-description">
					</div>
					<div class="form-control"> 
						<input type="submit" name="submit">
					</div>
				</form>
			</div> 
		</div>
		<hr/>
		<div class="row"> 
		</div>
	</div>
<?php require_once __DIR__ . '/../footer.php'; ?>