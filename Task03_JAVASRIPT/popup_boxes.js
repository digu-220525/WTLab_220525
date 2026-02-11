//alert box
function showAlert() {
    alert("Welcome to LearnSmart");
}

showAlert();

//confirm box
function confirmAction() {
    let result = confirm("Do you want to continue?");

    if (result) {
        alert("You clicked OK");
    } else {
        alert("You clicked Cancel");
    }
}

confirmAction();

//prompt box
function askName() {
    let name = prompt("Enter your name");

    if (name !== null && name !== "") {
        alert("Hello " + name);
    } else {
        alert("No name entered");
    }
}

askName();
