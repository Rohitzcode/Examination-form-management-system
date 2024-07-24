function checkPassword(){
    let password=document.getElementById("password").value;
    let cpassword=document.getElementById("confirmpassword").value;
    console.log(password,cpassword);

    if(password!=0){
        if(password!=cpassword){
            alert("Passwords do not match");
        }
    }
    else{
        alert("Password cannot be empty");
    }
}

const log=document.querySelector('.login');
function redirect(){
    const new_window=window.open();
    new_window.location.href = "login.html";
}
log.addEventListener('click',redirect);
