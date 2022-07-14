$(document).ready(function() {
  $('.select2').on('change', function(e) {
    location.replace("/mvc/public/report/evaluasibyperiode/"+e.target.value);
  })
})