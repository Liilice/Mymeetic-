$(document).ready(function () {
  $("#search_form").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url: "../model/match.php?" + $(this).serialize(),
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.length > 0) {
          let carouselContainer = $(".carousel-container");
          data.forEach(function (item) {
            const ul = $("<ul>");
            const li = $("<li>").html(
              "<img src='../assets/image/avatar_default.webp' alt='avatar' >"
            );
            const li1 = $("<li>").text(item.genre);
            const li2 = $("<li>").text(item.nom + " " + item.prenom);
            const li3 = $("<li>").text(item.date_naissance);
            const li4 = $("<li>").text(item.email);
            const li5 = $("<li>").text(item.name);
            const li6 = $("<li>").text(item.code_postal);
            ul.append(li, li1, li2, li3, li4, li5, li6);
            carouselContainer.append(ul);
          });
          $(".carousel-container ul:first-child").addClass("active");
        }
      },
    });

    $(".next").on("click", function () {
      const current_match = $(".carousel-container ul.active");
      const next_match = current_match.next();

      if (next_match.length) {
        current_match.removeClass("active");
        next_match.addClass("active");
      }
    });

    $(".prev").on("click", function () {
      const current_match = $(".carousel-container ul.active");
      const prev_match = current_match.prev();

      if (prev_match.length) {
        current_match.removeClass("active");
        prev_match.addClass("active");
      }
    });
  });
});
