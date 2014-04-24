$(document).ready(function() {
  $("#pass_match_warning").hide();
  $("#submit-signup").on("click", function() {
    pass = $("#password").val();
    pass_con = $("#password_confirmation").val();
    if (pass !== pass_con) {
      $("#pass_match_warning").show();
      $("#pass_match_warning").text("Password not matched!");
      return false;
    }
  });
});
