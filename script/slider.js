// getting DOM elements for carousel
const wrap = document.getElementsByClassName("wrapper")[0],
      carousel = document.getElementsByClassName("carousel")[0],
      images = document.getElementsByClassName("slide-img"),
      buttons = document.getElementsByClassName("button");
      
let imageIndex = 1, 
    intervalId;

//define function to start automatic image slider
const autoSlide = () => {
     //start the slidesshow by calling slideImage() every 2 second
     intervalId = setInterval(() => slideImage(imageIndex++), 2000);
};

//calling autoSlide function
autoSlide();

//A function that updates the carousel display to show the specific image 
const slideImage = (index) => {
    // Update the carousel display to show the specific image 
    carousel.style.transform = `translate(-${index * 100}%)`;
};
