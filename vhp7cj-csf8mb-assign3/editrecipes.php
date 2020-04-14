<?php
require('connectdb.php');
require('dbquery.php');
?>
<!-- Vivian Pham and Charles Fang -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

<head>
	<style>
		#title_msg:hover {
			background-color: grey;
			animation-name: color-shift;
			animation-duration: 4s;
			animation-iteration-count: infinite;
		}

		.card-body:hover {
			background-color: aqua;
		}

		@keyframes color-shift {
			0% {
				background-color: red;
			}

			25% {
				background-color: yellow;
			}

			50% {
				background-color: blue;
			}

			100% {
				background-color: green;
			}
		}
	</style>
</head>

<?php session_start();
include('header.html');
?>

<body>
	<div style="text-align:center">
		<h1>Edit Recent Recipe</h1>
	</div>
	<?php $recipe = getRecentRecipe($_COOKIE['recipe_id']); ?>
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