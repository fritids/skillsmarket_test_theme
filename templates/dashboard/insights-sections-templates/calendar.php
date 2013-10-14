<div id="widget-insights-calendar" class="sm_widget">
	<header>Calendar</header>
	<div class="widget-content">
		<div id="calendar"></div>
	</div>
</div>

<script type="text/javascript">
jQuery(function($){
	$('#calendar').DatePicker({
		flat: true,
		date: ['2008-07-28','2008-07-31'],
		current: '2008-07-31',
		calendars: 1,
		mode: 'range',
		starts: 1
	});
})
</script>