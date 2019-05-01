<?php
/**
 * Widget Name: Bean Portfolio Menu
 */

// Register widget
add_action('widgets_init', create_function('', 'return register_widget("Bean_Portfolio_Menu_Widget");'));

class Bean_Portfolio_Menu_Widget extends WP_Widget 
{
	// Constructor
	function __construct() {
		parent::__construct(
			'bean_portfolio_menu', // Base ID
			__( 'Portfolio Menu', 'charmed' ), // Name
			array( 'description' => __( 'A custom loop of portfolio posts.', 'charmed' ), ) // Args
		);
	}
		
	// Display widget
	function widget( $args, $instance ) 
	{
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		$desc = $instance['desc'];
		$postcount = $instance['postcount'];
		$loop = $instance['loop'];
		
		// Before widget
		echo $before_widget;
		
		if ( $title ) echo balanceTags($before_title) . esc_html($title) . balanceTags($after_title); 
		
		if($desc != '') {
			echo '<p>' . balanceTags($desc) . '</p>';
		} ?>
		
		<ul>
		
		<?php
		//Variable
		if( $loop != '' ) {
		    switch ( $loop ) {
		        case 'Most Recent': 
		        	$orderby = 'date';
		        	$meta_key = ''; 
		        	break;
		        case 'Random': 
		        	$orderby = 'rand';
		        	$meta_key = ''; 
		       		break;
			}
		}
			
		$args = array(
		'post_type' 	=> 'portfolio',
		'order' 		=> 'DSC',
		'orderby'       => $orderby,
		'meta_key'      => $meta_key,
		'posts_per_page'=> $postcount,
		); 
		query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		?>
		
			<li>
				<a title="<?php printf(__('Permanent Link to %s', 'charmed'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
					<?php echo get_the_title(); ?>
				</a>
			</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>
			
		</ul>
		
		<?php
		// After widget
		echo $after_widget;
	}
	
	// Update widget
	function update( $new_instance, $old_instance ) 
	{
		$instance = $old_instance;
		
		// Strip tags
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		$instance['loop'] = $new_instance['loop'];
		$instance['postcount'] = $new_instance['postcount'];
	
		return $instance;
	}
		
	// Display widget
	function form( $instance ) 
	{
		$defaults = array(
			'title' => '',
			'desc' => '',
			'postcount' => '',
			'loop' => '',
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if (!is_plugin_active('bean-portfolio/bean-portfolio.php')) { ?>
			<div class="bean-widget-notification">
				<p><?php _e('Please download & install the <b>Bean Portfolio</b> WordPress plugin to properly display this widget.', 'charmed') ?><br/>
				<a href="<?php echo BEAN_PORTFOLIO_PLUGIN_URL; ?>" target="_blank" class="button button-secondary"><?php _e('Bean Portfolio &rarr;', 'charmed') ?></a></p>
			</div>
		<?php } ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'charmed') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p style="margin-top: -8px;">
		<textarea class="widefat" rows="5" cols="15" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo $instance['desc']; ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Posts: (-1 for Infinite)', 'charmed') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'loop' ); ?>"><?php _e('Portfolio Loop:', 'charmed') ?></label>
		<select id="<?php echo $this->get_field_id( 'loop' ); ?>" name="<?php echo $this->get_field_name( 'loop' ); ?>" class="widefat">
			<option <?php if ( 'Most Recent' == $instance['loop'] ) echo 'selected="selected"'; ?>>Most Recent</option>
			<option <?php if ( 'Random' == $instance['loop'] ) echo 'selected="selected"'; ?>>Random</option>	
		</select>
		</p>
	<?php
	} //END form
} //END class