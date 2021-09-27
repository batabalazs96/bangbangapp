$(document).ready(function () {
  $("#submitButton").click(function (event) {
    event.preventDefault();

    var serializedData = $("#registrationForm").serialize();
    $.ajax({
      url: "reg.php",
      type: "post",
      data: serializedData,
      success: function (res) {
        $("#result").html(res);
      },
    });
  });
});
