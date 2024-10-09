// main page script.js
console.log('JavaScript file loaded');

// scroll to Top

// Get the button
const scrollToTopBtn = document.getElementById('scrollToTopBtn');

// Show or hide the button based on scroll position
window.addEventListener('scroll', () => {
    if (window.scrollY > 200) { // Show button after scrolling 200px
        scrollToTopBtn.classList.add('show');
    } else {
        scrollToTopBtn.classList.remove('show');
    }
});

// Scroll to the top when button is clicked
scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Smooth scrolling
    });
});



// maps.js Start
function initMap() {
  const input = document.getElementById('location-input');
  const autocomplete = new google.maps.places.Autocomplete(input);

  const map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });

  autocomplete.addListener('place_changed', () => {
    const place = autocomplete.getPlace();
    if (place.geometry) {
      map.setCenter(place.geometry.location);
      map.setZoom(15);
    }
  });
}

window.onload = initMap;
// maps.js End



var swiper = new Swiper(".swiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  coverflowEffect: {
    rotate: 10,
    stretch: 20,
    depth: 150,
    modifier: 2,
    slideShadows: true,
  },
  keyboard: {
    enabled: true,
  },
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

swiper.slideTo(1, false, false);



document.addEventListener('DOMContentLoaded', () => {
  const faqItems = document.querySelectorAll('.faq-item');
  
  faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      const answer = item.querySelector('.faq-answer');
      const toggleButton = question.querySelector('.toggle-button');
      
      question.addEventListener('click', () => {
          const isActive = item.classList.contains('active');
          
          // Close all other items
          faqItems.forEach(i => i.classList.remove('active'));
          
          // Toggle current item
          if (!isActive) {
              item.classList.add('active');
              answer.style.maxHeight = answer.scrollHeight + 'px'; // Animate height
              toggleButton.textContent = '-'; // Change button to minus
          } else {
              item.classList.remove('active');
              answer.style.maxHeight = '0'; // Collapse height
              toggleButton.textContent = '+'; // Change button to plus
          }
      });
  });
});
