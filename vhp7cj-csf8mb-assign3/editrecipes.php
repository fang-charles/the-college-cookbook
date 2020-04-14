<?php
require('connectdb.php');
require('dbquery.php');
?>
<!-- Vivian Pham and Charles Fang -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

<head>

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
					<input type="text" id="recipename" class="form-control" name="recipename" value="<?php echo $recipe['recipeName'] ?>" />
					<span class="error" id="recipename-note"></span>
				</div>
			</div>

			<div class="form-group">
				<label for="ingredient">Ingredients</label>
				<input type="text" id="ingredient" class="form-control" name="ingredient[]" required value="<?php echo $recipe['ingredient1'] ?>" />	
				<span class="error" id="ingredient-note"></span>
			</div>
			<?php
					for ($x = 2; $x <= $recipe['numIngredients']; $x++) {
						$ingredientKey = "ingredient" . $x;
						echo "<div class=\"form-group\">";
						echo "<input type=\"text\" id=\"ingredient\" class=\"form-control\" name=\"ingredient[]\" required value=\"" . $recipe[$ingredientKey] . "\" />";
						echo "</div>";
					}
				?>



			<div id="newElementId"></div>
			<input type="button" class="btn btn-light" id="add" value="Add Ingredient" onclick="addIngredient()" />

			<div class="form-group">
				<label for="ingredient">Steps</label>
				<input type="text" id="steps" class="form-control" name="steps[]" required value="<?php echo $recipe['step1'] ?>" />
				<span class="error" id="steps-note"></span>
			</div>
			<?php
					for ($x = 2; $x <= $recipe['numSteps']; $x++) {
						$stepKey = "step" . $x;
						echo "<div class=\"form-group\">";
						echo "<input type=\"text\" id=\"steps\" class=\"form-control\" name=\"steps[]\" required value=\"" . $recipe[$stepKey] . "\" />";
						echo "</div>";
					}
				?>

			<div id="newStep"></div>
			<input type="button" class="btn btn-light" id="add1" value="Add Step" onclick="addStep()" />

			<div>
				<button class="btn btn-primary" formnovalidate>Update Recipe!</button>
			</div>
		</form>
	</div>
</body>

<?php 
include('footer.html');
?>

<script>
	var numIngredients = 1;
	var numSteps = 1;
	var limit = 10;


	function addIngredient() {
		if (numIngredients == limit) {
			alert("You can only add up to " + counter + " ingredients");
		} else {
			var input = document.createElement("div");
			input.setAttribute('class', 'form-group');
			input.innerHTML = "<input type='text' id='ingredient' class='form-control' name='ingredient[]' required/>";
			document.getElementById("newElementId").appendChild(input);
			numIngredients++;
			document.cookie = "numIngredients=" + numIngredients;
		}
	};

	function addStep() {
		if (numSteps == limit) {
			alert("You can only add up to " + limit + " steps");
		} else {
			var input1 = document.createElement("div");
			input1.setAttribute('class', 'form-group');
			input1.innerHTML = "<input type='text' id='steps' class='form-control' name='steps[]' required/>";
			document.getElementById("newStep").appendChild(input1);
			numSteps++;
			document.cookie = "numSteps=" + numSteps;
		}
	};
</script>
