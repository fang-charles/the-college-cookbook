<?php

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
$data[0]['searchTerm'] = $searchTerm;

//send it to mysql and get data back somehow
//manually 

//stuff that gets returned in JSON
echo json_encode(['content'=>$data]);



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

