<?
 $nr_indeksu = ‘162642’;
 $nrGrupy = ‘4’;
 echo ‘Jakub Jurewicz ‘.$nr_indeksu.’ grupa ‘.$nrGrupy.’ <br /><br />’;
 echo ‘Zastosowanie metody include() <br />’;
?>

<?php
    echo "include(), require_once()"
?>

<?php

$color = 'green';
$fruit = 'apple';

?>
<?php
echo "A $color $fruit";

include 'vars.php';
echo "A $color $fruit";

?>

<?php
    echo "if, else, elseif, switch"
?>
<?php
if ($a > $b) {
  echo "a is bigger than b";
}
elseif ($a < $b) {
  echo "b is bigger than a";
}  
else {
  echo "a is equal b";
}
?>

<?php
    echo "while(), for()"
?>
<?php

$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;
?>
<?php
    echo '$_GET , $_POST, $_SESSION '
?>
<?php
echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
?>