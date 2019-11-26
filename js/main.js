function checkForm(){
    let formElement = document.querySelector("#checkform");
    let userName = formElement.username;
    let pass1 = formElement.pass1.value;
    let pass2 = formElement.pass2.value;
    // let re = new RegExp('ab+c');

    //console.log("pass1", pass1);
    //console.log("pass2", pass2);
    
    let ensPasswords = false;
    let passLength = false;
    // let userName = true;
    // let OK = re.exec(userName.value);

    //Check if Passwords are equal
    if(pass1 === pass2){
        ensPasswords = true
    }

    //Check if password length > 8
    // if(pass1.length > 8){
    //     passLength = true;
    // }

    if (ensPasswords == true && passLength == true){
        return true;
    }
    // if (!OK){
    //     window.alert(userName.value + "is not valid, use only letters!");
    // }
    else{
        return false;
    }
}




