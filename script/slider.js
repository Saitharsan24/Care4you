// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function() {
    var slider = document.querySelector(".slider");
    var prevButton = document.querySelector(".prev-button");
    var nextButton = document.querySelector(".next-button");
    var slideIndex = 0;
    var slideInterval = setInterval(nextSlide, 2000);
  
    function nextSlide() {
      slideIndex++;
      showSlide();
    }
  
    function prevSlide() {
      slideIndex--;
      showSlide();
    }
  
    function showSlide() {
      var slides = document.querySelectorAll(".slider img");
      if (slideIndex >= slides.length) {
        slideIndex = 0;
      } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
      }
  
      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
  
      slides[slideIndex].style.display = "block";
    }
  
    prevButton.addEventListener("click", prevSlide);
    nextButton.addEventListener("click", nextSlide);
  });
  