$(document).ready(function() {
  $("#submit-post").on("click", function(e) {
    data = $("#post-message").serialize();
    $.ajax({
      url: "/posts/create",
      cache: false,
      type: "POST",
      data: data,
      success: function(dat) {
        alert(dat);
        $("#post-list").html = val(dat);
      },
      error: function(e) {
        alert(e);
      }
    });
  });
});
