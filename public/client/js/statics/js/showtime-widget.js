$(document).ready(function(){
	$("#widget-movie").on('change', function(){
		$("#widget-time").popover('destroy');
		$(".loading").removeClass('hidden')
		$.ajax({
			url: url_get_showtime_data,
			type: 'POST',
			data: {movie_id: $("#widget-movie").val()},
			dataType: 'JSON',
			success: function(data){
				var options = '<option>Chọn Ngày</option>'
				for(var i in data){
					options += '<option value="' + data[i].value + '">' + data[i].text + '</option>'
				}
				$("#widget-date").html(options)
				$("#widget-time").html('<option>Chọn Suất</option>')

				$(".loading").addClass('hidden')
			}
		})
	})
	$("#widget-date").on('change', function(){
		$("#widget-time").popover('destroy');
		if($(this).val() == 'Chọn Ngày')
			return
		$(".loading").removeClass('hidden')
		$(this).popover('show')
		$.ajax({
			url: url_get_showtime_data,
			type: 'POST',
			data: {movie_id: $("#widget-movie").val(), type: 'time', date: $("#widget-date").val()},
			dataType: 'JSON',
			success: function(data){
				var options = '<option>Chọn Suất</option>'
				for(var i in data.options){
					options += '<option value="' + data.options[i].value + '">' + data.options[i].text + '</option>'
				}

				$("#widget-time").html(options)				
				$(".loading").addClass('hidden')
			}
		})
	})

	$(".widget-ticket .showtime").on('click', function(e){
		if($("#widget-movie").val() != 'Chọn Phim' && $("#widget-date").val() != 'Chọn Ngày'){
			$(this).popover('show')
		}
	})

	$("body").on('click', 'a.btn-widget-showtime', function(){
		$("#widget-time").val($(this).data('id'))
	})

	$(".widget-buy").on('click', function(){
		if($("#widget-time").val() != '' && $("#widget-time").val() != 'Chọn Suất')
			window.location = url_dat_ve + $("#widget-time").val()
	});
})