<!--Laço 1-->
<?php
 for ($x = 1; $x != 4; $x++) {
    
    for( $i = 3; $i != 0; $i--) {

        echo "$i";

    }

    echo "<br>";
}
?>
<br>

<!--Laço 2-->
<?php
 for ($x = 1; $x != 5; $x++) {
    
    for( $i = 1; $i != 6; $i++) {

        echo "$i";

    }

    echo "<br>";
}
?>
<br>

<!--Laço 3-->
<?php
$n = 9;
 for ($x = 0; $x != 3; $x++) {
    
    for( $i = 3; $i != 0; $i--) {

        echo "$n";
        $n--;

    }

    echo "<br>";

}
?>
<br>

<!--Laço 4-->
<?php
$n = 2;
 for ($x = 0; $x != 3; $x++) {
    
    for( $i = 3; $i != 0; $i--) {

        echo "$n ";
        $n = $n * 2;

    }

    echo "<br>";

}
?>
<br>

<!--Laço 5-->
<?php
 for ($x = 0; $x != 30; $x++) {
    
    $n1 = 30;
    $n2 = 1;

    for( $i = 30; $i != 0; $i--) {
        
        echo str_pad("$n1 ", 3, "0", STR_PAD_LEFT);
        $n1--;

    }

    echo "<br>";

    for( $i = 30; $i != 0; $i--) {
        
        echo str_pad("$n2 ", 3, "0", STR_PAD_LEFT);
        $n2++;

    }

    echo "<br>";

}
?>