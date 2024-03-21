$(document).ready(function () {
  $("#datePicker").flatpickr({
    enableTime: false,
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />',
    plugins: [
      new monthSelectPlugin({
        shorthand: true, //defaults to false
        dateFormat: "Y-m", //defaults to "F Y"
      })
    ],
    onChange: function (selectedDates, dateStr, instance) {
      var url = new URL(document.location.href);
      url.searchParams.set('date', dateStr);
      document.location = url;
    }
  });

  $("#table").DataTable({
    authWidth: !1,
    responsive: !0,
    lengthMenu: [[10, 25, 50, 100], ["10 Rows", "25 Rows", "50 Rows", "100 Rows"]],
    language: {searchPlaceholder: "Search for records..."},
  });

  $(".delete").on("click", function () {
    var id = $(this).attr('data-id');
    var url = $("#delete-url").val();
    var delete_url = url.replace("###", id);

    $(".delete-form").attr("action", delete_url).submit();
  });
});