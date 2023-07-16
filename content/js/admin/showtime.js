
$(document).on("change", ".id_film , .add-rowShow", function() {
      $('.checkFiml').html('Bạn phải chọn phim')
      $.ajax({
          url: "./ajax.php?first",
          data: {
              nameFilm: $('.id_film').val()
          },
          success: function(result) {
              $(".div1").html(result);
          },
      });

});
