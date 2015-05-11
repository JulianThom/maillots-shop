$(document).ready(function(){
console.log(base_url);
	$('#raty').raty({score:scoreCommentaire, number: 5, path:base_url+"assets/js/raty-2.7.0/lib/images", scoreName: 'note'});

	function getRaty(){
		$('.ratyCommentaire').raty({
			path:base_url+"assets/js/raty-2.7.0/lib/images",
			score: function() {
				return $(this).attr('data-number');
			}, number: 5, readOnly: true 
		});
	}
	getRaty();
});