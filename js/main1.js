let header = document.querySelector('header');
window.addEventListener('scroll',() => {
    header.classList.toggle('shadow', window.scrollY > 0);
});

var swiper1 = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop:true,
    grabCursor:true,
  });
  
  
  var swiper2 = new Swiper(".coming-container", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 5500,
      disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      568: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      968: {
        slidesPerView: 5,
      },
    },
  });

  window.addEventListener("load", function() {
    const movieBoxes = document.querySelectorAll(".movie-box");
  
    movieBoxes.forEach(function(movieBox) {
      const boxText = movieBox.querySelector(".box-text");
      boxText.style.visibility = "hidden"; // Thay đổi từ 'display' sang 'visibility'
  
      movieBox.addEventListener("mouseover", function() {
        boxText.style.visibility = "visible";
      });
  
      movieBox.addEventListener("mouseout", function() {
        boxText.style.visibility = "hidden";
      });
    });
  });
  
  const menuIcon = document.querySelector('#menu-icon');
  const navbar = document.querySelector('.navbar');
  
  menuIcon.addEventListener('click', () => {
    navbar.classList.toggle('active');
  });
  

  