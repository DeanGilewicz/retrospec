<div class="container_search">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="container_search_input">
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'retrospec' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'retrospec' ); ?>" />
			<button type="submit" class="search-submit button">
				Go
			</button>
		</div>
	</form>
</div>