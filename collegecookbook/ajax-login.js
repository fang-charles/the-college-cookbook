function makeAjaxCall(methodType, url, data_tosend) {
  // promise
  var promiseObj = new Promise(function (resolve, reject) {
    // create an instance of an XMLHttpRequest object
    xhr = GetXmlHttpObject();
    if (xhr == null) {
      alert("Your browser does not support XMLHTTP!");
      return;
    }

    // make asynchronous request
    xhr.open(methodType, url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // send request to server
    xhr.send(data_tosend);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) { //check value and type
        if (xhr.status === 200) { //ok
          var res = xhr.responseText;
          resolve(res);
        } else {
          console.log("xhr fail");
          reject(xhr.status);
        }
      } else console.log("xhr still in progress");
    }
  });
  return promiseObj;
}

  document.getElementById('username').addEventListener("keyup", function()
  {
    var str_sofar = document.getElementById('username').value;

    var backend_url = "usernames.php"; //relative path

    var data_tosend = "username=" + str_sofar; //POST
    // call the function to send asynch request
    makeAjaxCall("POST", backend_url, data_tosend).then(generateOptions, errorHandler);
  });

function generateOptions(str) {
  // Get the <datalist> and <input> elements.

  var dataList = document.getElementById("json-datalist");
  dataList.innerHTML ="";
  var input = document.getElementById("username");
  // what do to with the response
  // Parse the JSON
  var jsonOptions = JSON.parse(str);

  // Loop over the JSON array.
  jsonOptions.forEach(function (item) {
    // Create a new <option> element.
    var option = document.createElement("option");
    // Set the value using the item in the JSON array.
    option.value = item;
    // Add the <option> element to the <datalist>.
    dataList.appendChild(option);
  });

  // Update the placeholder text.
  input.placeholder = "Gordon Ramsay";
}

function GetXmlHttpObject() {
  // Create an XMLHttpRequest object

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject) {
    // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}

// error
  function errorHandler(statusCode){
    console.log("failed with status", status);
  }
