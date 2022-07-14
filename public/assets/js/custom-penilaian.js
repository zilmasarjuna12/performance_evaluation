$(document).ready(function() {
  $('.modalUbahPenilaian').on('click', function() {
    var id = $(this).data('id');
    $.ajax({
      url: 'http://localhost/mvc/public/penilaian/getdetail',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        var $radiosDeliveryTime = $('input:radio[name=delivery_time]');
        var $radiosExecution = $('input:radio[name=execution]');
        var $radiosTeamWork = $('input:radio[name=team_work]');
        var $radiosInnovation = $('input:radio[name=innovation]');

        $radiosDeliveryTime.filter('[value='+data.delivery_time+']').prop('checked', true);
        $radiosExecution.filter('[value='+data.execution+']').prop('checked', true);
        $radiosTeamWork.filter('[value='+data.team_work+']').prop('checked', true);
        $radiosInnovation.filter('[value='+data.innovation+']').prop('checked', true);

        $("#delivery_comment").val(data.delivery_time_comment);
        $("#execution_comment").val(data.execution_comment);
        $("#team_work_comment").val(data.team_work_comment);
        $("#innovation_comment").val(data.innovation_comment);
        $(".fullname").text(data.created_by.fullname);
        $(".email").text(data.created_by.email);
        $(".job").text(data.created_by.job_name);

        $("#id").val(data.id);
        $('#periode_id').val(data.periode_id);
      }
    });
  })

  $('.modalStartPenilaian').on('click', function() {
    var id = $(this).data('periodeid');

    $("#periode_id").val(id);
  })

  $('.modalEditPenilaian').on('click', function() {
    var id = $(this).data('id');
    $.ajax({
      url: 'http://localhost/mvc/public/penilaian/getdetail',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        var $radiosDeliveryTime = $('input:radio[name=delivery_time]');
        var $radiosExecution = $('input:radio[name=execution]');
        var $radiosTeamWork = $('input:radio[name=team_work]');
        var $radiosInnovation = $('input:radio[name=innovation]');

        $radiosDeliveryTime.filter('[value='+data.delivery_time+']').prop('checked', true);
        $radiosExecution.filter('[value='+data.execution+']').prop('checked', true);
        $radiosTeamWork.filter('[value='+data.team_work+']').prop('checked', true);
        $radiosInnovation.filter('[value='+data.innovation+']').prop('checked', true);

        $("#edit_delivery_comment").val(data.delivery_time_comment);
        $("#edit_execution_comment").val(data.execution_comment);
        $("#edit_team_work_comment").val(data.team_work_comment);
        $("#edit_innovation_comment").val(data.innovation_comment);
  

        $("#id_edit").val(data.id);
        $('#periode_id').val(data.periode_id);
      }
    });
  })

  $('.modalShowPenilaian').on('click', function() {
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
        $(".delivery_time").text(data.delivery_time);
        $(".execution").text(data.execution);
        $(".team_work").text(data.team_work);
        $(".innovation").text(data.innovation);
        $(".periode_name").text(data.periode_name);

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
})