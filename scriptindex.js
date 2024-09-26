
const labels = ["JavaScript","Java","Python","Haskell","CSS / HTML","C#"];
const proportion = [30, 50, 75, 30, 30, 20];
const chartColours = [
    "#F0DB4F",
    "#5382a1",
    "#646464",
    "#453a62",
    "#286ed7",
    "#682876"
];

new Chart("chartValues", {
    type: "doughnut",
    data: {
        labels: labels,
        datasets: [{
            backgroundColor: chartColours,
            data: proportion
        }]
    },
    options: {
        legend: {display: false}
    }
});
