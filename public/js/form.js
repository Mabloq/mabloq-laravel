$('form.ajax').on('submit', function() {
	console.log("trigger");
	var data= {};
	that.find('[name]').each(function(){
		var el = $(this),
			name = el.attr('name'),
			value = el.val();
			
			data[name] = value;
			
	});
	
	$.ajax({
		
	})
	return false
});