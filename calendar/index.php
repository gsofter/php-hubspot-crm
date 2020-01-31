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
		<div class="container">
			<h3 class="text-center"> And Event to Calendar </h3>
			<form method="post" action="createevent.php"> 
				<div class="form-group">
					<label for="event-name"> Event Name </label>
					<input class="form-control" name="event_name" id="event-name"/>
				</div>
				<div class="form-group">
					<label for="event-description"> Event Description </label>
					<input class="form-control" name="event_description" id="event-description"/>
				</div>
				<div class="form-group">
					<label for="event-date"> Event Date </label>
					<input class="form-control" name="event_date" id="event-date" type="date"/>
				</div>
				<div class="form-group">
					<label for="event-state"> Event State </label>
					<select name="event_state" id="event-state" class="form-control"> 
						<option value="TODO"> TODO </option>
						<option value="DONE"> DONE </option>
					</select>
				</div>
				<div class="form-group">
					<label for="event-category"> Event Category </label>
					<select name="event_category" id="event-category" class="form-control"> 
						<option value="EMAIL"> EMAIL </option>
						<option value="LANDING_PAGE"> LANDING_PAGE </option>
						<option value="CUSTOM"> CUSTOM </option>
					</select>
				</div>
				<div class="form-control"> 
					<input type="submit" name="submit">
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