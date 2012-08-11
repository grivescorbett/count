$(document).ready(function() {
	
	var refreshBoxContents = function(boxId)
	{
		$.getJSON('/count/index.php/count/getBoxItems/' + boxId, function(data)
		{
			$('.itemItem').remove();
			$.each(data, function(key, val) {
				$('#item_table tr:last').after('<tr class="boxItem" id="item:' + key + '"><td>' + val.count + '</td><td>' + val.upc + '</td><td>' + val.name + '</td></tr>');
			});
		});
	}
	
	var loadBoxes = function()
	{
		$.getJSON('/count/index.php/count/getBoxes', function(data)
		{
			$('.boxItem').remove();
			$('.itemItem').remove();
			$.each(data, function(key, val) {
				$('#box_table tr:last').after('<tr class="itemItem" id="box:' + key + '"><td>' + val.number + '</td><td>' + val.name + '</td></tr>');
				$('#box_table tr:last').click(function(e) {
					refreshBoxContents($(this).attr("id").split(":")[1]);
				});
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