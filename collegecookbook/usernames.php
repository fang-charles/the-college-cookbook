<?php
require('connectdb.php');

  $username = $_POST['username'];

  global $db;

  $query = "SELECT DISTINCT username FROM recipes WHERE username LIKE :username";

  $statement = $db->prepare($query);
  $statement->bindValue(':username', '%' . $username . '%');
  $statement->execute();

  $resultsArray = [];
  $results = $statement->fetchAll();
  $statement->closeCursor();

  if (count($results) > 0) {
    foreach($results as $r) {
      $resultsArray[] = $r['username'];
    }
    print json_encode($resultsArray);
  }

?>
