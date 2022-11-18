// Aqui o script irá fazer a transição da página de login para a página de cadastro
$(document).ready(function () {
  $("#goRight").on("click", function () {
    $("#slideBox").animate({
      marginLeft: "0",
    });
    $(".topLayer").animate({
      marginLeft: "100%",
    });
  });
  $("#goLeft").on("click", function () {
    $("#slideBox").animate({
      marginLeft: "50%",
    });
    $(".topLayer").animate({
      marginLeft: "0",
    });
  });
});

// Função para verificar as senhas
function check_senha() {
  var senha = document.getElementById("n_senha").value;
  var rep_senha = document.getElementById("n_rep_senha").value;

  // If password not entered
  if (senha == "") {
    document.getElementById("confirm_button").disabled = true;
  } else {
    if (rep_senha == "") {
      document.getElementById("confirm_button").disabled = true;
    } else {
      if (senha != rep_senha) {
        document.getElementById("confirm_button").disabled = true;
      } else {
        document.getElementById("confirm_button").disabled = false;
      }
    }
  }
}
