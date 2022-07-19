const pswdField= document.querySelector(".form input[type='password']"),
togglebtn = document.querySelector(".form .field i");
togglebtn.onclick = ()=>{
    if(pswdField.type=="password"){
        pswdField.type= "text";
        togglebtn.classList.add("active");
    }else{
        pswdField.type= "password";
        togglebtn.classList.remove("active");
    }
}