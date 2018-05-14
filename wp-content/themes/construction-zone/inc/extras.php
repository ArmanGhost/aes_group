<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'construction_zone_customize_search_form' ) ) :

	function construction_zone_customize_search_form() {

		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="search-box">
				<h3 class="sidebar-search-title">' . _x( 'Search', 'label', 'construction-zone' ) . '</h3>
				<div class="input-group stylish-input-group">
					<input type="text" class="form-control"  placeholder="' . esc_attr_x( 'Type to search here...', 'placeholder', 'construction-zone' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'construction-zone' ) . '" />
					<span class="input-group-addon">
						 <button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						  </button>  
					</span>
				 </div>
			 </div>
		 </form>';

		return $form;

	}
	
	endif;

add_filter( 'get_search_form', 'construction_zone_customize_search_form', 15 );
?>
