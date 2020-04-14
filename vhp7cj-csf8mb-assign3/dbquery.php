<?php

function addRecipe($name, $ingredients, $steps)
{
    global $db;

    $food = array();

    for($i = 1; $i <= count($ingredients); $i++){
        $food[] = "ingredient" . $i;
    }

    $ingredientquery = "";
    foreach ($food as $f)
        $ingredientquery = $ingredientquery . $f . ", ";

    $s = array();

    for($i = 1; $i <= count($steps); $i++){
        $s[] = "step" . $i;
    }

    $stepquery = "";
    foreach ($s as $step) {
        if($step == end($s))
            break;
        $step
    }
    $stepquery = $stepquery . end($s);
    echo $stepquery;
    echo $ingredientquery;
    //$query = "INSERT INTO recipes (recipeName, ingredient)";



}
?>

