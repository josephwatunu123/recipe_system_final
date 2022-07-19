const menubtn = document.querySelector(".menu i");
const searchbtn = document.querySelector(".search-icon");
const cancelbtn = document.querySelector(".cancel");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");

menubtn.onclick= ()=>{
    items.classList.add("active"); 
    menubtn.classList.add("hide");
    searchbtn.classList.add("hide");
    cancelbtn.classList.add("show");
}

cancelbtn.onclick= ()=>{
    items.classList.remove("active"); 
    menubtn.classList.remove("hide");
    searchbtn.classList.remove("hide");
    cancelbtn.classList.remove("show");
    form.classList.remove("active");
}

searchbtn.onclick= ()=>{
    form.classList.add("active");
    searchbtn.classList.add("hide");
    cancelbtn.classList.add("show");
}