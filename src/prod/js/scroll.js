$(document).ready(function () {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
      $("#NUMBER").addClass("stick");
    }
    if ($(window).scrollTop() < 11) {
      $("#NUMBER").removeClass("stick");
    }
  });
});
