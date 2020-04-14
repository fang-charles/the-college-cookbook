<?php

function addRecipe($name, $ingredients, $steps)
{
    global $db;

    $food = array(); // array of ingredient1 ,ingredient2, etc.

    for($i = 1; $i <= count($ingredients); $i++){
        $food[] = "ingredient" . $i;
    }

    $ingredientquery = ""; // string of ingredient1, ingredient2, ...
    $ingredientvalues = ""; // string of :ingredient1, :ingredient2, ...
    foreach ($food as $f) {
        $ingredientquery = $ingredientquery . $f . ", ";
        $ingredientvalues = $ingredientvalues . ":" . $f . ", ";
    }

    $stepsarray = array(); // array of step1, step2, ...

    for($i = 1; $i <= count($steps); $i++){
        $stepsarray[] = "step" . $i;
    }

    $stepquery = ""; // string of step1, step2, ...
    $stepvalues = ""; // string of :step1, :step2, ...
    foreach ($stepsarray as $step) {
        if($step != end($stepsarray)) {
            $stepquery = $stepquery . $step . ", ";
            $stepvalues = $stepvalues . ":" . $step . ", ";
        }
        else {
            $stepquery = $stepquery . $step;
            $stepvalues = $stepvalues . ":" . $step;
        }
    }

    $query = "INSERT INTO recipes (recipeName, $ingredientquery $stepquery)
                VALUES (:name, $ingredientvalues $stepvalues)";

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);

    foreach($stepsarray as $index => $step ) {
        $statement->bindValue(':' . $step, $steps[$index]);
    }

    foreach($food as $index => $f){
        $statement->bindValue(':' . $f, $ingredients[$index]);
    }

    $statement->execute();
    $statement->closeCursor();
}

function getAllRecipes()
{
    global $db;

    $query = "SELECT * FROM recipes";
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
?>

