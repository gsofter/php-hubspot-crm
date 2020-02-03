<?php
require_once __DIR__ . '/../api.php';

$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";

$post_data = array(
	'properties' => [
        [
            'property' => 'email',
            'value' => $_POST['email'],
        ],
        [
            'property' => 'firstname',
            'value' => $_POST['firstname'],
        ],
        [
            'property' => 'lastname',
            'value' => $_POST['lastname'],
        ],
        [
            'property' => 'company',
            'value' => $_POST['company'],
        ],
    ],
);

require_once __DIR__ . "/../header.php";
?>
<div class="jumbotron text-center">
	<h1> Contact API Test</h1>
</div>
<?php
$response = ContactAPI::CreateContact($testhapikey, $post_data);
if($response['status'] != 200) {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "<h3> Contact Create Failed</h3>";
	echo $response['response'];
	echo "</div>";
    echo "<a href='/contact/index.php'> Back </a>";
}
else {
    echo "<div class='alert alert-success' role='alert'>";
    echo "<h3> Contact Create Succeed! </h3>";
	echo $response['response'];
	echo "</div>";
    echo "<a href='/contact/index.php'> Back </a>";
}
require_once __DIR__ . "/../footer.php";
?>