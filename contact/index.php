<?php 
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../api.php';

$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$response = ContactAPI::GetAllContacts($testhapikey, 5);
if($response['status'] != 200) {
	echo "<div class='alert alert-danger' role='alert'>";
	echo "<h3> Whoops! Something went wrong! </h3>";
	echo $response['response'];
	echo "</div>";
	require_once __DIR__ . '/../footer.php';
	exit;
}

$responseData = json_decode($response['response'], true);
$contacts = $responseData['contacts'];
?>
<div class="jumbotron text-center">
	<h1> Contact API Test</h1>
</div>

<div class="row">
	<div class="col-md-6">
		<?php 
		foreach ($contacts as $id => $contact) {
			$properties = $contact['properties'];
			$identities = $contact['identity-profiles'][0]['identities'];
		?>
		<div class="card p-5 mb-5">
			<p> <span> <strong> Profile URL </strong> </span> : 
				<span> <?php echo $contact['profile-url'] ?></span>
			</p>
			<?php foreach($properties as $prop_key => $prop) { ?>
				<p> <span> <strong> <?php echo $prop_key; ?> </strong> </span> : 
					<span> <?php echo $prop['value']; ?></span>
				</p>
			<?php } ?>
			<?php foreach($identities as $ident_key => $ident) { ?>
				<p> <span> <strong> <?php echo $ident['type']; ?> </strong> </span> : 
					<span> <?php echo $ident['value']; ?></span>
				</p>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<div class="col-md-6"> 
		<div class="card p-5">
			<form action="createcontact.php" method="POST">
				<div class="form-group row">
					<label class="col-md-4" for="email"> Email </label>
					<input type="email" name="email" id="email" class="form-control col-md-8" />
				</div>
				<div class="form-group row">
					<label for="firstname" class="col-md-4"> First Name </label>
					<input type="firstname" name="firstname" id="firstname" class="form-control col-md-8" />
				</div>
				<div class="form-group row">
					<label for="lastname" class="col-md-4"> Last Name </label>
					<input type="lastname" name="lastname" id="lastname" class="form-control col-md-8" />
				</div>
				<div class="form-group row">
					<label for="company" class="col-md-4"> Company </label>
					<input type="company" name="company" id="company" class="form-control col-md-8" />
				</div>
				<input type="submit" name="Submit" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>
<?php 
	require_once __DIR__ . '/../footer.php';
?>