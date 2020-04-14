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

<?php session_start() ;
      include('header.html');
?>

<script>
  document
    .getElementById("title_msg")
    .addEventListener("mouseover", updateMessage);

  function updateMessage() {
    document.getElementById("title_msg").innerHTML =
      "<h1>Welcome to Cooking 101</h1>";
  }
</script>

<div style="text-align:center" onmouseover="updateMessage()" onmouseout="revertMesage()" id="title_msg">
  <h1>Food is life</h1>
</div>
<h1 align="center">Hi, <font color="green" style="font-style:italic"><?php echo $_COOKIE['username']; ?></font>
</h1>

<?php $recipes = getAllRecipes(); ?>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <?php foreach($recipes as $recipe): ?>
      <div class="col-md-6">
        <div class="card mb-6 box-shadow">
          <div class="card-body">
            <h5 class="card-title"><?php echo $recipe['recipeName'] ?></h5>
            <p class="card-text">
              Ingredients:
              <?php $str = "";
              for($i = 1; $i <= $recipe['numIngredients']; $i++){
                  $str = "ingredient" . $i;
                  if($i != $recipe['numIngredients'])
                      echo "$recipe[$str], ";

                  else
                      echo "$recipe[$str]";
              } ?>
            </p>
            <p class="card-text">
                Steps: <br>
                <?php $str = "";
                for($i = 1; $i <= $recipe['numSteps']; $i++){
                    $str = "step" . $i;
                    echo "$i. $str <br>";
                }
                ?>
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  View
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Favorite
                </button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>