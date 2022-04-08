const validity = document.getElementById("check-validity");
const message = document.querySelector(".msg");

validity.onclick = () => {
  let http = new XMLHttpRequest();
  http.open("POST", "../controllers/check-debit-val.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      message.innerHTML = this.responseText;
    }
  };
};
