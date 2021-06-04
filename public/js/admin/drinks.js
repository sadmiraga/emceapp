function enableWeight() {
    weightableCheckbox = document.getElementById("weightableCheckbox");
    packingWeight = document.getElementById("packingWeight");

    if (weightableCheckbox.checked == true) {
        weightableCheckboxContainer = document.getElementById("drink-packing-weight-div").style.display = "flex";
        packingWeight.required = true;
    } else {
        weightableCheckboxContainer = document.getElementById("drink-packing-weight-div").style.display ="none";
        packingWeight.required = false;
    }
}
