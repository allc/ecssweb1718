<?php

$relPath = "../";

$dbLoc = realpath($relPath . "../db/ecss.db");
$db = new PDO('sqlite:' . $dbLoc);

include_once($relPath . "navbar/navbar.php");
echo getNavBar();

//build group data
$sql = "SELECT *
		FROM jumpstart AS j
		INNER JOIN helper AS h
		ON j.memberID = h.memberID
		WHERE j.helper = 1;";

$statement = $db->query($sql);
$results = array();

while($rowObject = $statement->fetchObject()){
	$results[] = $rowObject;
}
?>
<script src="jumpstart.js"></script>
<link rel="stylesheet" href="<?= $relPath ?>theme.css">
<script type="text/javascript">
	var groups = <?= json_encode($results) ?>;

	$(document).ready(function(){
		load();
	});
</script>