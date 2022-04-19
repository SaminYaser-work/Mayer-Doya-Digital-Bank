function ValidateEmail(inputText)
{
let mailformat = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(inputText.value.match(mailformat))
{
//alert("You have entered a valid email address!");    //The pop up alert for a valid email address
document.emailform.email.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");    //The pop up alert for an invalid email address
document.emailform.email.focus();
return false;
}
}