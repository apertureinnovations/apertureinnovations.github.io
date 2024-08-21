  $(".navHamBurger").click(function() {
    $(".navNavItem").toggleClass("navItemHamDown");
    $(".navNavGroup").toggleClass("checkDisplay");
    $(".navHamBurger").toggleClass("navHamBurgerDown");
  });

var imageIndex = 1;
showCurrentImage(imageIndex);

function changeCurrentImage(value) {
  showCurrentImage(imageIndex += value);
}

function showCurrentImage(value) {
  var count;
  var carouselItems = $(".carouselItem");
  if (value > carouselItems.length) {imageIndex = 1}
  if (value < 1) (imageIndex = carouselItems.length)
  for (count = 0; count < carouselItems.length; count++) {
    carouselItems[count].style.display = "none";
  }

  // imageIndex++;
  // if (imageIndex > carouselItems.length) {imageIndex = 1}
  carouselItems[imageIndex-1].style.display = "block";
  // setTimeout(showCurrentImage, 10000);

}

function backToTop() {
  $('html').animate({ scrollTop: 0 }, 'fast');
  document.documentElement.scrollTop = 0;
}

function showSources() {
  $("#sources").toggleClass("sources");
  window.scrollTo(0,document.body.scrollHeight);
}

var currentModalState = false;

function modalOpenClose(number) {
  var modalgroup = "#modal" + number;
  if (currentModalState === false) {
    currentModalState = true;
    $(modalgroup).toggleClass("display-i-block");
  } else {
    currentModalState = false;
    $(modalgroup).toggleClass("display-i-block");
  }

}

function copyText(text) {
  navigator.clipboard.writeText(text);
}

function scrollToElement(id) {
  $('html, body').animate({
    scrollTop: ($(id).offset().top - 50)}, 'slow');
}