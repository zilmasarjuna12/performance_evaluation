$(document).ready(function() {
  $('#buttonUpload').on('click', function(e) {
    console.log("run")
    $("#file").click();
  })

  $("#file").on('change', function(e) {
    $("#formUpload").submit();
  });
})