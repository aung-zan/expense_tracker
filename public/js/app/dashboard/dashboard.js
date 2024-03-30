$(document).ready(function () {
  var options = { url: dataURL, method: "GET" };
  var myChart = $("#myChart");
  var chart;

  // create overview chart.
  function createOverviewChart() {
    Chart.defaults.borderColor = 'rgba(255, 255, 255, 0.1)';
    Chart.defaults.color = 'rgba(255, 255, 255, 0.8)';
    Chart.defaults.plugins.legend.display = false;

    chart = new Chart(myChart, {
      type: 'bar',
      data: {
        labels: ['Income', 'Expense'],
        datasets: [{
          data: [],
          backgroundColor: ['rgba(23, 162, 184, 0.6)', 'rgba(220, 53, 69, 0.6)'],
        }],
      },
      options: {
        maintainAspectRatio: false,
      }
    });
  }

  // make an ajax call.
  function ajaxCall(date) {
    if (date) {
      options.data = { date: date, name: 'test1' };
    }

    $.ajax(options)
    .done(function (data) {
      updateChartData(data.overview);
      addIncomeList(data.incomeList);
      addExpenseList(data.expenseList);
    })
    .fail(function (data) {
      console.log('fail');
      console.log(data);
    });
  }

  // create and show income list.
  function addIncomeList(incomeList) {
    $(".income-listview").children().remove();
    var listItem = $("#main-list");

    incomeList.forEach(function (item) {
      var income = listItem.clone();
      income.removeAttr("hidden");
      income.removeAttr("id");
      income.find(".type").text(item.name);
      income.find(".amount").text(item.amount);

      income.appendTo(".income-listview");
    });
  }

  // create and show expense list.
  function addExpenseList(expenseList) {
    $(".expense-listview").children().remove();
    var listItem = $("#main-list");

    expenseList.forEach(function (item) {
      var expense = listItem.clone();
      expense.removeAttr("hidden");
      expense.removeAttr("id");
      expense.find(".type").text(item.name);
      expense.find(".amount").text(item.expense_amount);

      expense.appendTo(".expense-listview");
    })
  }

  // update overview chart data.
  function updateChartData(overviewData) {
    chart.data.datasets.forEach(function (dataset) {
      dataset.data = overviewData;
    });

    chart.update();
  }

  createOverviewChart();
  ajaxCall();

  $("#datePicker").flatpickr({
    enableTime: false,
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />',
    plugins: [
      new monthSelectPlugin({
        shorthand: true, // defaults to false
        dateFormat: "Y-m", // defaults to "F Y"
      })
    ],
    onChange: function (selectedDates, dateStr, instance) {
      ajaxCall(dateStr);
    }
  });
});