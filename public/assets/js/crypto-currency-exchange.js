(function () {
  "use strict";

  /* BTC Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(84, 109, 254,0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("btc-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#btc-currency-chart"),
    total
  );
  total.render();
  /* BTC Chart */

  /* ETH Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(255, 105, 55,0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("eth-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#eth-currency-chart"),
    total
  );
  total.render();
  /* ETH Chart */

  /* Dash Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(88, 196, 55,0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("dash-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#dash-currency-chart"),
    total
  );
  total.render();
  /* Dash Chart */

  /* LTC Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(255, 151, 3, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("ltc-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#ltc-currency-chart"),
    total
  );
  total.render();
  /* LTC Chart */

  /* XRS Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(65, 149, 249, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("xrs-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#xrs-currency-chart"),
    total
  );
  total.render();
  /* XRS Chart */

  /* GLM Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(251, 78, 88, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("glm-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#glm-currency-chart"),
    total
  );
  total.render();
  /* GLM Chart */

  /* Monero Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba( 0, 216, 216, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("monero-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#monero-currency-chart"),
    total
  );
  total.render();
  /* Monero Chart */

  /* Eos Chart */
  var total = {
    chart: {
      type: "line",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [54, 38, 56, 35, 65, 43, 53, 45, 62, 80, 35, 48],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(123, 118, 254, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  document.getElementById("eos-currency-chart").innerHTML = "";
  var total = new ApexCharts(
    document.querySelector("#eos-currency-chart"),
    total
  );
  total.render();
  /* Eos Chart */

})();