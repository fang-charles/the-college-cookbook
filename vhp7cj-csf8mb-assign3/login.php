<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Charles Fang">
  <title>Login</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <style>
    label {
      display: block;
    }

    input,
    textarea,
    button {
      display: inline-block;
      font-family: arial;
      margin: 5px 10px 5px 40px;
      padding: 8px 12px 8px 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      width: 90%;
      font-size: small;
    }

    div {
      margin-left: auto;
      margin-right: auto;
      width: 60%;
    }

    h1 {
      text-align: center;
    }

    button[type=submit] {
      padding: 5px 15px;
      background: #ccc;
      border: 0 none;
      cursor: pointer;
      border-radius: 5px;
    }

    button[type=submit]:hover {
      background-color: #ccceee;
    }

    .msg {
      margin-left: 40px;
      font-style: italic;
      color: red;
    }

    html {
      height: 100%;
    }

    body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      position: relative;
    }

    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 50px;
      color: WhiteSmoke;
      padding: 10px;
    }
  </style>

</head>

<body >

  <div>
    <h1>Welcome to The College Cookbook!</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get" name="loginForm">
      Please enter your name below: </br>
      <input type="text" name="username" placeholder="Gordon Ramsay" maxlength="20" required /> <br />
      <input type="submit" value="Enter the wonderful world of wonderful food!" class="btn btn-light"  />   
    </form>

</body>

<?php

    if (isset($_GET['username'])){
    if (($_SERVER['REQUEST_METHOD']=="GET") && (strlen($_GET['username']) >0) && (strlen($_GET['username']) <= 20)){
        setcookie('username', $_GET['username'], time()+36000);
        header('Location: home.php');
    }
  }

  ?>


</html>