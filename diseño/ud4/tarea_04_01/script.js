$(document).ready(function () {
  $(".multimedia-section").slideDown(1500);

  $("#book-image").hover(
    function () {
      $(this).css({
        transform: "scale(1.1)",
        transition: "transform 0.3s ease",
      });
    },
    function () {
      $(this).css("transform", "scale(1.0)");
    }
  );

  $("#promo-video").click(function () {
    $("#video-description").fadeToggle("slow");
  });

  $("#toggle-details-btn").click(function () {
    $("#extra-details").slideToggle();

    var text = $(this).text();
    $(this).text(
      text === "Ver más detalles" ? "Ocultar detalles" : "Ver más detalles"
    );
  });

  var video = $("#promo-video")[0];

  $("#play-pause-btn").click(function () {
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  });

  $("#reset-btn").click(function () {
    video.currentTime = 0;
    video.play();
  });

  $("#volume-slider").on("input", function () {
    var volumen = $(this).val();
    video.volume = volumen;
  });

  $(".promo-text").hover(function () {
    $(this).toggleClass("fade");
  });

  $("#purchase-form").submit(function (event) {
    event.preventDefault();

    var name = $("#name").val().validate();
    var book = $("#book-select").val();
    var email = $("#email").val();

    if (name === "" || book === "" || email === "") {
      alert("Por favor, completa todos los campos.");
      return;
    }

    $(this).toggleClass("hidden");

    var mensaje =
      "¡Gracias por tu compra, " +
      name +
      "!<br>" +
      "Has adquirido: <strong>" +
      book +
      "</strong>.<br>" +
      "Te enviaremos los detalles a: " +
      email;

    $("#confirmation-msg")
      .html(mensaje)
      .removeClass("hidden")
      .hide()
      .fadeIn("slow");
  });
});
