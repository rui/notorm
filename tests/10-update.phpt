--TEST--
Insert, update, delete
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";

$id = 5; // auto_increment is disabled in demo
$software->application()->insert(array(
	"id" => $id,
	"author_id" => $software->author[12],
	"title" => new NotORM_Literal("'Texy'"),
	"web" => "",
	"slogan" => "The best humane Web text generator",
));
$application = $software->application[$id];
echo $application["title"] . "\n";

$application["web"] = "http://texy.info/";
echo $application->update() . " row updated.\n";
echo $software->application[$id]["web"] . "\n";

echo $application->delete() . " row deleted.\n";
echo count($software->application("id", $id)) . " rows found.\n";
?>
--EXPECTF--
Texy
1 row updated.
http://texy.info/
1 row deleted.
0 rows found.
