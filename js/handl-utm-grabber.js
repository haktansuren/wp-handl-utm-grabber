jQuery(function($) {
	$.each([ 'utm_source','utm_medium','utm_term', 'utm_content', 'utm_campaign', 'gclid' ], function( i,v ) {
		$('input[name=\"'+v+'\"]').val(Cookies.get(v))
		$('input#'+v).val(Cookies.get(v))
		$('input.'+v).val(Cookies.get(v))
	});
});