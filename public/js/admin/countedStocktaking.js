function submitQuantity(drinkID) {
    //var quantityValue

    var inputName = "quantity-" + drinkID;
    var quantityValue = document.getElementById(inputName).value;

    if (!quantityValue) {
        alert("nema vrijednosti");
    } else {
        var link = 'http://127.0.0.1:8000/additional-add-quantity/' + drinkID + '/' + quantityValue;
        window.location.href = link;
    }
}


function submitWeight(drinkID) {
    var inputName = "weight-" + drinkID;
    var weightValue = document.getElementById(inputName).value;

    if (!weightValue) {
        alert("nema vrijednosti");
    } else {
        var link = 'http://127.0.0.1:8000/additional-add-weight/' + drinkID + '/' + weightValue;
        window.location.href = link;
    }

}
