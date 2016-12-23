$( document ).ready(function() {
  // Fields will start disabled
  $("#demo_firstname").prop("disabled", true);
  $("#demo_lastname").prop("disabled", true);
  $("#patient_anon").prop("disabled", true);

  // ON-CLICK of new_patient checkbox
  $("#new_patient").click(function () {
    var chk = $("#new_patient").is(':checked');
    $("#demo_firstname").prop("disabled", !chk);
    $("#demo_lastname").prop("disabled", !chk);
    $("#patient_anon").prop("disabled", !chk);
    $("#patient_list").prop("disabled", chk);
  });

  $("#patient_anon").click(function () {
    var chk = $("#patient_anon").is(':checked');
    $("#demo_firstname").prop("disabled", chk);
    $("#demo_lastname").prop("disabled", chk);
  });
});
