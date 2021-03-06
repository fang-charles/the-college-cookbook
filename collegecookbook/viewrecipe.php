<!-- Vivian Pham and Charles Fang -->
<meta name="author" content="Vivian Pham / Charles Fang">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>View Recipe</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<?php session_start();
  include('./src/app/components/header/header.component.html');

?>

  <h1><?php echo $_SESSION['recipename'] ?></h1>

  <h3> Ingredients</h3>
  <ul class="list-group">
    <?php
    $myInputs = $_SESSION["ingredient"];

    foreach ($myInputs as $eachInput) {
      echo "<li class=\"list-group-item\">" . $eachInput . "</li>";
    }
    ?>

  </ul>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Steps</th>

      </tr>
    </thead>
    <tbody>

      <?php
      $myInputs = $_SESSION["steps"];
      $stepNum = 1;

      foreach ($myInputs as $eachInput) {
        echo "      <tr>
        <th scope=\"row\">". $stepNum . "</th>
        <td>" . $eachInput . "        </td>
        </tr>";
        $stepNum++;
      }
      ?>
    </tbody>
  </table>
</body>

<?php 
  include('./src/app/components/footer/footer.component.html');

?>

</html>
