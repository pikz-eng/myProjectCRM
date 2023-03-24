function editInitials()
{
    var editFirst = document.getElementById("editFirst").value
    var editLast = document.getElementById("editLast").value;
    var editInit = document.getElementById("editInit");

    editInit.value =editFirst.substring(0,1) + "" + editLast.substring(0,1); 
}


function getAge() {
var custBirth = new Date(document.getElementById("custBirth").value);
var today = Date.now();
var age = new Date(today - custBirth.getTime());

document.getElementById("custAge").value = Math.abs(age.getUTCFullYear() - 1970);
}