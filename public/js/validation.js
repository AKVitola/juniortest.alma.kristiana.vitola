const form = document.getElementById("form");
const button = document.getElementById("submit-btn");
const errorContainer = document.getElementById("js-error-container");
let errorMessage = [];
const allInputs = [
    {
        id: "sku",
        value_type: "alphaNumeric"
    },
    {
        id: "name",
        value_type: "alphaNumeric"
    },
    {
        id: "price",
        value_type: "numeric"
    },
    {
        id: "type",
        value_type: "option"
    },
    {
        id: "size",
        value_type: "numeric"
    },
    {
        id: "weight",
        value_type: "numeric"
    },
    {
        id: "height",
        value_type: "numeric"
    },
    {
        id: "width",
        value_type: "numeric"
    },
    {
        id: "length",
        value_type: "numeric"
    },
];

form.addEventListener("input", function () {
    errorMessage = [];

    for (let i = 0; i < allInputs.length; i++) {
        if (errorMessage.length !== 0) {
            break;
        };

        let input = allInputs[i];
        let inputField = document.getElementById(input.id);

        if (inputField !== null && inputField.value.length !== 0) {
            switch (input.value_type) {
                case "alphaNumeric":
                    isAlphaNumeric(inputField.value);
                    break;

                case "numeric":
                    isNumeric(inputField.value);
                    break;

                default:
            };
        };
    }
});

button.addEventListener("click", function () {
    form.addEventListener("submit", submitValidation());
});

function submitValidation() {
    validateEmtyInput();
    displayError();
    formatSubmitButton();
}

function isAlphaNumeric(inputValue) {
    const letterNumber = /^[0-9a-zA-Z ]+$/;
    inputValueValidation(letterNumber, inputValue);
}

function isNumeric(inputValue) {
    const numbers = /^[0-9\.]+$/;
    inputValueValidation(numbers, inputValue);
}

function inputValueValidation(regex, inputValue) {
    if (!regex.test(String(inputValue))) {
        errorMessage.push("Please, provide the data of indicated type");
    }

    displayError();
    formatSubmitButton();
}

function validateEmtyInput() {
    allInputs.forEach(input => {
        let inputField = document.getElementById(input.id);

        if (inputField !== null) {
            if (inputField.value.length === 0 && inputField.value == "") {
                errorMessage = [];
                errorMessage.push("Please, submit required data");
                disableSubmitBtn();
            } else {
                enableSubmitBtn();
            }
        }
    });
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
    if (errorMessage.length !== 0) {
        disableSubmitBtn();
    } else {
        enableSubmitBtn();
    }
}

function disableSubmitBtn() {
    button.disabled = true;
    button.style.cursor = "auto";
}

function enableSubmitBtn() {
    button.style.cursor = "pointer";
    button.disabled = false;
}