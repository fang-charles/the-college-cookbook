<!-- Vivian Pham and Charles Fang -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>View Recipe</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>
  <body>
    <h1><?php if(isset($_POST['recipename'])) echo $_POST['recipename'] ?>Instant Pot French Dip Sandwich [Italian Drip]</h1>
    <h5>Recipe from: https://thisoldgal.com/instant-pot-french-dip/</h5>
    <h3> Ingredients</h3>
    <ul class="list-group">
      <li class="list-group-item" id="ingredient1"></li>
      <li class="list-group-item">Italian Dressing</li>
      <li class="list-group-item">Warm Water</li>
      <li class="list-group-item">Pepperoncini</li>
      <li class="list-group-item">French Bread</li>
    </ul>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Steps</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>
            Trim your roast and cut into 4 pieces. Place Roast, Consommé,
            Worcestershire Sauce, Seasoning packets, Soy Sauce, Water, 1/2 jar
            Pepperocini Juice and Pepperoncini Peppers to Pressure Cooker
            cooking pot.
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>
            Lock on lid and close Pressure Valve. Cook at High Pressure for 55
            minutes. When Beep sounds, allow a Full Natural Pressure Release.
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>
            Remove beef from pot and shred well. Skim fat off juice and return
            beef to cooking pot.
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>
            Butter both sides of Deli Rolls and sprinkle garlic on both sides.
            Place in Air Fryer or under the boiler and toast until slightly
            golden. Place meat on top of bottom half of Deli Roll and top with
            cheese, if desired. Melt cheese in Air Fryer or under broiler.
          </td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>
            Place a couple of Pepperoncini Peppers on top of meat. Place top bun
            and cut sandwich on the diagonal. Serve with a Ramekin full of
            juice, for dipping.
          </td>
        </tr>
      </tbody>
    </table>
  </body>

<script>
    var i;

    i = () => "Beef Chuck Roast";

    document.getElementById("ingredient1").innerHTML = i();

</script>
</html>
