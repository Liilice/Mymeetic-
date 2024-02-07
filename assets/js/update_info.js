$(document).ready(function () {
  $("#submit").on("click", function (event) {
    let email = $("#email").val();
    let password = $("#password").val();
    let loisir = $("#loisir").val();
    let code_postal = $("#ville").val();
    if (!email) {
      event.preventDefault();
      $("#emaill").text("Veuillez remplir le champ");
    } else if (!email.includes("@") || !email.includes(".")) {
      event.preventDefault();
      $("#emaill").text("Manque @ ou .");
    } else {
      $("#emaill").remove();
    }
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
    if (!code_postal) {
      event.preventDefault();
      $("#villee").text("Veuillez remplir le champ");
    } else if (code_postal.length !== 5) {
      event.preventDefault();
      $("#villee").text("Veuillez entrer un code postal à 5 numéro.");
    } else if (isInteger(code_postal) === false) {
      event.preventDefault();
      $("#villee").text(
        "Veuillez entrer un code postal à 5 numéro en chiffre."
      );
    } else {
      $("#villee").remove();
    }
    if (!loisir) {
      event.preventDefault();
      $("#loisirr").text("Veuillez remplir le champ");
    } else {
      $("#loisirr").remove();
    }
  });
});
