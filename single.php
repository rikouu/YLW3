<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

<script type="text/javascript">
$.fn.postLike = function() {
	if ($(this).hasClass('done')) {
		alert('您已赞过本文章');
		return false;
	} else {
		$(this).addClass('done');
		var id = $(this).data("id"),
		action = $(this).data('action'),
		rateHolder = $(this).children('.count');
		var ajax_data = {
			action: "specs_zan",
			um_id: id,
			um_action: action
		};
		$.post("/wp-admin/admin-ajax.php", ajax_data,
		function(data) {
			$(rateHolder).html(data);
		});
		return false;
	}
};
$(document).on("click", ".specsZan",
	function() {
		$(this).postLike();
});
</script>


<?php
if ( post_is_in_under_category(129) ) {
include(TEMPLATEPATH . '/single/single-software.php');
}
else {
include(TEMPLATEPATH . '/single-all.php');
}
?>