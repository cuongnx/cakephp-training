$(document).ready(function() {
  var ws = new WebSocket("ws://192.168.33.11:8081");
  ws.onopen = function(e) {
    var msg = {
      data: "action=1&id=" + $("#threadid").val()
    };
    ws.send(JSON.stringify(msg));
  };

  ws.onmessage = function(e) {
    var data = JSON.parse(e.data);
    $.ajax({
      url: "/posts/show/"+data.postid,
      cache: false,
      type: "POST",
      data: data,
      success: function(dat) {
        $("#post-list").append(dat);
      },
      error: function(e) {
        alert(e);
      }
    });
  };

  ws.onclose = function(e) {
  }

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

          var postid = $("#post-list").children().last().attr('id').substring(5);
          var msg = {
            data: data,
            view: dat,
            postid: postid
          }
          ws.send(JSON.stringify(msg));
        },
        error: function(e) {
          alert(e);
        }
      });
    }
  });

});
