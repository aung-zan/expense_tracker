$(document).ready(function () {
  var selectedValue = null;
  var selectedText = "";
  var actionType = "";
  var options = { contentType: "application/json" };

  function ajaxCall() {
    if (actionType == "create") {
      options.url = createURL;
      options.type = "POST";
      options.data = JSON.stringify({ _token: token, name: $("#income-name").val() });

    } else if (actionType == "update") {
      options.url = updateURL.replace("###", selectedValue);
      options.type = "PUT";
      options.data = JSON.stringify({ _token: token, name: $("#income-name").val() });

    } else {
      options.url = deleteURL.replace("###", selectedValue);
      options.type = "DELETE";
      options.data = JSON.stringify({ _token: token });
    }

    $.ajax(options)
      .done(success)
      .fail(function (data) {
        var message = data.responseJSON.message;

        $("#income-name").addClass("is-invalid");
        $(".invalid-feedback").text(message);
        $(".invalid-feedback").removeAttr("hidden");
      });
  }

  function success(data) {
    location.reload();
    // if (actionType == "create") {
    //   $("#income-type-id").append($('<option>', {
    //     value: data.id,
    //     text: data.name,
    //   }));

    // } else if (actionType == "update") {
    //   $("#income-type-id option:selected").text(data.name);

    // } else {

    // }
  }

  function hideOrShowIncomeActions() {
    selectedValue = $("#income-type-id").val();
    selectedText = $("#income-type-id option:selected").text();

    if (selectedValue) {
      $("#add").attr("hidden", "hidden");
      $("#edit").removeAttr("hidden");
      $("#delete").removeAttr("hidden");
    } else {
      $("#add").removeAttr("hidden");
      $("#edit").attr("hidden", "hidden");
      $("#delete").attr("hidden", "hidden");
    }
  }

  hideOrShowIncomeActions();

  $("#datePicker").flatpickr({
    enableTime: false,
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />',
    plugins: [
      new monthSelectPlugin({
        shorthand: true, // defaults to false
        dateFormat: "Y-m", // defaults to "F Y"
      })
    ]
  });

  /**
   * on change event for income-type dropdown.
   */
  $("#income-type-id").on("change", function () {
    hideOrShowIncomeActions();
  });

  /**
   * click event for add new income-type.
   */
  $("#add").on("click", function () {
    $(".income-type").attr("hidden", "hidden");
    $(".income").removeAttr("hidden");

    $(".mt-5 *").attr("disabled", "disabled");

    actionType = "create";
  });

  /**
   * click event for editing income-type.
   */
  $("#edit").on("click", function () {
    $(".income-type").attr("hidden", "hidden");
    $(".income").removeAttr("hidden");

    $(".mt-5 *").attr("disabled", "disabled");

    $("#income-name").val(selectedText);

    actionType = "update";
  });

  /**
   * click event for deleting income-type.
   */
  $("#delete").on("click", function () {
    actionType = "delete";

    ajaxCall();
  })

  /**
   * cancel event for creating new income-type.
   */
  $("#cancel").on("click", function () {
    $(".income").attr("hidden", "hidden");
    $(".invalid-feedback").attr("hidden", "hidden");
    $(".income-type").removeAttr("hidden");
    $(".mt-5 *").removeAttr("disabled");
  });

  /**
   * save event for creating new income-type.
   */
  $("#save").on("click", function () {
    ajaxCall();

    // $(".income").attr("hidden", "hidden");
    // $(".income-type").removeAttr("hidden");

    // $(".mt-5 *").removeAttr("disabled");
  });
});