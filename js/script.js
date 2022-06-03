const headerShadow = document.getElementById('HeaderShadow');
const subcatBoxes = document.querySelectorAll(".pageHeader__subcatBox");

subcatBoxes.forEach((box)=>{
    box.addEventListener("mouseenter",()=>{
        headerShadow.classList.add("showHeaderShadow");
    })
    box.addEventListener("mouseleave",()=>{
        headerShadow.classList.remove("showHeaderShadow");
    })
})
