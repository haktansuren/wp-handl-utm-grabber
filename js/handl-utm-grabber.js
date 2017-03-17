jQuery(function($) {
	$.each([ 'utm_source','utm_medium','utm_term', 'utm_content', 'utm_campaign', 'gclid', 'email', 'username' ], function( i,v ) {
		var curval = decodeURIComponent(Cookies.get(v))
		
		if (v == 'username') {
			//Maybe this should apply to all... We'll see...
			curval = curval.replace(/\+/g, ' ')
		}
		
		$('input[name=\"'+v+'\"]').val(curval)
		$('input#'+v).val(curval)
		$('input.'+v).val(curval)
	});
});