<script>
    var options =
    {
        chart: {
            type: '{!! $chart->type() !!}',
            @if($chart->background())
                background: '{!! $chart->background() !!}',
            @endif
            height: {!! $chart->height() !!},
            width: '{!! $chart->width() !!}',
            toolbar: {!! $chart->toolbar() !!},
            zoom: {!! $chart->zoom() !!},
            fontFamily: '{!! $chart->fontFamily() !!}',
            foreColor: '{!! $chart->foreColor() !!}',
            sparkline: {!! $chart->sparkline() !!}
        },
        @if($chart->noData())
            noData: {!! $chart->noData() !!},
        @endif
        plotOptions: {
            bar: {!! $chart->plotOptionsBar() !!}
        },
        legend: {
            show: {!! $chart->legend() !!}
        },
        colors: {!! $chart->colors() !!},
        series: {!! $chart->dataset() !!},
        dataLabels: {!! $chart->dataLabels() !!},
        @if($chart->fill())
            fill: {!! $chart->fill() !!},
        @endif
        @if($chart->labels())
            labels: {!! json_encode($chart->labels(), true) !!},
        @endif
        title: {
            text: "{!! $chart->title() !!}"
        },
        subtitle: {
            text: '{!! $chart->subtitle() !!}',
            align: '{!! $chart->subtitlePosition() !!}'
        },
        xaxis: {
            categories: {!! $chart->xAxis() !!},
            @if($chart->xAxisBorder())
                axisBorder: {!! $chart->xAxisBorder() !!},
            @endif
            @if($chart->xAxisTicks())
                axisTicks: {!! $chart->xAxisTicks() !!},
            @endif
            @if($chart->xAxisType())
                type: "{!! $chart->xAxisType() !!}",
            @endif
            @if($chart->xAxisLabels())
                labels: {!! $chart->xAxisLabels() !!}
            @endif

        },
        @if($chart->yAxis())
            yaxis: {!! $chart->yAxis() !!},
        @endif
        theme: {
            mode: "{!! $chart->theme() !!}",
        },
        @if($chart->tooltip())
            tooltip: {!! $chart->tooltip() !!},
        @endif
        grid: {!! $chart->grid() !!},
        markers: {!! $chart->markers() !!},
        @if($chart->stroke())
            stroke: {!! $chart->stroke() !!},
        @endif
    }

    var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
    chart.render();

</script>
