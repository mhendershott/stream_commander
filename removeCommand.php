<?php
//sanitize $_GET array
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$commandID = $_GET['commandID'];


// remove command from database
$db = new mysqli('localhost', 'playerdb', 'bigbeefyman', 'player');
$query = "DELETE FROM player.commandQueue WHERE id = '$commandID'";
$result = $db->query($query);

//catch query error
if (!$result) {
    $message  = 'Invalid query: ' . $db->error . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
} else {
    echo "Command removed from queue";
}
