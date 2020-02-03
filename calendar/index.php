<?php require_once __DIR__ . '/../header.php'; ?>
<div class="jumbotron text-center">
	<h1> CALENDAR API TEST </h1>
</div>

<?php
require_once __DIR__ . '/../api.php';

$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$start_date = strtotime(date('2020/01/01')) * 1000;
$end_date = strtotime(date('2020/12/31')) * 1000;
$response = CalendarAPI::GetCalendarEvents($testhapikey, $start_date, $end_date);
if($response['status'] != 200) {
	echo "<h4> Something went wrong!</h4>";
	echo $response['response'];
	require_once __DIR__ . '/../footer.php';
	exit;
}
$events = json_decode($response['response'], true);
?>
<div class="container">
	<hr/>
	<div class="row">
		<div class="container card p-5 col-md-8">
			<h3 class="text-center"> And Event to Calendar </h3>
			<form method="post" action="createevent.php"> 
				<div class="form-group row">
					<label for="event-name" class="col-md-3"> Event Name </label>
					<input class="form-control col-md-9" name="event_name" id="event-name" />
				</div>
				<div class="form-group row">
					<label for="event-description" class="col-md-3"> Event Description </label>
					<input class="form-control col-md-9" name="event_description" id="event-description"/>
				</div>
				<div class="form-group row">
					<label for="event-date" class="col-md-3"> Event Date </label>
					<input class="form-control col-md-9" name="event_date" id="event-date" type="date"/>
				</div>
				<div class="form-group row">
					<label for="event-state" class="col-md-3"> Event State </label>
					<select name="event_state" id="event-state" class="form-control col-md-9"> 
						<option value="TODO"> TODO </option>
						<option value="DONE"> DONE </option>
					</select>
				</div>
				<div class="form-group row">
					<label for="event-category" class="col-md-3"> Event Category </label>
					<select name="event_category" id="event-category" class="form-control col-md-9"> 
						<option value="EMAIL"> EMAIL </option>
						<option value="LANDING_PAGE"> LANDING_PAGE </option>
						<option value="CUSTOM"> CUSTOM </option>
					</select>
				</div>
				<div class="form-group"> 
					<input type="submit" name="Add" class="btn btn-primary">
				</div>
			</form>
		</div> 
	</div>
	<hr/>
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
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>