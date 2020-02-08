var mydata=[["data1", 30, 200, 100, 400, 150, 250], ["data2", 150, 100, 140, 200, 150, 50], ["data3", 80, 50, 130, 210, 90, 100]];

$(function () {
    altair_charts.metrics_graphics(), altair_charts.c3js(), altair_charts.chartist_charts()
}), altair_charts = {
    metrics_graphics: function () {},
    c3js: function () {
        var n = "#c3_chart_donut";
        if ($(n).length) {
            var a = c3.generate({
                bindto: n,
                data: {
                    // columns: [["data1", 30], ["data2", 120], ["data3", 150]]
                    columns: mydata
                    , type: "donut", onclick: function (e, t) {
                        console.log("onclick", e, t)
                    }, onmouseover: function (e, t) {
                        console.log("onmouseover", e, t)
                    }, onmouseout: function (e, t) {
                        console.log("onmouseout", e, t)
                    }
                },
                donut: {title: "Iris Petal Width", width: 40},
                color: {pattern: ["#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf"]}
            });
          /*  $(n).waypoint({
                handler: function () {
                    setTimeout(function () {
                        a.load({columns: [["setosa", .2, .2, .2, .2, .2, .4, .3, .2, .2, .1, .2, .2, .1, .1, .2, .4, .4,
                                .3, .3, .3, .2, .4, .2, .5, .2, .2, .4, .2, .2, .2, .2, .4, .1, .2, .2, .2, .2, .1, .2, .2, .3, .3, .2, .6, .4, .3, .2, .2, .2, .2],
                                ["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1, 1.3, 1.4, 1, 1.5, 1, 1.4, 1.3, 1.4,
                                    1.5, 1, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1, 1.1, 1, 1.2, 1.6, 1.5,
                                    1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                                ["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2, 1.9, 2.1, 2,
                                    2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2, 2, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6,
                                    1.9, 2, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2, 2.3, 1.8]]})
                    }, 1500), setTimeout(function () {
                        a.unload({ids: "data1"}), a.unload({ids: "data2"})
                    }, 2500), this.destroy()
                }, offset: "80%"
            }), $window.on("debouncedresize", function () {
                a.resize()
            })*/
        }
        if ($("#c3_chart_spline").length) {
            var i = c3.generate({
                bindto: "#c3_chart_spline",
                data: {
                    // columns: [["data1", 30, 200, 100, 400, 150, 250], ["data2", 150, 100, 140, 200, 150, 50]],
                    columns: mydata,
                    type: "spline"
                },
                color: {pattern: ["#5E35B1", "#FB8C00"]}
            });
        }


        if ($("#c3_server_load").length) {
            var c = c3.generate({
                bindto: "#c3_server_load",
                data: {
                    // columns: [["data", 24]]
                    columns: mydata
                    , type: "gauge", onclick: function (e, t) {
                        console.log("onclick", e, t)
                    }, onmouseover: function (e, t) {
                        console.log("onmouseover", e, t)
                    }, onmouseout: function (e, t) {
                        console.log("onmouseout", e, t)
                    }
                },
                gauge: {
                    label: {
                        format: function (e, t) {
                            return e
                        }, show: !1
                    }, min: 0, max: 100, width: 36
                },
                color: {pattern: ["#D32F2F", "#F57C00", "#388E3C", "#8c564b", "#e377c2"], threshold: {values: [25, 50, 100]}},
                size: {height: 180}
            });
            setInterval(function () {
                var e = Math.floor(100 * Math.random());
                c.load({columns: [["data", e]]})
            }, 2e3)
        }
    },
    chartist_charts: function () {
        var e = new Chartist.Line("#chartist_simple_lines", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [[12, 9, 7, 8, 5], [2, 1, 3.5, 7, 3], [1, 3, 4, 5, 6]]
        }, {fullWidth: !0, chartPadding: {right: 40}});



        var a = new Chartist.Bar("#chartist_distributed_series", {
            labels: ["XS", "S", "M", "L", "XL", "XXL", "XXXL"],
            series: [20, 60, 120, 200, 180, 20, 10]
        }, {distributeSeries: !0});
        $window.on("resize", function () {
            a.update()
        });
        i = {labels: ["Bananas", "Apples", "Grapes"], series: [20, 15, 40]};
        var s = new Chartist.Pie("#chartist_pie_custom_labels", i, {
            labelInterpolationFnc: function (e) {
                return e[0]
            }
        }, [["screen and (max-width: 767px)", {
            chartPadding: 50,
            labelOffset: 50,
            labelDirection: "explode",
            labelInterpolationFnc: function (e) {
                return e
            }
        }], ["screen and (min-width: 768px)", {
            chartPadding: 30,
            labelOffset: 60,
            labelDirection: "explode",
            labelInterpolationFnc: function (e) {
                return e
            }
        }], ["screen and (min-width: 1024px)", {labelOffset: 80, chartPadding: 20}]]);
        $window.on("resize", function () {
            s.update()
        });
        var d = new Chartist.Pie("#chartist_donut_animate", {
            series: [10, 20, 50, 20, 5, 50, 15],
            labels: [1, 2, 3, 4, 5, 6, 7]
        }, {donut: !0, showLabel: !1});
        $window.on("resize", function () {
            d.update()
        }), d.on("draw", function (e) {
            if ("slice" === e.type) {
                var t = e.element._node.getTotalLength();
                e.element.attr({"stroke-dasharray": t + "px " + t + "px"});
                var n = {
                    "stroke-dashoffset": {
                        id: "anim" + e.index,
                        dur: 1e3,
                        from: -t + "px",
                        to: "0px",
                        easing: Chartist.Svg.Easing.easeOutQuint,
                        fill: "freeze"
                    }
                };
                0 !== e.index && (n["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({"stroke-dashoffset": -t + "px"}), e.element.animate(n, !1)
            }
        }), d.on("created", function () {
            window.__anim21278907124 && (clearTimeout(window.__anim21278907124), window.__anim21278907124 = null), window.__anim21278907124 = setTimeout(d.update.bind(d), 1e4)
        })
    }
};
