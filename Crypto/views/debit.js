const form = document.querySelector("form");
const houseno = document.getElementById("houseno");
const street = document.getElementById("street");
const city = document.getElementById("city");

form.onsubmit = () => {
  if (houseno.value == "" || street.value == "" || city.value == "") {
    alert("Please fill out all fields");
    return false;
  }

  if (houseno.value == "0") {
    alert("Please enter a valid house number");
    return false;
  }

  return true;
};
