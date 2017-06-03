FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "pie3d",
        "renderAt": "chartContainer",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource":  {
          "chart": {
              "caption": "Split of Employee by Gender",
              "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
              "bgColor": "#ffffff",
              "showBorder": "0",
              "use3DLighting": "0",
              "showShadow": "0",
              "enableSmartLabels": "0",
              "startingAngle": "0",
              "showPercentValues": "1",
              "showPercentInTooltip": "0",
              "decimals": "1",
              "captionFontSize": "14",
              "subcaptionFontSize": "14",
              "subcaptionFontBold": "0",
              "toolTipColor": "#ffffff",
              "toolTipBorderThickness": "0",
              "toolTipBgColor": "#000000",
              "toolTipBgAlpha": "80",
              "toolTipBorderRadius": "2",
              "toolTipPadding": "5",
              "showHoverEffect": "1",
              "showLegend": "1",
              "legendBgColor": "#ffffff",
              "legendBorderAlpha": "0",
              "legendShadow": "0",
              "legendItemFontSize": "10",
              "legendItemFontColor": "#666666",
              "useDataPlotColorForLabels": "1"
          },
         "data":yiioptions.data_result,
      }

  });
revenueChart.render();
})


FusionCharts.ready(function(){
    var Chart = new FusionCharts({
        "type": "pareto3d",
        "renderAt": "chartContainer-martial",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource":  {
         "chart": {
                "caption": "Split of Employee by Martial Status",
                "subCaption": "Hris Smart",
                "paletteColors": "#0075c2,#f2c500,#f45b00,#8e0000",
                "lineColor": "#1aaf5d",
                "xAxisName": "Reported Cause",
                "pYAxisName": "No. of Occurrence",
                "sYAxisname": "Cumulative Percentage",
                "bgColor": "#ffffff",
                "borderAlpha": "20",
                "showCanvasBorder": "0",
                "usePlotGradientColor": "0",
                "plotBorderAlpha": "10",
                "showHoverEffect":"1",
                "showValues": "0",                
                "showXAxisLine": "1",
                "xAxisLineColor": "#999999",
                "divlineColor": "#999999",                
                "showAlternateHGridColor": "0",
                "subcaptionFontBold": "0",
                "subcaptionFontSize": "14"
            },
         "data":yiioptions.data_martial,
      }
  });
Chart.render();
})

FusionCharts.ready(function(){
    var Charte = new FusionCharts({
        "type": "pareto3d",
        "renderAt": "chart-Container-education",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource":  {
         "chart": {
                "caption": "Split of Employee by Education",
                "subCaption": "Hris Smart",
                "paletteColors": "#0075c2,#f2c500,#f45b00,#8e0000",
                "lineColor": "#1aaf5d",
                "xAxisName": "Reported Cause",
                "pYAxisName": "No. of Occurrence",
                "sYAxisname": "Cumulative Percentage",
                "bgColor": "#ffffff",
                "borderAlpha": "20",
                "showCanvasBorder": "0",
                "usePlotGradientColor": "0",
                "plotBorderAlpha": "10",
                "showHoverEffect":"1",
                "showValues": "0",                
                "showXAxisLine": "1",
                "xAxisLineColor": "#999999",
                "divlineColor": "#999999",                
                "showAlternateHGridColor": "0",
                "subcaptionFontBold": "0",
                "subcaptionFontSize": "14"
            },
         "data":yiioptions.data_education,
      }
  });
Charte.render();
})

