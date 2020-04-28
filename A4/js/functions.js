
function callThisFunction() {
    alert("Hi!");
}

function processJsonData() {
    let jsondata = document.getElementById('jsondiv');

    let jsonobject = JSON.parse(jsondata.innerHTML);

    console.log(jsonobject[0].l_item);

    let ul = document.createElement("ul");

    for (let i = 0; i<jsonobject.length; i++) {
        let li = document.createElement("li");
        li.innerHTML = jsonobject[i].l_item;
        ul.appendChild(li);
    }

    console.log(ul);
    document.body.appendChild(ul);

}

// solution of remove disabled is referd to dsgriffin https://stackoverflow.com/questions/13626517/how-to-remove-disabled-attribute-using-jquery/13626565
function removeDisable() {
    $('#fname').removeAttr("disabled");
    $('#lname').removeAttr("disabled");
    $('#pswd').removeAttr("disabled");
    $('#phone').removeAttr("disabled");
    $('#email').removeAttr("disabled");
}

