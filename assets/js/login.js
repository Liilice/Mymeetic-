$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();
    let email = $("#email").val();
    let password = $("#password").val();
  });
});
