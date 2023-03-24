
function inputInitials(){
var profileFirst = document.getElementById("registerFirst").value;
var profileLast = document.getElementById("registerLast").value;
var profileInitials = document.getElementById("registerInitials");

profileInitials.value = profileFirst.substring(0,1) + "" + profileLast.substring(0,1);

}