<?php
$age = array("John"=>"55", "Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach ($age as $x => $x_value) {
echo "Key=" . $x . ", value=" . ($x_value + 10) . "<br/>";
}
?>