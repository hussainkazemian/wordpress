<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'job-listing' ),
		'next_text' => esc_html__( 'Next page', 'job-listing' ),
	) );