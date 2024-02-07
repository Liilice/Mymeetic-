$(document).ready(function () {
  $("#submit").on("click", function (event) {
    let genre = $("input[type=radio][name=genre]:checked").val();
    let nom = $("#nom").val();
    let prenom = $("#prenom").val();
    let email = $("#email").val();
    let birthday = $("#birthday").val();
    let password = $("#password").val();
    let loisir = $("#loisir").val();
    let code_postal = $("#code_postal").val();

    // let array_hobbies = [];
    // $("input[type=checkbox][name=loisir]:checked").each(function () {
    //   array_hobbies.push($(this).val());
    // });
    // const form_data = {
    //   genre: genre,
    //   prenom: prenom,
    //   nom: nom,
    //   email: email,
    //   birthday: birthday,
    //   password: password,
    //   loisir: loisir,
    // };
    // console.log(form_data);
    if (genre == undefined) {
      event.preventDefault();
      $("#genre").text("Veuillez remplir le champ");
    } else {
      $("#genre").remove();
    }
    if (!nom) {
      event.preventDefault();
      $("#name").text("Veuillez remplir le champ");
    } else if (nom.length < 3) {
      event.preventDefault();
      $("#name").text("Le champ est trop court");
    } else {
      $("#name").remove();
    }
    if (!prenom) {
      event.preventDefault();
      $("#prenomm").text("Veuillez remplir le champ");
    } else if (prenom.length < 3) {
      event.preventDefault();
      $("#prenomm").text("Le champ est trop court");
    } else {
      $("#prenomm").remove();
    }
    if (!email) {
      event.preventDefault();
      $("#emaill").text("Veuillez remplir le champ");
    } else if (!email.includes("@") || !email.includes(".")) {
      event.preventDefault();
      $("#emaill").text("Manque @ ou .");
    } else {
      $("#emaill").remove();
    }

    let date_birthday = new Date(birthday);
    let today = new Date();
    let diff_year = today.getFullYear() - date_birthday.getFullYear();
    let diff_month = today.getMonth() - date_birthday.getMonth();
    let diff_day = today.getDay() - date_birthday.getDay();

    if (!birthday) {
      event.preventDefault();
      $("#birthdate").text("Veuillez remplir le champ");
    } else if (diff_year < 18) {
      event.preventDefault();
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else if (diff_year === 18 && diff_month < 0) {
      event.preventDefault();
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else if (diff_year === 18 && diff_month >= 0 && diff_day < 0) {
      event.preventDefault();
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else {
      $("#birthdate").remove();
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
      $("#postal").text("Veuillez remplir le champ");
    } else if (code_postal.length !== 5) {
      event.preventDefault();
      $("#postal").text("Veuillez entrer un code postal à 5 numéro.");
    } else {
      $("#postal").remove();
    }
    // if (array_hobbies.length === 0) {
    //   $("#loisirs").text("Veuillez cocher au moins une case");
    // } else {
    //   $("#loisirs").remove();
    // }
    // if (
    //   genre != undefined &&
    //   nom != "" &&
    //   prenom != "" &&
    //   email != "" &&
    //   birthday != "" &&
    //   password != "" &&
    //   loisir != ""
    // ) {
    //   $.ajax({
    //     type: "POST",
    //     url: "http://localhost:8000/model/get.php",
    //     data: { action: "login", argument: form_data },
    //     dataType: "json",
    //     success: function (data) {
    //       console.log(data);
    //       // $(location).prop("href", "../../model/get.php");
    //     },
    //     error: function () {},
    //   });
    // }
  });
});
