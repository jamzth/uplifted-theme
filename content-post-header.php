<?php
/**
 * Post Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<header class="uplifted-entry-header uplifted-clearfix">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="uplifted-entry-image">
			<?php uplifted_post_image(); ?>
		</div>
	<?php endif; ?>

	<div class="uplifted-entry-title-meta">

		<?php if ( ctfw_has_title() ) : // might be Status Update with no title ?>
			<h1 class="uplifted-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> uplifted-main-title<?php endif; ?>">
				<?php uplifted_post_title(); // will be linked on short ?>
			</h1>
		<?php endif; ?>

		<ul class="uplifted-entry-meta">

			<li class="uplifted-entry-date uplifted-content-icon">
				<span class="<?php uplifted_icon_class( 'entry-date' ); ?>"></span>
				<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php ctfw_post_date(); ?></time>
			</li>

			<li class="uplifted-entry-byline uplifted-content-icon">
				<span class="<?php uplifted_icon_class( 'entry-byline' ); ?>"></span>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
			</li>

			<?php if ( $categories = get_the_category_list( __( ', ', 'uplifted' ) ) ) : ?>
				<li class="uplifted-entry-category uplifted-content-icon">
					<span class="<?php uplifted_icon_class( 'entry-category' ); ?>"></span>
					<?php echo $categories; ?>
				</li>
			<?php endif; ?>

			<?php if ( uplifted_show_comments() ) : ?>
				<li class="uplifted-entry-comments-link uplifted-content-icon">
					<span class="<?php uplifted_icon_class( 'comments-link' ); ?>"></span>
					<?php uplifted_comments_link(); ?>
				</li>
			<?php endif; ?>

		</ul>

	</div>

</header>
