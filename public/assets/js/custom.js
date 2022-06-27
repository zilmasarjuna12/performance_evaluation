$(document).ready(function() {
  $('.modalUbahEmployee').on('click', function() {
    $('.modal-title').html('Edit Karyawan');

    $('.modal-footer button[type=submit]').html('Ubah Data');

    var id = $(this).data('id');

    $('.form-employee').attr('action', 'http://localhost/mvc/public/employee/edit');

    $.ajax({
      url: 'http://localhost/mvc/public/employee/getdetail',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        var birthdayDate = new Date(data.birthday);
        var joinDate = new Date(data.join_date);

        var birthday = birthdayDate.getMonth()+1+"/"+birthdayDate.getDate()+"/"+birthdayDate.getFullYear();
        var join = joinDate.getMonth()+1+"/"+joinDate.getDate()+"/"+joinDate.getFullYear();


        $("#validationEmail").val(data.email);
        $("#validationRole").val(data.role);
        $("#validationFullname").val(data.fullname);
        $("#validationDate").val(birthday);
        $("#validationGender").val(data.gender);
        $("#validationPhone").val(data.phone);
        $("#validationBloodType").val(data.blood_type);
        $("#validationMartialStatus").val(data.marial_status);
        $("#validationAgama").val(data.religion);
        $("#validationAddress").val(data.address);
        $("#validationNoID").val(data.employee_id);
        $("#validationJoinDate").val(join);
        $("#validationJobLevel").val(data.job_level);
        $("#validationJobPosition").val(data.job_position_id);
        $("#id").val(data.id);
      }
    });
  })

  
})