jQuery.validator.addMethod("name", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 

function validateForm() {
	var x = document.forms["myForm"]["id"].value;
    if (x == "") {
        $('#myAlert').removeClass('hide');
        return false;        
    }
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {    	
        $('#myAlert').removeClass('hide');
        return false;        
    }
    var x = document.forms["myForm"]["email"].value;
    if (x == "") {
        $('#myAlert').removeClass('hide');
        return false;        
    }
    var x = document.forms["myForm"]["password"].value;
    if (x == "") {
        $('#myAlert').removeClass('hide');
        return false;        
    }   
}