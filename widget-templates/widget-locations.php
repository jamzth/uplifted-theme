<?php/** * Locations Widget Template * * Produces output for appropriate widget class in framework. * $this, $instance (sanitized field values) and $args are available. * * $this->ctfw_get_posts() can be used to produce a query according to widget field values. */// No direct accessif ( ! defined( 'ABSPATH' ) ) exit;// HTML Beforeecho $args['before_widget'];// Title$title = apply_filters( 'widget_title', $instance['title'] );if ( ! empty( $title ) ) {	echo $args['before_title'] . $title . $args['after_title'];}// Get posts$posts = $this->ctfw_get_posts(); // widget's default query according to field values// Loop Posts$i = 0;foreach ( $posts as $post ) : setup_postdata( $post ); $i++;	// Get location meta data	// $address, $show_directions_link, $directions_url, $phone, $times, $map_lat, $map_lng, $map_type, $map_zoom	extract( ctfw_location_data() );?>	<article <?php post_class( 'uplifted-widget-entry uplifted-location-widget-entry uplifted-clearfix' . ( 1 == $i ? ' uplifted-widget-entry-first' : '' ) ); ?>>		<header class="uplifted-clearfix">			<?php if ( $instance['show_image'] && has_post_thumbnail() ) : ?>				<div class="uplifted-widget-entry-thumb">					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'uplifted-thumb-small', array( 'class' => 'uplifted-image' ) ); ?></a>				</div>			<?php endif; ?>			<h1 class="uplifted-widget-entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>			<ul class="uplifted-widget-entry-meta uplifted-clearfix">				<?php if ( $instance['show_address'] && $address ) : ?>					<li class="uplifted-locations-widget-entry-address">						<?php echo nl2br( esc_html( $address ) ); ?>					</li>				<?php endif; ?>				<?php if ( $instance['show_phone'] && $phone ) : ?>					<li class="uplifted-locations-widget-entry-phone">						<?php echo esc_html( $phone ); ?>					</li>				<?php endif; ?>				<?php if ( $instance['show_times'] && $times ) : ?>					<li class="uplifted-locations-widget-entry-times">						<?php echo nl2br( wptexturize( $times ) ); ?>					</li>				<?php endif; ?>			</ul>		</header>		<?php		if ( $instance['show_map'] && $google_map = ctfw_google_map( array(			'latitude'	=> get_post_meta( $post->ID , '_ctc_location_map_lat' , true ),			'longitude'	=> get_post_meta( $post->ID , '_ctc_location_map_lng' , true ),			'type'		=> get_post_meta( $post->ID , '_ctc_location_map_type' , true ),			'zoom'		=> get_post_meta( $post->ID , '_ctc_location_map_zoom' , true )		) ) ) :		?>		<div class="uplifted-locations-widget-entry-map uplifted-clearfix">			<?php echo $google_map; ?>		</div>		<?php endif; ?>		<?php if ( get_the_excerpt() && ! empty( $instance['show_excerpt'] )): ?>			<div class="uplifted-widget-entry-content">				<?php the_excerpt(); ?>			</div>		<?php endif; ?>	</article><?php// End Loopendforeach;// No items foundif ( empty( $posts ) ) {	?>	<div>		<?php _ex( 'There are no locations to show.', 'locations widget', 'uplifted' ); ?>	</div>	<?php}// HTML Afterecho $args['after_widget'];