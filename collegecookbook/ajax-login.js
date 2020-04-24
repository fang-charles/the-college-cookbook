function makeAjaxCall(username) {

  //var username = document.getElementById("username").value;

  // 2. Create an instance of an XMLHttpRequest object
  xhr = GetXmlHttpObject();
  if (xhr == null) {
    alert("Your browser does not support XMLHTTP!");
    return;
  }

  // 3. specify a backend handler (URL to the backend)

  var backend_url = "usernames.php"; //relative path

  // 4. Assume we are going to send a GET request,
  //    use url rewriting to pass information the backend needs to process the request

  //backend_url += "?StringSoFar=" + username; //GET
  var data_tosend = "username=" + username; //POST

  // 5. Configure the XMLHttpRequest instance.
  //    Register the callback function.
  //    Assume the callback function is named showHint(),
  //    don't forget to write code for the callback function at the bottom

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      //check value and type
      if (xhr.status === 200) {
        //ok
        var res = xhr.responseText;
        generateOptions(res);
      } else console.log("xhr fail");
    } else console.log("xhr still in progress");
  };

  // 8. Once the response is back the from the backend,
  //    the callback function is called to update the screen
  //    (this will be handled by the configuration above)

  // 6. Make an asynchronous request

  //xhr.open('GET', backend_url, true);
  //xhr.open('GET', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4621/html-elements.json', true);
  xhr.open("POST", backend_url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // 7. The request is sent to the server
  //xhr.send(null);
  xhr.send(data_tosend);
}

// 1. Add event listener to the input boxes.
//    Call makeAjaxCall() when the event happens

document.getElementById('username').addEventListener("keyup", function()
{
  var str_sofar = document.getElementById('username').value;
  // call the function to send asynch request
  makeAjaxCall(str_sofar);
});


// The callback function processes the response from the server
function generateOptions(str) {
  // Get the <datalist> and <input> elements.
  var dataList = document.getElementById("json-datalist");
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
