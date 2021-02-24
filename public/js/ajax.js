const selectedProductType = document.getElementById("type");
const deleteBtn = document.getElementById("delete-button");
const checkbox = document.querySelectorAll("input[type=checkbox]");
let checkboxArr = Array.from(checkbox);
let checkedArray = [];

if(checkbox !== null) {
     for (let i = 0; i < checkbox.length; i++) {
         checkbox[i].addEventListener('change', getCheckedProducts);
     }
}

if(deleteBtn !== null) {
    deleteBtn.addEventListener('click', deleteProducts);
}

if (selectedProductType !== null) {
    selectedProductType.addEventListener("change", displayProductField);
}

function displayProductField() {
    const data = {
        "selectedType" : selectedProductType.value,
    };

     $.ajax({
        type     : "POST",
        url      : location.origin + "/products/generateProductField",
        data     : data,
        dataType : "json",
        encode   : true,
    })

    .done(function(response) {
        $('#id-dynamic-content').empty();
        $('#id-dynamic-content').append(response);
    })
}

function getCheckedProducts() {
    checkedArray = $.map(checkboxArr, function(product){
        if(product.checked) {
            return product.id
        };
    });
}

function deleteProducts() {
    const data = {
        "checkedArray" : checkedArray,
    };

     $.ajax({
        type     : "POST",
        url      : location.origin + "/products/delete",
        data     : data,
        dataType : "json",
        encode   : true,
    })

    .done(function() {
        location.reload();
    })
}