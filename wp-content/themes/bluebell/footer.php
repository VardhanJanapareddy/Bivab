<?php
/**
 * Footer Main File.
 *
 * @package BLUEBELL
 * @author  Theme Arc
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php bluebell_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>


</div>
<!--End Page Wrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"><a href="# " class="back-to-top " data-wow-duration="1.0s " data-wow-delay="1.0s "><i class="fas fa-arrow-up"></i></a></div>

<?php wp_footer(); ?>
</body>
</html>
