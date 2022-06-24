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












const swiperCategories = () => {
  var swiper = new Swiper(".sliderCategories", {
    loop: true,
    slidesPerView:2,
    spaceBetween:20,
    autoplay: {
      delay: 3000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 640px
      640: {
        width: 640,
        slidesPerView: 3,
      },
      // when window width is >= 768px
      768: {
        width: 768,
        slidesPerView: 3,
      },
    }
  });
  
};

const swiperPosts = () => {
  var swiper = new Swiper(".sliderPosts", {
    loop: true,
    slidesPerView:1,
    spaceBetween:20,
    // autoplay: {
    //   delay: 5000,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 640px
      640: {
        width: 640,
        slidesPerView: 3,
      },
      // when window width is >= 768px
      768: {
        width: 768,
        slidesPerView: 2,
      },
    }
  });
  
};

const swiperPopular = () => {
  var swiper = new Swiper(".sliderPopular", {
    loop: true,
    slidesPerView:1.5,
    spaceBetween:20,
    // autoplay: {
    //   delay: 5000,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 640px
      640: {
        width: 640,
        slidesPerView: 3,
      },
      // when window width is >= 768px
      768: {
        width: 768,
        slidesPerView: 2.5,
      },
    }
  });
  
};

const swiperProducents = () => {
  var swiper = new Swiper(".sliderProducents", {
    loop: false,
    slidesPerView:1.5,
    spaceBetween:20,
    // autoplay: {
    //   delay: 5000,
    // },
    // navigation: {
    //   nextEl: ".swiper-button-next",
    //   prevEl: ".swiper-button-prev",
    // },
    breakpoints: {
      // when window width is >= 640px
      640: {
        width: 640,
        slidesPerView: 3,
      },
      // when window width is >= 768px
      768: {
        width: 768,
        slidesPerView: 2.5,
      },
    }
  });
  
};



window.addEventListener('load', ()=>{
  swiperHome();
  swiperCategories();
  swiperPosts();
  swiperPopular();
  swiperProducents();
})