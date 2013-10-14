<div id="widget-profile-views" class="sm_widget">
	<div class="widget-content">
		<div id="profile_views_chart" style="max-width: 300px; width: 300px; height: 400px; max-height: 400px; margin: 0"></div>
	</div>
</div>

<script type="text/javascript">
jQuery(function ($) {

	/*################## PROFILE VIEWS ###################*/
	var colors = Highcharts.getOptions().colors,
		categories = ['W. Green', 'Battersea', 'Rainham', 'Romford'],
		name = 'View Locations',
		data = [{
			y: 55.11,
			color: colors[0]
		}, {
			y: 21.63,
			color: colors[1]
		}, {
			y: 11.94,
			color: colors[2]
		}, {
			y: 7.15,
			color: colors[3]
		}];

	// Build the data arrays
	var profileViewsData = [];

	for (var i = 0; i < data.length; i++) {

	// add browser data
		profileViewsData.push({
			name: categories[i],
			y: data[i].y,
			color: data[i].color,
			background: data[i].color
		});
	}

	// Create the chart
	$('#profile_views_chart').highcharts({
		chart: {
			type: 'pie',
			backgroundColor: '#df8127',
			margin: [0, 0, 0, 0],
			spacing: [15, 0, 0, 0],
			plotBorderWidth: 0,
			plotShadow: false,
			marginBottom: 70
		},
		title: {
			text: 'Profile Views',
			useHTML: true,
			style: {
				color: '#FFFFFF',
				fontWeight: 'bold'
			}
		},
		legend: {
			//width: 300,
			floating: true,
			align: 'center',
			width: 300,
			useHTML: true,
			backgroundColor: '#7f6c72',
			borderRadius: 0,
			borderWidth: 0,
			maxHeight: 70,
			itemDistance: 1,
			padding: 0,
			itemStyle: {
				cursor: 'pointer',
				color: '#274b6d',
				//border: '4px solid '+this.color,
				position: 'relative',
				display: 'block',
				float: 'left',
				height: '70px',
				fontSize: '12px',
				width: '75px',
				padding: 0,
				verticalAlign: 'middle'
			}
		},
		yAxis: {
			title: false
		},
		plotOptions: {
			pie: {
				shadow: false,
				center: ['50%', '50%'],
				showInLegend: true
			}
		},
		tooltip: false,
		series: [{
			name: 'Profile Views',
			data: profileViewsData,
			size: '80%',
               innerSize: '50%',
			dataLabels: {
				formatter: function() {
					return this.y > 5 ? this.point.name : null;
				},
				color: 'transparent',
				distance: -9999
			}
		}]
	});
});
jQuery(document).ready(function($) {
	var container = $('#profile_views_chart .highcharts-legend');
	var legend_item = container.find('.highcharts-legend-item');
	//var 

	var items = legend_item.find('span');
	var background;
	background = items.css('fill');
	items.attr('data-border-color',background).css({
		//borderTop: '4px solid '+background
	});
});

</script>