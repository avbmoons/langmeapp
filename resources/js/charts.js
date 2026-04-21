// test data
let statusesCh = ['1', '2', '3', '4'];
let statusesStr = ['Draft', 'Active', 'Blocked', 'Close'];

//let modesCh = ['Plain', 'Choice', 'Lang', 'Mix', 'Memo'];
// const modesCh = json($modesCh);
// console.log('modesCh = ' + modesCh);
//let modesStr = ['2', '2', '2', '2', '1'];

//let langsCh = ['Rus', 'Eng', 'Arm', 'Gre', 'Fin', 'Lav', 'Srb'];
//let langsStr = ['2', '2', '2', '2', '2', '2', '1'];

// let sumWordsDraft = 3;
// let sumWordsActive = 97;
// let sumWordsBlocked = 0;
// let sumWordsClose = 0;

// let sumThemesDraft = 88;
// let sumThemesActive = 13;
// let sumThemesBlocked = 0;
// let sumThemesClose = 0;

//let themesCh = ['Pronouns', 'Numbers', 'Colors', 'World sides', 'Seasons', 'Months', 'Weekdays', 'Sizes', 'Directions', 'Time', 'Personal data'];
//let themesWordsStr = ['0', '18', '16', '5', '5', '14', '8', '0', '0', '0', '7'];

//const { Chart } = require("chart.js");

//let modesCh = modesCh;
Chart.register(ChartDataLabels);

const ctx = document.getElementById('testChart');
const ctx2 = document.getElementById('testChart2'); // Modes
const ctx3 = document.getElementById('testChart3'); // Langs
const ctx4 = document.getElementById('testChart4').getContext('2d'); // Words
const ctx1 = document.getElementById('testChart1').getContext('2d'); // Themes

console.log('modesCh = ' + modesCh);
console.log('modesStr = ' + modesStr);

// chart "Words by themes"
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: themesCh,    // ['Plain', 'Choice', 'Lang', 'Mix', 'Memo'],
        datasets: [{
            label: 'Words',
            data: themesWordsStr, // ['2', '2', '2', '2', '1'],
            backgroundColor: [
                'rgba(125, 121, 66, 0.7)',
                'rgba(66, 125, 107, 0.7)',
                'rgba(132, 117, 167, 0.7)',
                'rgba(167, 128, 117, 0.7)',
                'rgba(167,164,117, 0.7)',
            ],
            borderColor: [
                'rgba(125, 121, 66, 1)',
                'rgba(66, 125, 107, 1)',
                'rgba(132, 117, 167, 1)',
                'rgba(167, 128, 117, 1)',
                'rgba(167,164,117, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 45,
                    minRotation: 0,
                    font: {
                        size: 10,
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    maxRotation: 45,
                    minRotation: 0, //45,
                    font: {
                        size: 10,
                    }                    
                }
            }
        },
        plugins: {
            datalabels: {
                display: false,
            },
            title: {
                display: true,
                text: 'Words by Themes',
                color: 'rgba(12, 51, 135, 1)',
                font: {
                    size: 12,
                    weight: 'bold',
                    family: 'Roboto',
                },
                align: 'center',
            },
            legend: {
                display: false,
            },
            ticks: {
                font: {
                    size: 10,
                },
                maxRotation: 45,
                minRotation: 0, //45,
            },
        },
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 5,
            },
        },
    }
});

// chart "Modes"
new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: modesCh,    // ['Plain', 'Choice', 'Lang', 'Mix', 'Memo'],
        datasets: [{
            label: 'Modes',
            data: modesStr, // ['2', '2', '2', '2', '1'],
            backgroundColor: [
                'rgba(29, 57, 164, 0.7)',
                'rgba(132, 117, 167, 0.7)',
                'rgba(167, 128, 117, 0.7)',
                'rgba(167,164,117, 0.7)',
                'rgba(75, 116, 179, 0.7)',
            ],
            borderColor: [
                'rgba(29, 57, 164, 1)',
                'rgba(132, 117, 167, 1)',
                'rgba(167, 128, 117, 1)',
                'rgba(167,164,117, 1)',
                'rgba(75, 116, 179, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 45,
                    minRotation: 0,
                    font: {
                        size: 10,
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (value === 1) {return 'Draft'};
                        if (value === 2) {return 'Active'};
                        if (value === 3) {return 'Blocked'};
                        if (value === 4) {return 'Close'};
                        //return value;
                        return '';     
                    },
                    font: {
                        size: 10,
                    },
                    maxRotation: 45,
                    minRotation: 0, //45,                    
                }
            }
        },
        plugins: {
            datalabels: {
                display: false,
            },
            title: {
                display: true,
                text: 'Modes',
                color: 'rgba(12, 51, 135, 1)',
                font: {
                    size: 12,
                    weight: 'bold',
                    family: 'Roboto',
                },
                align: 'center',
            },
            legend: {
                display: false,
            },
        },
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 5,
            },
        },
    }
});

