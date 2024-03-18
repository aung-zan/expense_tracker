$(document).ready(function () {
  $("[name*='name']").hide();
  $("[name*='name']").attr("disabled", "disabled");
  $("#removeNewIncome").hide();

  $("#datePicker").flatpickr({
    enableTime: false,
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />',
    plugins: [
      new monthSelectPlugin({
        shorthand: true, //defaults to false
        dateFormat: "Y-m", //defaults to "F Y"
      })
    ]
  });

  /**
   * On click event to add new income.
   */
  $("#newIncome").on("click", function () {
    $(this).hide();
    $("#incomeId").attr("disabled", "disabled");

    $("[name*='name']").show();
    $("[name*='name']").removeAttr("disabled");
    $("#removeNewIncome").show();
  });

  /**
   * On click event to remove new income.
   */
  $("#removeNewIncome").on("click", function () {
    $(this).hide();
    $("[name*='name']").hide();
    $("[name*='name']").attr("disabled", "disabled");

    $("#incomeId").removeAttr("disabled");
    $("#newIncome").show();
  });
});