$(document).ready(function () {
  $("#table").DataTable({
    authWidth: !1,
    responsive: !0,
    lengthMenu: [[10, 25, 50, 100], ["10 Rows", "25 Rows", "50 Rows", "100 Rows"]],
    language: {searchPlaceholder: "Search for records..."},
  });
});