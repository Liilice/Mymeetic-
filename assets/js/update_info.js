$(document).ready(function () {
  $("#submit").on("click", function (event) {
    let email = $("#email").val();
    if (!email) {
      event.preventDefault();
      $("#emaill").text("Veuillez remplir le champ");
    } else if (!email.includes("@") || !email.includes(".")) {
      event.preventDefault();
      $("#emaill").text("Manque @ ou .");
    } else {
      $("#emaill").remove();
    }

    let password = $("#password").val();
    if (!password) {
      event.preventDefault();
      $("#mdp").text("Veuillez remplir le champ");
    } else if (password.length < 8 || password.length > 20) {
      event.preventDefault();
      $("#mdp").text(
        "Mot de passe doit etre compris entre 8 et 20 caractères."
      );
    } else {
      $("#mdp").remove();
    }

    let code_postal = $("#code_postal").val();
    if (!code_postal) {
      event.preventDefault();
      $("#postal").text("Veuillez remplir le champ");
    } else {
      $("#postal").remove();
    }

    let loisir = $("#loisir").val();
    if (!loisir) {
      event.preventDefault();
      $("#loisirr").text("Veuillez remplir le champ");
    } else if (loisir.includes(",") || loisir.includes(" ")) {
      event.preventDefault();
      $("#loisirr").text("Veuillez remplir qu'un seul loisir a la fois.");
    } else {
      $("#loisirr").remove();
    }
  });
});
