$(document).ready(function() {
  $('.select2').on('change', function(e) {
    location.replace("/mvc/public/report/evaluasibyperiode/"+e.target.value);
  })

  $('.modalDetailEvaluasi').on('click', function() {
    var id = $(this).data('id');
    $.ajax({
      url: 'http://localhost/mvc/public/penilaian/getdetailhasil',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        console.log("data", data)
        $(".analisis").html(data.classification_formula);

        var text = ""
        switch (data.classification) {
          case "Sangat Baik":
            text = "Penilaian sangat baik, perlu dipertahankan."
            break;
          case "Baik":
            text = "Penilaian baik, perlu dipertahankan dan ditingkatkan."
            break;
          case "Cukup":
            text = "Penilaian cukup, perlu ditingkatkan lagi."
            break;
          case "Buruk":
            text = "Penilaian buruk, perlu ditingkatkan dan perbaiki kesalahan."
            break;
          case "Sangat Buruk":
            text = "Penilaian sangat buruk, perlu ditingkatkan dan perbaiki kesalahan."
            break;
        } 

        $(".review").text(text)
      }
    });
  })

  function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
      console.log(reader.result);
    };
    reader.onerror = function (error) {
      console.log('Error: ', error);
    };
  }

  $('.modalDetailKenaikanGaji').on('click', function() {
    var id = $(this).data('id');
    $.ajax({
      url: 'http://localhost/mvc/public/penilaian/getdetailhasil',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        console.log("data", data)
        $(".analisis").html(data.naik_gaji_formula);
        $(".w1").html(data.w1);
        $(".w2").html(data.w2);
        $(".w3").html(data.w3);
        $(".w4").html(data.w4);
        $(".bias").html(data.bias);

        var text = ""

        if (data.naik_gaji == "Yes") {
          text = "Karena lebih dari 0 maka hasilnya direkomendasikan naik gaji."
        } else {
          text = "Karena kurang dari 0 maka hasilnya direkomendasikan tidak naik gaji."
        }

        $(".review").text(text)
      }
    });
  })
})