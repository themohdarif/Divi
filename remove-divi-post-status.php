function remove_divi_post_status( $post_states, $post ) {
		// Make sure that $post_states is an array. Third party plugin might modify $post_states and makes it null
		// which create various issue (i.e. Piklist + Having a page configured as a static page)
		if ( ! is_array( $post_states ) ) {
			$post_states = array();
		}

		if ( et_pb_is_pagebuilder_used( $post->ID ) ) {
			// Remove Divi if existing
			$key = array_search( 'Divi', $post_states );
			if ( false !== $key ) {
				unset( $post_states[ $key ] );
			}
		}

		return $post_states;
}
add_filter('display_post_states','remove_divi_post_status', 11, 2);
