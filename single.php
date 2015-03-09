<?php
if ( post_is_in_under_category(14) ) {
include(TEMPLATEPATH . '/single/single-news.php');
}
else {
include(TEMPLATEPATH . '/single-all.php');
}
?>