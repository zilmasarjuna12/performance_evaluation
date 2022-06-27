$(document).ready(function() {

  $('.modalUbahUser').on('click', function() {
    console.log("run")

    var id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/mvc/public/user/getdetail',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $("#validationEmail").val(data.email);
        $("#validationRole").val(data.role);;
        $("#id").val(data.id);
      }
    });
  })
})