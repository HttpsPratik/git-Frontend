$(function (){

    $.ajax({
        url: '/category-name', type: 'get', success: function (response) {
            response.forEach(function (data) {
                $('#category_id').append($('<option>', {
                    value: data.id, text: data.name
                }));
            });
        }
    });

    $('#category_id').select2({
        theme: 'bootstrap-5'
    });


    if ($(document).attr("title") == "गृहपृष्ठ") {
        let xValues = [];
        let yValues = [];
        //medium chart
        $.ajax({
            url: "/dashboard/medium-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.tickets_count);
                });
                //
                new Chart($("#medium-chart"), {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        legend: {
                            labels: {
                                usePointStyle: true,
                            },
                            display: true,
                        },
                        title: {
                            display: false /*text: "Current Fiscal Year"*/,
                        },
                    },
                    animation: {
                        duration: 2500,
                    },
                });
                xValues = [];
                yValues = [];

                //
            },
        });

        //category chart

        $.ajax({
            url: "/dashboard/categories-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.category_count);
                });

                var ctx = document
                    .getElementById("categories-chart")
                    .getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    ticks: {
                                        display: false,
                                    },
                                },
                            ],
                        },
                        legend: {
                            display: true,
                            position: "top",
                            align: "right",
                            labels: {
                                usePointStyle: true,
                                generateLabels: function (chart) {
                                    var labels = chart.data.labels;
                                    var legendLabels = [];

                                    for (var i = 0; i < labels.length; i++) {
                                        legendLabels.push({
                                            text: labels[i],
                                            fillStyle:
                                                chart.data.datasets[0]
                                                    .backgroundColor[i],
                                            hidden: chart.getDatasetMeta(0)
                                                .data[i].hidden,
                                        });
                                    }

                                    return legendLabels;
                                },
                            },
                        },
                        animation: {
                            duration: 2500,
                        },
                    },
                });
                xValues = [];
                yValues = [];
            },
        });

        //department chart
        $.ajax({
            url: "/dashboard/departments-count",
            type: "get",
            success: function (response) {
                response.forEach(function (data) {
                    xValues.push(data.name);
                    yValues.push(data.department_id_count);
                });

                var ctx = document
                    .getElementById("departments-chart")
                    .getContext("2d");
                var chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                backgroundColor: generateColors(xValues.length),
                                data: yValues,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    ticks: {
                                        display: false,
                                    },
                                },
                            ],
                        },
                        legend: {
                            display: true,
                            position: "top",
                            align: "right",
                            labels: {
                                usePointStyle: true,
                                generateLabels: function (chart) {
                                    var labels = chart.data.labels;
                                    var legendLabels = [];

                                    for (var i = 0; i < labels.length; i++) {
                                        legendLabels.push({
                                            text: labels[i],
                                            fillStyle:
                                                chart.data.datasets[0]
                                                    .backgroundColor[i],
                                            hidden: chart.getDatasetMeta(0)
                                                .data[i].hidden,
                                        });
                                    }

                                    return legendLabels;
                                },
                            },
                        },
                        animation: {
                            duration: 2500,
                        },
                    },
                });
                xValues = [];
                yValues = [];
                //
            },
        });
    }

    $("#edit_user_name").on("show.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const name = link.data("name");

        modal.find(".modal-body #id2").val(id);
        modal.find(".modal-body #name").val(name);
    });

    $("#change_user_password").on("show.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");

        modal.find(".modal-body #current_password").val('');
        modal.find(".modal-body #password").val('');
        modal.find(".modal-body #password_confirmation").val('');
        modal.find(".modal-body #id").val(id);
    });

    $("#edit_user_email").on("show.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");

        modal.find(".modal-body #email").val('');
        modal.find(".modal-body #id1").val(id);
    });

})

function generateColors(numColors) {
    const colors = [];
    const goldenRatio = 0.618033988749895;
    let hue = 0.1; // Use a fixed seed value

    for (let i = 0; i < numColors; i++) {
        hue += goldenRatio;
        hue %= 1;

        const saturation = 0.5;
        const lightness = 0.6;

        const color = hslToHex(hue * 360, saturation * 100, lightness * 100);
        colors.push(color);
    }

    return colors;
}

function hslToHex(h, s, l) {
    h /= 360;
    s /= 100;
    l /= 100;
    let r, g, b;
    if (s === 0) {
        r = g = b = l;
    } else {
        const hue2rgb = (p, q, t) => {
            if (t < 0) t += 1;
            if (t > 1) t -= 1;
            if (t < 1 / 6) return p + (q - p) * 6 * t;
            if (t < 1 / 2) return q;
            if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
            return p;
        };
        const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
        const p = 2 * l - q;
        r = Math.round(hue2rgb(p, q, h + 1 / 3) * 255);
        g = Math.round(hue2rgb(p, q, h) * 255);
        b = Math.round(hue2rgb(p, q, h - 1 / 3) * 255);
    }
    return `#${r.toString(16)}${g.toString(16)}${b.toString(16)}`;
}
