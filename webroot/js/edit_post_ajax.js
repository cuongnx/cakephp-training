$(document).ready(function() {
  $("#overlay").on("click", function(e) {
    dissmissDialog();
  });
  $(".edit-post").click(editPostClick);
});

function dissmissDialog() {
  $("#overlay").hide();
  $("#edit-post-dialog").hide();
}

function editPostClick() {
  var id = $(this).data("postid");
  var msg = $("#post-body-" + id).text().trim();
  $("#overlay").show();
  $("#edit-post-dialog").show();
  $("#edit-body").val(msg);
  
  $("#submit-edit-post").on("click", click);
  $("#delete-post").on("click", deleteP);
  function click() {
    var data = {
      "Post": {
        "body": $("#edit-body").val()
      }
    };

    $.ajax({
      url: "/posts/edit/" + id,
      cache: false,
      type: "POST",
      data: data,
      success: function(dat) {
        var p = JSON.parse(dat);
        if (p[0] == 1) {
          $("#post-body-" + id).text(p[1].Post.body);
          $("#post-modified-" + id).text(p[1].Post.modified);
          showMessage("success-message", "Edited");
          dissmissDialog();
        } else {
          showMessage("warning-message", "Failed to edit, please try again");
        }
      },
    });

    $("#submit-edit-post").off("click");
  };

  function deleteP() {
    $.ajax({
      url: "/posts/delete/" + id,
      cache: false,
      type: "POST",
      success: function(dat) {
        var p = JSON.parse(dat);
        if (p[0] == 1) {
          $("#post-" + id).remove();
          showMessage("success-message", "Deleted");
          dissmissDialog();
        } else {
          showMessage("warning-message", "Failed to edit, please try again");
        }
      }
    });

    $("#delete-post").off("click");
  }

  return false;
}

function showMessage(type, message) {
  var el = $("#" + type);
  el.text(message);
  el.show("medium");
  setTimeout(function() {
    el.hide("slow", function() {
      el.text("");
    });
  }, 2000);
}
