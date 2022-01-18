



var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// valinadtion emaill
var myInput2 = document.getElementById("email");
var letter2 = document.getElementById("letter2");
var icon = document.getElementById("icon");
var period = document.getElementById("period");



// When the user clicks on the password field, show the message box
myInput2.onfocus = function() {
  document.getElementById("message2").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput2.onblur = function() {
  document.getElementById("message2").style.display = "none";
}

// When the user starts to type something inside the password field
myInput2.onkeyup = function() {
  // Validate lowercase letters
  var Letters = /^\w+([\.-]?\w+)*/;
  if(myInput2.value.match(Letters)) {  
    letter2.classList.remove("invalid");
    letter2.classList.add("valid");
  } else {
    letter2.classList.remove("valid");
    letter2.classList.add("invalid");
  }
  
 

  // Validate numbers
  var emailIcon = /@\w+/;
  if(myInput2.value.match(emailIcon)) {  
    icon.classList.remove("invalid");
    icon.classList.add("valid");
  } else {
    icon.classList.remove("valid");
    icon.classList.add("invalid");
  }
 

  
  var endEmail = /(\.\w{2,3})+$/;
  if(myInput2.value.match(endEmail)) {  
    period.classList.remove("invalid");
    period.classList.add("valid");
  } else {
    period.classList.remove("valid");
    period.classList.add("invalid");
  }
  
}


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }
  
  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }
  
  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }