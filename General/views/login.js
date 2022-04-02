const form = document.querySelector("form");

const checkEmpty = (input) => input.trim().length > 0;

const showError = (index) => {
  document
    .getElementsByClassName("input-container")
    [index].classList.add("error");

  let message = index == 0 ? "Username" : "Password";

  document.getElementsByClassName("label")[index].innerHTML =
    message + ' - <span class="span-small">Please fill out this field</span>';
};

form.onsubmit = () => {
  const data = document.getElementsByClassName("input-field");
  reset(data);
  let isValid = true;

  for (let i = 0; i < data.length; i++) {
    if (!checkEmpty(data[i].value)) {
      showError(i);
      isValid = false;
    }
  }

  return isValid;
};

const reset = (data) => {
  for (let i = 0; i < data.length; i++) {
    resetData(i);
  }
};

const resetData = (index) => {
  document
    .getElementsByClassName("input-container")
    [index].classList.remove("error");

  let message = index == 0 ? "Username" : "Password";

  document.getElementsByClassName("label")[index].innerHTML = message;
};
