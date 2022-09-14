const barCanvas = document.getElementById("barCanvas");
let resultA = document.getElementById("apprentissage").innerHTML;
let resultIntra = document.getElementById("intrapersonnelles").innerHTML;
let resultR = document.getElementById("reflexion").innerHTML;
let $resultC = document.getElementById("communication").innerHTML;
let resultInter = document.getElementById("interpersonnelles").innerHTML;
let resultL = document.getElementById("leadership").innerHTML;

const barChart = new Chart(barCanvas, {
  type: "doughnut",
  data: {
    labels: [
      "Apprentissage",
      "Compétences intrapersonnelles",
      "Reflexion",
      "Communication",
      "Compétences interpersonnelles",
      "Leadership",
    ],

    datasets: [
      {
        label: "Ma roue de compétences",
        data: [resultA, resultIntra, resultR, $resultC, resultInter, resultL],
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
          "rgb(108, 92, 231)",
          "rgb(243, 156, 18)",
          "rgb(46, 204, 113)",
        ],
        borderColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
          "rgb(108, 92, 231)",
          "rgb(243, 156, 18)",
          "rgb(46, 204, 113)",
        ],
        borderWidth: 1,
        hoverOffset: 4,
      },
    ],
  },
});


