<!-- Vivian Pham and Charles Fang -->

<link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous"
/>

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

<div
  style="text-align:center"
  onmouseover="updateMessage()"
  onmouseout="revertMesage()"
  id="title_msg"
>
  <h1>The College Cookbook</h1>
</div>
<h1 align ="center">Hi, <font color="green" style="font-style:italic"><?php echo $_SESSION['username']; ?></font></h1>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-6 box-shadow">
          <div class="card-body">
            <h5 class="card-title">Chicken Soup</h5>
            <p class="card-text">
              Ingredients: Chicken, Chicken Broth, Salt, Herbs, Egg Noodles
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
      <div class="col-md-6">
        <div class="card mb-6 box-shadow">
          <div class="card-body">
            <h5 class="card-title">Italian Beef</h5>
            <p class="card-text">
              Ingredients: Beef Chuck, Salt, Pepper, Italian Herbs <br />
              Appliances: Instant Pot
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
              <small class="text-muted">80 mins</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-6 box-shadow">
          <div class="card-body">
            <h5 class="card-title">Naan Pizza</h5>
            <p class="card-text">
              Ingredients: Naan, Tomato Sauce, Gouda Cheese <br />
              Appliances: Oven
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
              <small class="text-muted">20 mins</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-6 box-shadow">
          <div class="card-body">
            <h5 class="card-title">Ramen</h5>
            <p class="card-text">
              Ingredients: Chicken Broth, Ramen Noodles, Boiled Egg, Imitation
              Crab, Pork Belly
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
              <small class="text-muted">60 mins</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
