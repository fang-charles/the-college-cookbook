<?php require('connectdb.php'); ?>
<!-- Vivian Pham and Charles Fang -->
<link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous"
/>

<div style="text-align:center">
  <h1>Submit a Recipe</h1>
</div>

<form action="recipe.php" method="post" name="recipeForm">
  <div class="form-group">
    <label for="recipename">Recipe Name</label>
    <input type="text" id="recipename" class="form-control" name="recipename"/>
    <span class="error" id="recipename-note"></span>
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
  <button class="btn btn-primary" onclick="validateForm()">Add Recipe!</button>
  </div>
</form>

<script>
  var numIngredients = 1;
  function addIngredient(){
      var input = document.createElement("div");
      input.setAttribute('class', 'form-group');
      input.innerHTML = "<input type='text' id='ingredient' class='form-control' name='ingredient[]' required/>";
      document.getElementById("newElementId").appendChild(input);
      numIngredients++;
  };

  function addStep(){
      var input1 = document.createElement("div");
      input1.setAttribute('class', 'form-group');
      input1.innerHTML = "<input type='text' id='steps' class='form-control' name='steps[]' required/>";
      document.getElementById("newStep").appendChild(input1);
  };

  function validateForm() {
      var x = document.forms["recipeForm"]["name"].value;
      if (x == "") {
          alert("Name must be filled out!");
          return false;
      }

      var i = function(){ return numIngredients + " ingredients used."; };
      alert(i());

  };

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("Location: " . 'viewrecipe.php');
    }
  ?>

</script>
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
