$(function () {
    'use strict';

    /**
     * ChartJS
     */

    // -----------------------
    // - MONTHLY SALES CHART -
    // -----------------------

    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');

    var salesChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label                       : 'Digital Goods',
                backgroundColor             : 'rgba(60,141,188,0.9)',
                borderColor                 : 'rgba(60,141,188,0.8)',
                borderWidth                 : 2,
                lineTension                 : 0.3,
                cubicInterpolationMode      : 'default', // 'default', 'monotone'
                fill                        : 'origin',
                pointBackgroundColor        : '#3b8bba',
                pointBorderColor            : 'rgba(60,141,188,1)',
                pointHoverBackgroundColor   : '#fff',
                pointHoverBorderColor       : 'rgba(60,141,188,1)',
                pointRadius                 : 0,
                pointBorderWidth            : 1,
                pointStyle                  : 'circle', // circle, cross, crossRot, dash, line, rect, rectRounded, rectRot, star, triangle, 
                pointHitRadius              : 20,
                data                        : [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label                       : 'Electronics',
                backgroundColor             : 'rgb(210, 214, 222)',
                borderColor                 : 'rgb(210, 214, 222)',
                borderWidth                 : 2,
                lineTension                 : 0.3,
                cubicInterpolationMode      : 'default', // 'default', 'monotone'
                fill                        : 'origin',
                pointBackgroundColor        : 'rgb(210, 214, 222)',
                pointBorderColor            : '#c1c7d1',
                pointHoverBackgroundColor   : '#fff',
                pointHoverBorderColor       : 'rgb(220,220,220)',
                pointRadius                 : 0,
                pointBorderWidth            : 1,
                pointStyle                  : 'circle', // circle, cross, crossRot, dash, line, rect, rectRounded, rectRot, star, triangle, 
                pointHitRadius              : 20,
                data                        : [65, 59, 80, 81, 56, 55, 40]
            },
        ]
    };

    var salesChartCustomTooltips = function(tooltip) {
        // Tooltip Element
        var tooltipEl = document.getElementById('chartjs-tooltip');

        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'chartjs-tooltip';
            tooltipEl.innerHTML = "<table></table>"
            this._chart.canvas.parentNode.appendChild(tooltipEl);
        }

        // Hide if no tooltip
        if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        // Set caret Position
        tooltipEl.classList.remove('above', 'below', 'no-transform');
        if (tooltip.yAlign) {
            tooltipEl.classList.add(tooltip.yAlign);
        } else {
            tooltipEl.classList.add('no-transform');
        }

        function getBody(bodyItem) {
            return bodyItem.lines;
        }

        // Set Text
        if (tooltip.body) {
            var titleLines = tooltip.title || [];
            var bodyLines = tooltip.body.map(getBody);

            var innerHtml = '<thead>';

            titleLines.forEach(function(title) {
                innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '</thead><tbody>';

            bodyLines.forEach(function(body, i) {
                var colors = tooltip.labelColors[i];
                var style = 'background:' + colors.backgroundColor;
                style += '; border-color:' + colors.borderColor;
                style += '; border-width: 2px'; 
                var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                innerHtml += '<tr><td>' + span + body + '</td></tr>';
            });
            innerHtml += '</tbody>';

            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
        }

        var positionY = this._chart.canvas.offsetTop;
        var positionX = this._chart.canvas.offsetLeft;

        // Display, position, and set styles for font
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = positionX + tooltip.caretX + 'px';
        tooltipEl.style.top = positionY + tooltip.caretY + 'px';
        // tooltipEl.style.fontFamily = tooltip._fontFamily;
        tooltipEl.style.fontSize = tooltip.fontSize;
        tooltipEl.style.fontStyle = tooltip._fontStyle;
        tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
    };

    var salesChartOptions = {
        responsive: true,
        title: {
            display: false,
            text: 'Sales Chart Title'
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display         : true,
                    drawBorder      : true,
                    drawOnChartArea : true,
                    drawTicks       : true,
                    color           : 'rgba(0,0,0,.05)',
                    lineWidth       : 1
                }
            }],
            yAxes: [{
                gridLines: {
                    display         : true,
                    drawBorder      : true,
                    drawOnChartArea : true,
                    drawTicks       : true,
                    color           : 'rgba(0,0,0,.05)',
                    lineWidth       : 1
                },
                ticks: {
                    min: 10,
                    max: 90,
                    stepSize: 10
                }
            }]
        },
        legend: {
            display: false
        },
        tooltips: {
            enabled: false,
            mode: 'index',
            position: 'nearest',
            custom: salesChartCustomTooltips,
            callbacks: {
                labelColor: function(tooltipItem, salesChart) {
                    var datasets = salesChart.chart.config.data.datasets;
                    return {
                        backgroundColor : datasets[tooltipItem.datasetIndex].backgroundColor,
                        borderColor     : datasets[tooltipItem.datasetIndex].borderColor
                    };
                },
                labelTextColor: function(tooltipItem, salesChart) {
                    return '#543453';
                }
            }
        }
    };

    // Create the line chart
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas, {
        type: "line",
        data: salesChartData,
        options: salesChartOptions
    });

    // ---------------------------
    // - END MONTHLY SALES CHART -
    // ---------------------------

    // -------------
    // - PIE CHART -
    // -------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

    var PieData = {
        labels: ['Chrome', 'IE', 'Firefox', 'Safari', 'Opera', 'Navigator'],
        datasets: [{
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: [
                '#f56954',
                '#00a65a',
                '#f39c12',
                '#00c0ef',
                '#3c8dbc',
                '#d2d6de',
            ],
            hoverBackgroundColor: [
                '#f56954',
                '#00a65a',
                '#f39c12',
                '#00c0ef',
                '#3c8dbc',
                '#d2d6de',
            ],
            label: 'Dataset 1',
        }],
    };

    var pieOptions = {
        // Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        // String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        // Number - The width of each segment stroke
        segmentStrokeWidth   : 1,
        // Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 20, // This is 0 for Pie charts
        // Number - Amount of animation steps
        animationSteps       : 100,
        // String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        // Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        // Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        // Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : false,
        // String - A legend template
        // legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
        legend: {
            display: false,
            position: 'right',
        },
        // String - A tooltip template
        // tooltipTemplate      : '<%=value %> <%=label%> users',
        tooltips: {
            enabled: true,
            displayColors: true,
            bodyFontColor: '#fff',
            callbacks: {
                label: function(tooltipItem, pieChart) {
                    var itemVal = this._data.datasets[0].data[tooltipItem.index];
                    var itemLabel = this._data.labels[tooltipItem.index];
                    return  ' ' + itemVal + ' ' + itemLabel + ' users';
                },
                // title: function(tooltipItem, pieChart) {
                //     var itemLabel = this._data.labels[tooltipItem[0].index];
                //     return  itemLabel;
                // }
            }
        }
    };

    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: "doughnut",
        data: PieData,
        options: pieOptions
    });
    // -----------------
    // - END PIE CHART -
    // -----------------

    /* jVector Maps
     * ------------
     * Create a world map with markers
     */
    $('#world-map-markers').vectorMap({
        map              : 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity     : 0.7,
        hoverColor       : false,
        backgroundColor  : 'transparent',
        regionStyle      : {
            initial      : {
                fill            : 'rgba(210, 214, 222, 1)',
                'fill-opacity'  : 1,
                stroke          : 'none',
                'stroke-width'  : 0,
                'stroke-opacity': 1
            },
            hover        : {
                'fill-opacity': 0.7,
                cursor        : 'pointer'
            },
            selected     : {
                fill: 'yellow'
            },
            selectedHover: {}
        },
        markerStyle      : {
            initial: {
                fill  : '#00a65a',
                stroke: '#111'
            }
        },
        markers          : [
            { latLng: [41.90, 12.45], name: 'Vatican City' },
            { latLng: [43.73, 7.41], name: 'Monaco' },
            { latLng: [-0.52, 166.93], name: 'Nauru' },
            { latLng: [-8.51, 179.21], name: 'Tuvalu' },
            { latLng: [43.93, 12.46], name: 'San Marino' },
            { latLng: [47.14, 9.52], name: 'Liechtenstein' },
            { latLng: [7.11, 171.06], name: 'Marshall Islands' },
            { latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis' },
            { latLng: [3.2, 73.22], name: 'Maldives' },
            { latLng: [35.88, 14.5], name: 'Malta' },
            { latLng: [12.05, -61.75], name: 'Grenada' },
            { latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines' },
            { latLng: [13.16, -59.55], name: 'Barbados' },
            { latLng: [17.11, -61.85], name: 'Antigua and Barbuda' },
            { latLng: [-4.61, 55.45], name: 'Seychelles' },
            { latLng: [7.35, 134.46], name: 'Palau' },
            { latLng: [42.5, 1.51], name: 'Andorra' },
            { latLng: [14.01, -60.98], name: 'Saint Lucia' },
            { latLng: [6.91, 158.18], name: 'Federated States of Micronesia' },
            { latLng: [1.3, 103.8], name: 'Singapore' },
            { latLng: [1.46, 173.03], name: 'Kiribati' },
            { latLng: [-21.13, -175.2], name: 'Tonga' },
            { latLng: [15.3, -61.38], name: 'Dominica' },
            { latLng: [-20.2, 57.5], name: 'Mauritius' },
            { latLng: [26.02, 50.55], name: 'Bahrain' },
            { latLng: [0.33, 6.73], name: 'São Tomé and Príncipe' }
        ]
    });

    /* SPARKLINE CHARTS
     * ----------------
     * Create a inline charts with spark line
     */

    // -----------------
    // - SPARKLINE BAR -
    // -----------------
    $('.sparkbar').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
            type    : 'bar',
            height  : $this.data('height') ? $this.data('height') : '30',
            barColor: $this.data('color')
        });
    });

    // -----------------
    // - SPARKLINE PIE -
    // -----------------
    $('.sparkpie').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
            type       : 'pie',
            height     : $this.data('height') ? $this.data('height') : '90',
            sliceColors: $this.data('color')
        });
    });

      // ------------------
      // - SPARKLINE LINE -
      // ------------------
    $('.sparkline').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
            type     : 'line',
            height   : $this.data('height') ? $this.data('height') : '90',
            width    : '100%',
            lineColor: $this.data('linecolor'),
            fillColor: $this.data('fillcolor'),
            spotColor: $this.data('spotcolor')
        });
    });
});
