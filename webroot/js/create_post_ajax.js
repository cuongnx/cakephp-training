$(document).ready(function() {
  $("#submit-post").on("click", function(e) {
    if ($("#body").val() != "") {
      data = $("#post-message").serialize();
      $.ajax({
        url: "/posts/create",
        cache: false,
        type: "POST",
        data: data,
        success: function(dat) {
          $("#post-list").append(dat);
          $("#body").val("");
        },
        error: function(e) {
          alert(e);
        }
      });
    }
  });
});
