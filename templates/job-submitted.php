<?php
global $wp_post_types;

switch ( $job->post_status ) :
	case 'publish' :
		printf( __( '%s listed successfully. To view your listing <a href="%s">click here</a>.', 'listings-jobs' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
	break;
	case 'pending' :
		printf( __( '%s submitted successfully. Your listing will be visible once approved.', 'listings-jobs' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
	break;
	default :
		do_action( 'listings_jobs_job_submitted_content_' . str_replace( '-', '_', sanitize_title( $job->post_status ) ), $job );
	break;
endswitch;

do_action( 'listings_jobs_job_submitted_content_after', sanitize_title( $job->post_status ), $job );