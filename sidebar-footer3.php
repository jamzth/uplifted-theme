<?php
/**
 * The sidebar containing the first footer widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package Uplifted
 * @since 1.0
 */
?>

<?php if ( is_active_sidebar( 'uplifted-footer-column-three' ) ) : ?>

	<?php dynamic_sidebar( 'uplifted-footer-column-three' ); ?>

<?php else:

	the_widget('WP_Widget_Meta');

endif; ?>