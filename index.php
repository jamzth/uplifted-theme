<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Amplify
 * @since 1.0.0
 */

get_header(); ?>

  <div id="main">

    <div id="content">

		<?php if( have_posts() ): while( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; else: ?>

    <?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

    <?php amplify_pagination(); ?>

    </div><!-- /#content -->

	  <?php get_sidebar() ?>

  </div><!-- /#main -->

<?php get_footer() ?>