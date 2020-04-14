<?php
require('connectdb.php');
require('dbquery.php');
?>
<!-- Vivian Pham and Charles Fang -->
<link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous"
/>

<?php session_start() ;
      include('header.html');
  ?>

<body onload="initializeCookies()"> 

<div style="text-align:center">
  <h1>Submit a Recipe</h1>
</div>

<div class="col-xs-12 col-sm-12 col-lg-12">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="recipeForm">
  <div class="form-group">
  <div class="col-xs-6 col-xs-offset-3">
    <label for="recipename">Recipe Name</label>
    <input type="text" id="recipename" class="form-control" name="recipename"/>
    <span class="error" id="recipename-note"></span>
</div>
  </div>

  <div class="form-group">
    <label for="ingredient">Ingredients</label>
    <input type="text" id="ingredient" class="form-control" name="ingredient[]" required/>
    <span class="error" id="ingredient-note"></span>
  </div>

  <div id="newElementId"></div>
  <input type="button" class="btn btn-light" id="add" value="Add Ingredient" onclick="addIngredient()"/>

  <div class="form-group">
    <label for="ingredient">Steps</label>
    <input type="text" id="steps" class="form-control" name="steps[]" required/>
    <span class="error" id="steps-note"></span>
  </div>

  <div id="newStep"></div>
  <input type="button" class="btn btn-light" id="add1" value="Add Step" onclick="addStep()"/>

  <div>
  <button class="btn btn-primary" formnovalidate>Add Recipe!</button>
  </div>
</form>
</div>
</body>
<script>
  var numIngredients = 1;
  var numSteps = 1;
  var limit = 10;

  function initializeCookies(){
    document.cookie = "numIngredients=" + numIngredients;
    document.cookie = "numSteps=" + numSteps;
  }

  function addIngredient(){
    if (numIngredients == limit)  {
          alert("You can only add up to " + counter + " ingredients");
     }
     else {
      var input = document.createElement("div");
      input.setAttribute('class', 'form-group');
      input.innerHTML = "<input type='text' id='ingredient' class='form-control' name='ingredient[]' required/>";
      document.getElementById("newElementId").appendChild(input);
      numIngredients++;
      document.cookie = "numIngredients=" + numIngredients;
     }
  };

  function addStep(){
    if (numSteps == limit)  {
          alert("You can only add up to " + limit + " steps");
     }
     else {
      var input1 = document.createElement("div");
      input1.setAttribute('class', 'form-group');
      input1.innerHTML = "<input type='text' id='steps' class='form-control' name='steps[]' required/>";
      document.getElementById("newStep").appendChild(input1);
      numSteps++;
      document.cookie = "numSteps=" + numSteps;
     }
  };
</script>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['recipename']))
        echo "Please fill out the recipe name. <br>";

    if (count($_POST['ingredient']) == 1 && $_POST['ingredient'][0] == "")
        echo "Please add an ingredient. <br>";

    if (count($_POST['steps']) == 1 && $_POST['steps'][0] == "")
        echo "Please add a step. <br>";

    if((!empty($_POST['recipename'])) && (count($_POST['ingredient']) >= 1 && $_POST['ingredient'][0] != "") && (count($_POST['steps']) >= 1 && $_POST['steps'][0] != "")) {
        date_default_timezone_set("America/New_York");
        $recipe_id = $_COOKIE['username'] . date("h:i:s");

        addRecipe($_POST['recipename'], $_POST['ingredient'], $_POST['steps'], $recipe_id);
        setcookie('recipe_id', $recipe_id, time()+36000);

        $_SESSION['recipename'] = $_POST['recipename'];
        $_SESSION['ingredient'] = $_POST['ingredient'];
        $_SESSION['steps'] = $_POST['steps'];

        header("Location: " . "viewrecipe.php");
    }
}
?>
<!-- <form [formGroup]="recipe">
  <div class="form-group">
  <label>
    Name: <input formControlName="name" />
  </label>
  </div>
  <h2>Ingredients</h2>

  <div formArrayName="ingredients">
    <div *ngFor="let item of Ingredients.controls; let pointIndex=index" [formGroupName]="pointIndex">
      <label>
        Ingredient: <input formControlName="ingredient" />
      </label>
      <button type="button" (click)="deleteIngredient(pointIndex)">Delete Ingredient</button>
    </div>
    <button type="button" (click)="addIngredient()">Add Ingredient</button>
  </div>

</form>

{{ this.recipe.value | json }} -->
