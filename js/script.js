const headerShadow = document.getElementById("HeaderShadow");
const subcatBoxes = document.querySelectorAll(".pageHeader__subcatBox");

console.log(subcatBoxes);

subcatBoxes.forEach((box) => {
  box.addEventListener(
    "mouseenter",
    () =>
      window.innerWidth > 992 && headerShadow.classList.add("showHeaderShadow")
  );
  box.addEventListener(
    "mouseleave",
    () =>
      window.innerWidth > 992 &&
      headerShadow.classList.remove("showHeaderShadow")
  );

  box.addEventListener("click", () => {
    if (window.innerWidth < 992) {
      box.children[1].classList.toggle("showSubmenuOnMobile");
      box.classList.toggle("setWhiteBox");
    }
  });
});

const closeMenuBtn = document.getElementById("CloseMenuBtn");
const offcanvasMenu = document.getElementById("OffcanvasMenu");
const openMenuBtn = document.getElementById("OpenMenuBtn");
const offcanvasMenuShadow = document.getElementById("MenuShadow");

console.log(offcanvasMenuShadow);

const handleOffcanvasToggle = () => {
  offcanvasMenu.classList.toggle("showOffcanvasMenu");
  offcanvasMenuShadow.classList.toggle("showOffcanvasMenuShadow");
};

openMenuBtn.addEventListener("click", handleOffcanvasToggle);
closeMenuBtn.addEventListener("click", handleOffcanvasToggle);
offcanvasMenuShadow.addEventListener("click", handleOffcanvasToggle);

// Slider Home
const sliders_name = document.querySelectorAll('.homeSlider .swiper-slide');
const swiperHome = () => {
  var swiper = new Swiper(".slider-home", {
    loop: false,
    slidesPerView:1,
    spaceBetween:50,
    autoplay: {
      delay: 7000,
    },
    pagination: {
      el: ".swiper-pagination_first",
      clickable: true,
      type: "bullets",
      renderBullet: function (index, className) {
        console.log(sliders_name[index]);
        return'<span class="' + className + '"><p class="position-absolute">' +  sliders_name[index].dataset.nameslide + '</p></span>';;
      },
    },
  });
};


window.addEventListener('load', ()=>{
  swiperHome();
})

