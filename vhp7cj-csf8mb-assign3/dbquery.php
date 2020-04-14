
<meta name="author" content="Vivian Pham">

<?php

function addRecipe($name, $ingredients, $steps, $id)
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
        $stepquery = $stepquery . $step . ", ";
        $stepvalues = $stepvalues . ":" . $step . ", ";
    }

    $numIngredients = count($ingredients);
    $numSteps = count($steps);
    $username = $_COOKIE['username'];

    $query = "INSERT INTO recipes (recipeName, $ingredientquery $stepquery numIngredients, numSteps, username, recipeId)
                VALUES (:name, $ingredientvalues $stepvalues :numIngredients, :numSteps, :username, :id)";

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);

    foreach($stepsarray as $index => $step ) {
        $statement->bindValue(':' . $step, $steps[$index]);
    }

    foreach($food as $index => $f){
        $statement->bindValue(':' . $f, $ingredients[$index]);
    }

    $statement->bindValue(':numIngredients', $numIngredients);
    $statement->bindValue(':numSteps', $numSteps);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':id', $id);
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

function getRecentRecipe($id)
{
    global $db;

    $query = "SELECT * FROM recipes WHERE recipeId = :id" ;

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

function updateRecipe($name, $ingredients, $steps, $id)
{
    global $db;

    $food = array(); // array of ingredient1 ,ingredient2, etc.

    for($i = 1; $i <= count($ingredients); $i++){
        $food[] = "ingredient" . $i;
    }

    $ingredientquery = ""; // string of ingredient1 =: ingredient1, ingredient2 =: ingredient2, ...

    foreach($food as $f){
        $ingredientquery = $ingredientquery . $f ."=:" . $f . ", ";
    }

    $stepsarray = array(); // array of step1, step2, ...

    for($i = 1; $i <= count($steps); $i++){
        $stepsarray[] = "step" . $i;
    }

    $stepquery = ""; // string of step1 =: step1, step2 =: step2, ...

    foreach ($stepsarray as $step) {
        $stepquery = $stepquery . $step . "=:" . $step . ", ";
    }

    $numIngredients = count($ingredients);
    $numSteps = count($steps);
    $query = "UPDATE recipes SET recipeName=:recipeName, $ingredientquery $stepquery numIngredients=:numIngredients, numSteps=:numSteps WHERE recipeId=:id";
    echo $query;
    $statement = $db->prepare($query);

    $statement->bindValue(':recipeName', $name);

    foreach($stepsarray as $index => $step ) {
        $statement->bindValue(':' . $step, $steps[$index]);
    }

    foreach($food as $index => $f){
        $statement->bindValue(':' . $f, $ingredients[$index]);
    }
    $statement->bindValue(':numIngredients', $numIngredients);
    $statement->bindValue(':numSteps', $numSteps);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>

