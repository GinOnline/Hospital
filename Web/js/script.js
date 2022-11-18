const charts = document.querySelectorAll(".chart");
const charts2 = document.querySelectorAll(".chart2");
const charts3 = document.querySelectorAll(".chart3");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: ["2000", "2005", "2010", "2015", "2020"],
      datasets: [
        {
          label: "Emergencias por año",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});






charts2.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Emergencia", "Normal"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(200, 148, 50, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(240, 148, 50, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});





charts3.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Niños", "Adolescentes", "Jóvenes", "Adultos", "Ancianos"],
      datasets: [
        {
          label: "Personas Afectadas",
          data: [2, 5, 8, 5, 10],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});