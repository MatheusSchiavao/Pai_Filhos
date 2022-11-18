//Seta de back to top para retornar ao topo da página, como o próprio nome diz
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