// chart "Langs"
new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: langsCh,    // ['Plain', 'Choice', 'Lang', 'Mix', 'Memo'],
        datasets: [{
            label: 'Langs',
            data: langsStr, // ['2', '2', '2', '2', '2', '2', '1'],
            backgroundColor: [
                'rgba(29, 57, 164, 0.7)',
                'rgba(132, 117, 167, 0.7)',
                'rgba(167, 128, 117, 0.7)',
                'rgba(167,164,117, 0.7)',
                'rgba(75, 116, 179, 0.7)',
            ],
            borderColor: [
                'rgba(29, 57, 164, 1)',
                'rgba(132, 117, 167, 1)',
                'rgba(167, 128, 117, 1)',
                'rgba(167,164,117, 1)',
                'rgba(75, 116, 179, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 45,
                    minRotation: 0,
                    font: {
                        size: 10,
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (value === 1) {return 'Draft'};
                        if (value === 2) {return 'Active'};
                        if (value === 3) {return 'Blocked'};
                        if (value === 4) {return 'Close'};
                        //return value;
                        return '';     
                    },
                    // maxRotation: 45,
                    // minRotation: 0, //45,                    
                    font: {
                        size: 10,
                    }
                }
            }
        },
        plugins: {
            datalabels: {
                display: false,
            },
            title: {
                display: true,
                text: 'Langs',
                color: 'rgba(12, 51, 135, 1)',
                font: {
                    size: 12,
                    weight: 'bold',
                    family: 'Roboto',
                },
                align: 'center',
            },
            legend: {
                display: false,
            },
        },
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 5,
            },
        },      
    }
});

// chart "Words"
new Chart(ctx4, {
    type: 'pie',
    data: {
        labels: statusesStr,    // ['Draft', 'Active', 'Blocked', 'Close'],
        datasets: [{
            data: [sumWordsDraft, sumWordsActive, sumWordsBlocked, sumWordsClose],  // [300, 50, 100, 70],   // [sumWordsDraftStr, sumWordsActiveStr, sumWordsBlockedStr, sumWordsCloseStr],  // [300, 50, 100],
            backgroundColor: [
                'rgba(252, 207, 194, 0.7)',
                'rgba(29, 57, 164, 0.7)',
                'rgba(125, 121, 66, 0.7)',
                'rgba(83, 56, 33, 0.7)',
            ],
            borderColor: [
                'rgba(252, 207, 194, 1)',
                'rgba(29, 57, 164, 1)',
                'rgba(125, 121, 66, 1)',
                'rgba(83, 56, 33, 1)',
            ],
            borderWidth: 1,
            hoverOffset: 4,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            datalabels: {
                //display: true,
                display: function(context) {
                    return context.dataset.data[context.dataIndex] !== 0;
                },
                color: '#000',
                font: {
                    weight: 'normal',
                    size: 10,
                },
                anchor: 'right',    // 'end',
                align: 'left',   // 'start',
                offset: 10,
                formatter: (value, ctx4) => {
                    let sum = ctx4.dataset.data.reduce((a, b) => a + b, 0);
                    let percentage = ((value * 100) / sum).toFixed(0) + " %";
                    let text = ctx4.chart.data.labels[ctx4.dataIndex] + ' ' + percentage;
                    return text;    // percentage;  // value;
                },
                borderColor: 'grey',
                borderWidth: 1,
                borderRadius: 4,
                backgroundColor: 'white',
            },
            title: {
                display: true,
                text: 'Words',
                color: 'rgba(12, 51, 135, 1)',
                font: {
                    size: 12,
                    weight: 'bold',
                    family: 'Roboto',
                },
                align: 'center',
            },
            legend: {
                display: false,
            },
        },
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 5,
            },
        },
    },
});

// chart "Themes"
new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: statusesStr,    // ['Draft', 'Active', 'Blocked', 'Close'],
        datasets: [{
            data: [sumThemesDraft, sumThemesActive, sumThemesBlocked, sumThemesClose],  // [300, 50, 100, 70],   // [sumWordsDraftStr, sumWordsActiveStr, sumWordsBlockedStr, sumWordsCloseStr],  // [300, 50, 100],
            backgroundColor: [
                'rgba(252, 207, 194, 0.7)',
                'rgba(29, 57, 164, 0.7)',
                'rgba(125, 121, 66, 0.7)',
                'rgba(83, 56, 33, 0.7)',
            ],
            borderColor: [
                'rgba(252, 207, 194, 1)',
                'rgba(29, 57, 164, 1)',
                'rgba(125, 121, 66, 1)',
                'rgba(83, 56, 33, 0.7)',
            ],
            borderWidth: 1,
            hoverOffset: 4,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            // legend: {
            //     position: top,
            // },
            datalabels: {
                //display: true,
                display: function(context) {
                    return context.dataset.data[context.dataIndex] !== 0;
                },
                color: '#000',
                font: {
                    weight: 'normal',
                    size: 10,
                },
                anchor: 'left',    // 'left',    // 'end',
                align: 'right',  // 'right',   // 'start',
                offset: 1,  // 10,
                formatter: (value, ctx4) => {
                    let sum = ctx4.dataset.data.reduce((a, b) => a + b, 0);
                    let percentage = ((value * 100) / sum).toFixed(0) + " %";
                    let text = ctx4.chart.data.labels[ctx4.dataIndex] + ' ' + percentage;
                    return text;    // percentage;  // value;
                },
                borderColor: 'grey',
                borderWidth: 1,
                borderRadius: 4,
                backgroundColor: 'white',
            },
            title: {
                display: true,
                text: 'Themes',
                color: 'rgba(12, 51, 135, 1)',
                font: {
                    size: 12,
                    weight: 'bold',
                    family: 'Roboto',
                },
                align: 'center',
            },
            legend: {
                display: false,
            },
        },
        layout: {
            padding: {
                left: 5,
                right: 5,
                top: 5,
                bottom: 5,
            },
        },
    },
});