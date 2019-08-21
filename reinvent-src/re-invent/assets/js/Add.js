"use strict";

let saveButton = document.querySelector("#save-button");

saveButton.addEventListener("click", event => {
    let title = document.querySelector("#sn-title").value;
    
    if (title.length > 0) {
        return true;
    }
    else {
        event.preventDefault();
    }
});