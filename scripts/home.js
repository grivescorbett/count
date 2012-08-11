$(document).ready(function() {
	
	var refreshBoxContents = function(boxId)
	{
		$.getJSON('/count/index.php/count/getBoxItems/' + boxId, function(data)
		{
			$('.itemItem').remove();
			$.each(data, function(key, val) {
				$('#item_table tr:last').after('<tr class="itemItem" id="item:' + key + '"><td>' + val.count + '</td><td>' + val.upc + '</td><td>' + val.name + '</td></tr>');
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
				$('#box_table tr:last').after('<tr class="boxItem" id="box:' + key + '"><td>' + val.number + '</td><td>' + val.name + '</td></tr>');
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
	
	var searchUpc = function(upc)
	{
		var rval = {'key': -1,'val': -1};
		$.each(upcCache, function(key, val) {
			if (String(val.upc).indexOf(String(upc)) == 0)
			{
				rval = {'key': key, 'val': val};
				return false;
			}
		});
		return rval
	}
	
	var searchName = function(upc)
	{
		var rval = {'key': -1,'val': -1};
		$.each(upcCache, function(key, val) {
			if (String(val.name).indexOf(String(upc)) == 0)
			{
				rval = {'key': key, 'val': val};
				return false;
			}
		});
		return rval
	}
	
	$('#newItemUPC').keyup(function(event){
		if (event.which == 13) {
			event.preventDefault();
		}
		else if (event.which == 8)
		{
			
		}
		else
		{
			var foundUpc = searchUpc($('#newItemUPC').val());
			
			if (foundUpc.key != -1)
			{
				var idx = $('#newItemUPC').val().length;
				
				$('#newItemUPC').val(foundUpc.val.upc);
				$('#newItemDescription').val(foundUpc.val.name);
				
				var len = $('#newItemUPC').val().length;
				
				$('#newItemUPC').focus();
				$('#newItemUPC').setSelection(idx,  len);
			}
			else
			{
				$('#newItemDescription').val("");
			}
		}
	});
	
	$('#newItemDescription').keyup(function(event){
		if (event.which == 13) {
			event.preventDefault();
		}
		else if (event.which == 8)
		{
			
		}
		else
		{
			var foundName = searchName($('#newItemDescription').val());
			
			if (foundName.key != -1)
			{
				var idx = $('#newItemDescription').val().length;
				
				$('#newItemUPC').val(foundName.val.upc);
				$('#newItemDescription').val(foundName.val.name);
				
				var len = $('#newItemDescription').val().length;
				
				$('#newItemDescription').focus();
				$('#newItemDescription').setSelection(idx,  len);
			}
			else
			{
				$('#newItemUPC').val("");
			}
		}
	});
	
	var upcCache;
	$.getJSON('/count/index.php/count/getItemCache', function(data)
	{
		upcCache = data;
		loadBoxes();
	});
});