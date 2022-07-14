$(document).ready(function() {

  $('.modalUbahUser').on('click', function() {

    var id = $(this).data('id');
    console.log("runs", id)

    $.ajax({
      url: 'http://localhost/mvc/public/user/getdetail',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $("#validationFullnameEdit").val(data.fullname);
        $("#validationEmailEdit").val(data.email);
        $("#validationJobPositionEdit").val(data.job_position_id);
        $("#validationRoleEdit").val(data.role);

        $("#id").val(data.id);
      }
    });
  })
})