<div id="widget-age-demographic" class="sm_widget">
	<div class="widget-content">
		<div id="age-demographic-chart">

		</div>
		<div class="age-demographic-legend">
			<div class="age">
				<span class="range">5 - 10</span>
				<span class="percent">45%</span>
			</div>
			<div class="age">
				<span class="range">11 - 14</span>
				<span class="percent">26.8%</span>
			</div>
			<div class="age">
				<span class="range">15 - 24</span>
				<span class="percent">12.8%</span>
			</div>
			<div class="age">
				<span class="range">25 - 30</span>
				<span class="percent">8.5%</span>
			</div>
			<div class="age">
				<span class="range">31 - 40</span>
				<span class="percent">6.9%</span>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function () {
	// Radialize the colors
	Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
		return {
			radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
			stops: [
				[0, color],
				[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
			]
		};
	});

	// Build the chart
	$('#age-demographic-chart').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			width: 270,
			height: 315,
			backgroundColor: '#df8127',
			spacingTop: 15
		},
		title: {
			text: 'Age Demographic',
			style: {
				color: '#FFFFFF',
				fontWeight: 'bold',
			}
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: false
			}
		},
		series: [{
			type: 'pie',
			name: 'Percentage',
			data: [
				['5 - 10', 45.0],
				['11 - 14', 26.8],
				{
					name: '15 - 24',
					y: 12.8,
					sliced: true,
					selected: true
				},
				['25 - 30',    8.5],
				['31 - 40',     6.9]
			]
		}]
	});
});
</script>