var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr"],
    datasets: [{
      label: "Jumlah Berkas",
      data: [10, 20, 15, 30],
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
    }]
  },
  options: {
    // opsional styling
  }
});
