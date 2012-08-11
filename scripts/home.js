$(document).ready(function() {
	var loadBoxes = function()
	{
		$.getJSON('/count/index.php/count/getBoxes', function(data)
		{
			$('.boxItem').remove();
			$.each(data, function(key, val) {
				$('#box_table tr:last').after('<tr class="boxItem" id="box:' + key + '"><td>' + val.name + '</td><td>' + val.number + '</td></tr>');
			});
		});
	}
	
	var addBox = function()
	{
		boxName = $('#newBoxName').val();
		boxNumber = $('#newBoxNumber').val();
		$.post('/count/index.php/count/addBox', {name: boxName, number: boxNumber}, function(data)
		{
			if (data != "yay")
			{
				alert("Something bad happened");
			}
			else
			{
				loadBoxes();
			}
		});
	}
	
	$('#newBoxName').keydown(function(event){
		if (event.which == 13) {
			event.preventDefault();
			addBox();
		}
	})
	
	$('#newBoxNumber').keydown(function(event){
		if (event.which == 13) {
			event.preventDefault();
			addBox();
		}
	})
	
	$('#new_box').click(function(e) {
		e.preventDefault();
		$('#add_box').toggleClass()
	});
	
	loadBoxes();
});