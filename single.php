<?php
if ( post_is_in_under_category(17) ) {
include(TEMPLATEPATH . '/single/single-software.php');
}
else {
include(TEMPLATEPATH . '/single-all.php');
}
?>