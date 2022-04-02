const form = document.querySelector("form");

// Input validation
const checkInput = (input) => input.trim().length > 0;

const showError = (index) => {
  document
    .getElementsByClassName("input-container")
    [index].classList.add("error");

  let message = getMessage(index);

  document.getElementsByClassName("label")[index].innerHTML =
    message + ' - <span class="span-small">Please fill out this field</span>';
};

form.onsubmit = () => {
  const data = document.getElementsByClassName("input-field");
  reset(data);
  let isValid = true;

  for (let i = 0; i < data.length; i++) {
    if (!checkInput(data[i].value)) {
      showError(i);

      isValid = false;
      continue;
    }

    if (i === 3 && checkInput(data[i].value)) {
      if (!isValidEmail(data[i].value)) {
        showEmailError();
        isValid = false;
      }
    }
  }

  return isValid;
};

// Email validation
const isValidEmail = (email) => {
  validDomains = ["gmail.com", "yahoo.com", "hotmail.com", "outlook.com"];
  emailDomain = email.split("@")[1];
  return validDomains.includes(emailDomain);
};

const showEmailError = () => {
  document.getElementsByClassName("input-container")[3].classList.add("error");
  document.getElementsByClassName("label")[3].innerHTML =
    'Email - <span class="span-small">This domain is not supported</span>';
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

  let message = getMessage(index);

  document.getElementsByClassName("label")[index].innerHTML = message;
};

const getMessage = (index) => {
  let message = "";

  switch (index) {
    case 0:
      message = "First Name";
      break;
    case 1:
      message = "Last Name";
      break;
    case 2:
      message = "Username";
      break;
    case 3:
      message = "Email";
      break;
    case 4:
      message = "Password";
      break;
    case 5:
      message = "Retype Password";
      break;
  }
  return message;
};
