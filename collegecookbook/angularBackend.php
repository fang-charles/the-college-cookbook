<?php
require('connectdb.php');
require('dbquery.php');

header('Access-Control-Allow-Origin: http://localhost:4200');
// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// get the size of incoming data
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

// retrieve data from the request
$postdata = file_get_contents("php://input");

// Process data
// (this example simply extracts the data and restructures them back)

// Extract json format to PHP array

$request = json_decode($postdata, true);

$data = [];
//$data[0]['length'] = $content_length;

//actual string value of input bar
$searchTerm = $request['searchTerm'];

//maps key: 'searchTerm' to value $searchTerm
//$data[0]['searchTerm'] = $searchTerm;
$recipes = searchRecipe($searchTerm);
$i = 0;
foreach($recipes as $recipe):
  $data[$i]['recipeName'] = $recipe['recipeName'];
  $data[$i]['ingredient1'] = $recipe['ingredient1'];
  $data[$i]['ingredient2'] = $recipe['ingredient2'];
  $data[$i]['ingredient3'] = $recipe['ingredient3'];
  $data[$i]['ingredient4'] = $recipe['ingredient4'];
  $data[$i]['ingredient5'] = $recipe['ingredient5'];
  $data[$i]['ingredient6'] = $recipe['ingredient6'];
  $data[$i]['ingredient7'] = $recipe['ingredient7'];
  $data[$i]['ingredient8'] = $recipe['ingredient8'];
  $data[$i]['ingredient9'] = $recipe['ingredient9'];
  $data[$i]['ingredient10'] = $recipe['ingredient10'];
  $data[$i]['step1'] = $recipe['step1'];
  $data[$i]['step2'] = $recipe['step2'];
  $data[$i]['step3'] = $recipe['step3'];
  $data[$i]['step4'] = $recipe['step4'];
  $data[$i]['step5'] = $recipe['step5'];
  $data[$i]['step6'] = $recipe['step6'];
  $data[$i]['step7'] = $recipe['step7'];
  $data[$i]['step8'] = $recipe['step8'];
  $data[$i]['step9'] = $recipe['step9'];
  $data[$i]['step10'] = $recipe['step10'];
  $data[$i]['numIngredients'] = $recipe['numIngredients'];
  $data[$i]['numSteps'] = $recipe['numSteps'];
  $data[$i]['username'] = $recipe['username'];
  $data[$i]['recipeId'] = $recipe['recipeId'];
  $i++;
endforeach;


//send it to mysql and get data back somehow
//manually

//stuff that gets returned in JSON
echo json_encode($data);



/*
Office Hour Questions
0) Assignment 3 regrade?
1) how to read json?
2) create recipe.ts object with identical fields? or just return the JSON
3) What does ngFor iterate over?
4) can Ajax be used in angular? or is it only in PHP
5) ng build fiasco?/hyperlinks between localhost/cs4640/.... and localhost:4200


*/
/*
-using $searchTerm, access database and somehow return all rows as JSON?
--echo that back to component.html
--Somehow parse this data and display it with NGFor html cards

*/



/*
foreach ($request as $key => $value)
{
  $data[0][$key] = $value;
}
*/

// Send response (in json format) back the front end
//echo json_encode(['content'=>$data]);
?>

