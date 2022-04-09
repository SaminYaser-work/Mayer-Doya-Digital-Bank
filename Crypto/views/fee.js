const form = document.querySelector("form");
const services = document.querySelector("#services");
const fee = document.querySelector("#fee");

form.onsubmit = () => {
  const amount = document.querySelector("#amount").value;

  if (amount <= 0) {
    alert("Please enter a valid amount");
    return false;
  }

  if (services.selectedIndex == 0) {
    alert("Please select a service");
    return false;
  }

  let http = new XMLHttpRequest();
  http.open("POST", "../controllers/get-fee.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send(
    "amount=" + amount + "&services=" + services[services.selectedIndex].value
  );

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      fee.value = this.responseText;
    }
  };

  return false;
};
