const form           = document.getElementById("form");
const button         = document.getElementById("submit-btn");
const sku_input      = document.getElementById("sku");
const name_input     = document.getElementById("name");
const price_input    = document.getElementById("price");
const select_input   = document.getElementById("type");
const errorContainer = document.getElementById("js-error-container");
let errorMessage     = [];

sku_input.addEventListener("input", validateSkuInput);
name_input.addEventListener("input", validateNameInput);
price_input.addEventListener("input", validatePriceInput);

button.addEventListener("click", function() {
    form.addEventListener("submit", submitValidation());
});

function submitValidation() {
    partialValidation();
    validateEmtyInput();
}

function validateSkuInput() {
    errorMessage = [];
    const letterNumber = /^[0-9a-zA-Z]+$/;

    if(!letterNumber.test(String(sku_input.value))) {
        errorMessage.push("Please, provide the data of indicated type");
    }

    partialValidation();
}

function validateNameInput() {
    errorMessage = [];
    const letters = /^[A-Za-z ]+$/;

    if(!letters.test(String(name_input.value))) {
      errorMessage.push("Please, provide the data of indicated type");
    }

    partialValidation();
}

function validatePriceInput() {
    errorMessage = [];
    const numbers = /^[0-9\. ]+$/;

    if(!numbers.test(String(price_input.value))) {
      errorMessage.push("Please, provide the data of indicated type");
    }

    partialValidation();
}

function partialValidation() {
    displayError();
    formatSubmitButton();
}

function validateEmtyInput() {
    if(sku_input.value.length === 0 || name_input.value.length === 0 || price_input.value.length === 0 || select_input.value == "") {
        errorMessage.push("Please, submit required data");
    }
}

function generateError(error) {
    const p = document.createElement("p");
    errorContainer.appendChild(p);
    p.setAttribute("class", "error");
    p.innerHTML = `${error}`;
}

function deleteError() {
    errorContainer.innerHTML = "";
}

function displayError() {
    deleteError();

    if (errorMessage.length === 0) {
        errorContainer.style.display = "none";
    } else {
        errorContainer.style.display = "block";
    }

    errorMessage.forEach(error => {
        generateError(error);
    });
}

function formatSubmitButton() {
    if(errorMessage.length !== 0 || sku_input.value == "" || name_input.value == "" || price_input.value == "" || select_input.value == "" ) {
        button.disabled = true;
        button.style.cursor = "auto";
    } else {
        button.style.cursor = "pointer";
        button.disabled = false;
    }
}