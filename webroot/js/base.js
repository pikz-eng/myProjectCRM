function showCustomers()
{
    var custList = document.getElementById("customers_list");
    if(custList.style.visibility === "visible")
    {
        custList.style.visibility = "hidden";

    }
    else
    {
       custList.style.visibility = "visible";
    }

}

function showUser()
{
    var userList = document.getElementById("users_list");

    if(userList.style.visibility === "visible")
    {
        userList.style.visibility = "hidden";
    }
    else{
        userList.style.visibility = "visible";
    }
}
