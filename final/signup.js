const form= document.querySelector(".sign-up form"),
continuebtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit=(e)=>{
    e.preventDefault();
}

continuebtn.onclick= ()=>{

    //beginning of ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","signup.php",true);
    xhr.onload=()=>{
        if(xhr.readyState=== XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                if(data=="success"){
                    location.href = "index.php";

                }else{
                    errorText.textContent =data;
                    errorText.style.display= "block";
                }
            }

        }
        
    }

    //we have to send the form data through ajax to php

    let formData= new FormData(form); //creating a formData object
    xhr.send(formData); //sending the form data to php
}