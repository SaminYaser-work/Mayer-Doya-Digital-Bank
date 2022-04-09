const validity = document.getElementById("check-validity");
const message = document.querySelector(".msg");
const loading = document.querySelector("#loading");

validity.onclick = () => {
  loading.style.display = "block";
  validity.style.display = "none";
  let http = new XMLHttpRequest();
  http.open("POST", "../controllers/check-debit-val.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      validity.style.display = "none";
      loading.style.display = "none";
      message.innerHTML = this.responseText;
    }
  };
};
