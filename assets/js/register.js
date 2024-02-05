$(document).ready(function () {
  $("form").submit(function (event) {
    let genre = $("input[type=radio][name=genre]:checked").val();
    let nom = $("#nom").val();
    let prenom = $("#prenom").val();
    let email = $("#email").val();
    let birthday = $("#birthday").val();
    let password = $("#password").val();
    let loisir = $("#loisir").val();

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
    //   array_hobbies: array_hobbies,
    // };
    // console.log(form_data);
    if (genre == undefined) {
      $("#genre").text("Veuillez remplir le champ");
    } else {
      $("#genre").remove();
    }
    if (!nom) {
      $("#name").text("Veuillez remplir le champ");
    } else if (nom.length < 3) {
      $("#name").text("Le champ est trop court");
    } else {
      $("#name").remove();
    }
    if (!prenom) {
      $("#prenomm").text("Veuillez remplir le champ");
    } else if (prenom.length < 3) {
      $("#prenomm").text("Le champ est trop court");
    } else {
      $("#prenomm").remove();
    }
    if (!email) {
      $("#emaill").text("Veuillez remplir le champ");
    } else {
      $("#emaill").remove();
    }

    let date_birthday = new Date(birthday);
    let today = new Date();
    let diff_year = today.getFullYear() - date_birthday.getFullYear();
    let diff_month = today.getMonth() - date_birthday.getMonth();
    let diff_day = today.getDay() - date_birthday.getDay();

    if (!birthday) {
      $("#birthdate").text("Veuillez remplir le champ");
    } else if (diff_year < 18) {
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else if (diff_year === 18 && diff_month < 0) {
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else if (diff_year === 18 && diff_month >= 0 && diff_day < 0) {
      $("#birthdate").text("Inscription interdit au moins de 18ans");
    } else {
      $("#birthdate").remove();
    }

    if (!password) {
      $("#mdp").text("Veuillez remplir le champ");
    } else if (password.length < 8 || password.length > 20) {
      $("#mdp").text(
        "Mot de passe doit etre compris entre 8 et 20 caractères."
      );
    } else {
      $("#mdp").remove();
    }
    event.preventDefault();
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
    //   ) {
    //   // console.log("Submitting form with data:", form_data);
    //   $.ajax({
    //     type: "POST",
    //     url: "../../model/get.php",
    //     data: form_data,
    //     contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    //     success: function (data) {
    //       console.log(data);
    //       // $(location).prop("href", "../../model/get.php");
    //     },
    //     // error: function () {
    //     // },
    //   });
    // }
  });
});
