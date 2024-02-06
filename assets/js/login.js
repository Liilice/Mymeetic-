window.onload = function () {
  $(document).ready(function () {
    $("#submit").on("click", function (event) {
      let email = $("#email").val();
      let password = $("#password").val();
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
    });
  });
};
