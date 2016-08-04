<?php

	function BCI_social_comms_widget() {
		register_widget( 'BCI_social_comms' );
	}
	add_action( 'widgets_init', 'BCI_social_comms_widget' );
	class BCI_social_comms extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_social_comms', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'social_comms', __( 'BCI Social Committee Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_social_committee',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_social_comms">';
				echo '<h2>Social Committee members</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_phd_forum_widget() {
		register_widget( 'BCI_phd_forum' );
	}
	add_action( 'widgets_init', 'BCI_phd_forum_widget' );
	class BCI_phd_forum extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_phd_forum', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'phd_forum', __( 'BCI PhD Forum Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_phd_forum',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_phd_forum">';
				echo '<h2>PhD Forum members</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_postdoc_reps_widget() {
		register_widget( 'BCI_postdoc_reps' );
	}
	add_action( 'widgets_init', 'BCI_postdoc_reps_widget' );
	class BCI_postdoc_reps extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_postdoc_reps', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'postdoc_reps', __( 'BCI Postdoc Reps Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_postdoc_rep',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_postdoc_reps">';
				echo '<h2>Postdoc Reps</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_postdoc_mentors_widget() {
		register_widget( 'BCI_postdoc_mentors' );
	}
	add_action( 'widgets_init', 'BCI_postdoc_mentors_widget' );
	class BCI_postdoc_mentors extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_postdoc_mentors', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'postdoc_mentors', __( 'BCI Postdoc Mentors Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_postdoc_mentor',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_postdoc_mentors">';
				echo '<h2>Postdoc Mentors</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_student_reps_widget() {
		register_widget( 'BCI_student_reps' );
	}
	add_action( 'widgets_init', 'BCI_student_reps_widget' );
	class BCI_student_reps extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_student_reps', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'student_reps', __( 'BCI Student Reps Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_student_reps',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_student_reps">';
				echo '<h2>Student Reps</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_exec_widget() {
		register_widget( 'BCI_exec' );
	}
	add_action( 'widgets_init', 'BCI_exec_widget' );
	class BCI_exec extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_exec', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'exec', __( 'BCI Exec Board Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_exec',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_exec">';
				echo '<h2>Exec Board members</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_bcc_it() {
		register_widget( 'BCI_bcc_it' );
	}
	add_action( 'widgets_init', 'BCI_bcc_it' );
	class BCI_bcc_it extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_exec', 'description' => __( 'Lists Social Committee', 'bci' ) );
			parent::__construct( 'exec', __( 'BCI BCC IT User Group Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'orderby'		=> 'meta_value',
				'meta_key'		=> '_me_dept',
				'order'			=> 'DESC',
				'meta_query' 	=> array(
					array(
						'key' 		=> '_me_bccit',
						'compare'	=> 'EXISTS'
					),
					array(
						'key' 		=> '_me_dept',
						'compare'	=> 'EXISTS'
					)
				)
			);
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget widget_exec">';
				echo '<h2>BCC IT User Group members</h2>';
				echo '<ul class="new-joiners">';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $department . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}

	function BCI_new_users_load_widget() {
		register_widget( 'BCI_Latest_Users' );
	}
	add_action( 'widgets_init', 'BCI_new_users_load_widget' );
	class BCI_Latest_Users extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_new_joiners', 'description' => __( 'Lists latest joiners', 'bci' ) );
			parent::__construct( 'new-joiners-widget', __( 'BCI New Joiners Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$args = array(
				'date_query' => array(
					array(
					'after' => '1 week ago',
					'inclusive' => true
				)
			));
			$wp_user_query = new WP_User_Query($args);
			$new_joiners = $wp_user_query->get_results();
			if (!empty($new_joiners)) {
				echo '<li class="widget new-joiners-widget">';
				echo '<h2>Staff Changes</h2>';
				echo '<ul class="new-joiners">';
				echo '<li>We welcome the following new starters:</li>';
				foreach ($new_joiners as $new_joiner) {
					$new_joiners_info = get_userdata($new_joiner->ID);
					$title = get_the_author_meta( 'title', $new_joiners_info->ID );
					$department = get_the_author_meta( 'department', $new_joiners_info->ID );
					echo '<li><a href="/author/' . $new_joiners_info->display_name . '/">' . $new_joiners_info->first_name . ' ' . $new_joiners_info->last_name . '</a> - ' . $new_joiners_info->description . '</li>';
				}
				echo '</ul>';
				echo '</li>';
			} else {
				echo '';
			}
		}
	}


	function BCI_subpages_load_widgets() {
		register_widget( 'BCI_Subpages_Widget' );

	}
	add_action( 'widgets_init', 'BCI_subpages_load_widgets' );
	class BCI_Subpages_Widget extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_subpages', 'description' => __( 'Lists current section subpages', 'bci' ) );
			parent::__construct( 'subpages-widget', __( 'BCI Subpages Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );
			$post_types = get_post_types( array( 'hierarchical' => true ) );
			if ( !is_singular( $post_types ) && !apply_filters( 'BCI_subpages_widget_display_override', false ) )
				return;
			global $post;
			$parents = array_reverse( get_ancestors( $post->ID, 'page' ) );
			$parents[] = $post->ID;
			$parents = apply_filters( 'BCI_subpages_widget_parents', $parents );
			$args = array(
				'child_of' => $parents[0],
				'parent' => $parents[0],
				'sort_column' => 'menu_order',
				'post_type' => get_post_type(),
			);
			$depth = 1;
			$subpages = get_pages( apply_filters( 'BCI_subpages_widget_args', $args, $depth ) );
			if ( empty( $subpages ) )
				return;
			echo $before_widget;
			global $BCI_subpages_is_first;
			$BCI_subpages_is_first = true;
			$title = esc_attr( $instance['title'] );
			if( 1 == $instance['title_from_parent'] ) {
				$title = get_the_title( $parents[0] );
				if( 1 == $instance['title_link'] )
					$title = '<a href="' . get_permalink( $parents[0] ) . '">' . apply_filters( 'BCI_subpages_widget_title', $title ) . '</a>';
			}
			if( !empty( $title ) )
				echo $before_title . $title . $after_title;
			if( !isset( $instance['deep_subpages'] ) )
				$instance['deep_subpages'] = 0;
			if( !isset( $instance['nest_subpages'] ) )
				$instance['nest_subpages'] = 0;
			$this->build_subpages( $subpages, $parents, $instance['deep_subpages'], $depth, $instance['nest_subpages'] );
			echo $after_widget;
		}
		function build_subpages( $subpages, $parents, $deep_subpages = 0, $depth = 1, $nest_subpages = 0 ) {
			if( empty( $subpages ) )
				return;
			global $post, $BCI_subpages_is_first;
			echo '<ul>';
			foreach ( $subpages as $subpage ) {
				$class = array();
				$class[] = 'menu-item-' . $subpage->ID;
				if ( $subpage->ID == $post->ID )
					$class[] = 'widget_subpages_current_page';
				if( $BCI_subpages_is_first )
					$class[] .= 'first-menu-item';
				$BCI_subpages_is_first = false;
				$class = apply_filters( 'BCI_subpages_widget_class', $class, $subpage );
				$class = !empty( $class ) ? ' class="' . implode( ' ', $class ) . '"' : '';
				echo '<li' . $class . '><a href="' . get_permalink( $subpage->ID ) . '">' . apply_filters( 'BCI_subpages_page_title', $subpage->post_title, $subpage ) . '</a>';
				if (!$nest_subpages)
					echo '</li>';
				do_action( 'BCI_subpages_widget_menu_extra', $subpage, $class );
				if ( $deep_subpages && in_array( $subpage->ID, $parents ) ) {
					$args = array(
						'child_of' => $subpage->ID,
						'parent' => $subpage->ID,
						'sort_column' => 'menu_order',
						'post_type' => get_post_type(),
					);
					$deeper_pages = get_pages( apply_filters( 'BCI_subpages_widget_args', $args, $depth ) );
					$depth++;
					$this->build_subpages( $deeper_pages, $parents, $deep_subpages, $depth, $nest_subpages );
				}
				if ($nest_subpages)
					echo '</li>';
			}
			echo '</ul>';
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = esc_attr( $new_instance['title'] );
			$instance['title_from_parent'] = (int) $new_instance['title_from_parent'];
			$instance['title_link'] = (int) $new_instance['title_link'];
			$instance['deep_subpages'] = (int) $new_instance['deep_subpages'];
			$instance['nest_subpages'] = (int) $new_instance['nest_subpages'];
			return $instance;
		}
		function form( $instance ) {
			$defaults = array( 'title' => '', 'title_from_parent' => 0, 'title_link' => 0, 'deep_subpages' => 0, 'nest_subpages' => 0 );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bci' );?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['title_from_parent'], 1 ); ?> id="<?php echo $this->get_field_id( 'title_from_parent' ); ?>" name="<?php echo $this->get_field_name( 'title_from_parent' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'title_from_parent' ); ?>"><?php _e( 'Use top level page as section title.', 'bci' );?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['title_link'], 1 ); ?> id="<?php echo $this->get_field_id( 'title_link' ); ?>" name="<?php echo $this->get_field_name( 'title_link' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'title_link' ); ?>"><?php _e( 'Make title a link', 'bci' ); echo '<br /><em>('; _e( 'only if "use top level page" is checked', 'bci' ); echo ')</em></label>';?>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['deep_subpages'], 1 ); ?> id="<?php echo $this->get_field_id( 'deep_subpages' ); ?>" name="<?php echo $this->get_field_name( 'deep_subpages' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'deep_subpages' ); ?>"><?php _e( 'Include the current page\'s subpages', 'bci' ); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['nest_subpages'], 1 ); ?> id="<?php echo $this->get_field_id( 'nest_subpages' ); ?>" name="<?php echo $this->get_field_name( 'nest_subpages' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'nest_subpages' ); ?>"><?php _e( 'Nest sub-page &lt;ul&gt; inside parent &lt;li&gt;', 'bci' ); echo '<br /><em>('; _e( "only if &quot;Include the current page's subpages&quot; is checked", 'bci' ); echo ')</em></label>';?></p>
			<?php
		}
	}