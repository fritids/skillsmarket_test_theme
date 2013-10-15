<div id="widget-number-students" class="sm_widget unavailable-widget">
	<div class="widget-content">
		<div id="students_stats_chart" style="max-width: 300px; width: 300px; height: 400px; max-height: 400px; margin: 0">
            <div id="ss_chart" style="max-width: 300px; width: 300px; height: 200px; max-height: 200px; margin: 0">
                
            </div>
            <div id="ss_detailed_info">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="#fakelink">Week</a>
                        <a class="btn btn-primary" href="#fakelink">Month</a>
                        <a class="btn btn-primary" href="#fakelink">Year</a>
                    </div>
                </div>
                <div class="details clearfix">
                    <div class="wrapper clearfix">
                        <section class="month-april clearfix">
                            <div class="pull-left">
                                <span class="month">Apr</span>
                                <span class="year">2013</span>
                            </div>
                            <div class="pull-right">
                                <span class="plus">+</span>
                                <span class="percent">21%</span>
                            </div>
                        </section>
                        <section class="month-may clearfix">
                            <div class="pull-left">
                                <span class="month">May</span>
                                <span class="year">2013</span>
                            </div>
                            <div class="pull-right">
                                <span class="plus">+</span>
                                <span class="percent">48%</span>
                            </div>
                        </section>
                        <section class="month-june clearfix">
                            <div class="pull-left">
                                <span class="month">June</span>
                                <span class="year">2013</span>
                            </div>
                            <div class="pull-right">
                                <span class="plus">+</span>
                                <span class="percent">35%</span>
                            </div>
                        </section>
                        <section class="month-july clearfix">
                            <div class="pull-left">
                                <span class="month">July</span>
                                <span class="year">2013</span>
                            </div>
                            <div class="pull-right">
                                <span class="plus">+</span>
                                <span class="percent">12%</span>
                            </div>
                        </section>                        
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<script type="text/javascript">
jQuery(function($){
	/*################## NUMBER OF STUDENTS ###################*/
	$('#students_stats_chart #ss_chart').highcharts({
        chart: {
            type: 'line',
            backgroundColor: '#df8127',
            height: 200,
            margin: [60, 30, 40, 40],
            spacing: [15, 0, 0, 0],
            plotBorderWidth: 0,
            plotShadow: false,
            borderRadius: 0
        },
        title: {
            text: 'No of Students',
            useHTML: true,
            style: {
                color: '#FFFFFF',
                fontWeight: 'bold'
            }
        },
        xAxis: {
            categories: ['Apr', 'May', 'Jun', 'Jul']
        },
        yAxis: {
            title: false
        },
        legend: false,
        tooltip: {
            enabled: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: '',
            data: [6, 13, 15, 9],
            size: '80%',
            color: '#FFFFFF'
        }]
    });
})
</script>