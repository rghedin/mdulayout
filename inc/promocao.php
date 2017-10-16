<?php

// https://github.com/J7mbo/twitter-api-php
include( 'TwitterAPIExchange.php' );

add_action( 'save_post', 'mdu_promocao_twitter_update', 10, 3 );
function mdu_promocao_twitter_update( $post_id, $post, $update ) {

	// Aborta se é revisão
	if ( wp_is_post_revision( $post_id )  ) {
		return;
	}

	// Aborta se não é promoção
	if ( 'promocao' != $post->post_type ) {
		return;
	}

	// Aborta se não é post publicado (rascunho, private, etc)
	if ( 'publish' != get_post_status( $post_id ) ) {
		return;
	}

	$settings = array(
		'oauth_access_token' => "3398958028-EZwvRTFBVsCZKteZMW6XEVg3AxnCDqn219TBLPw",
		'oauth_access_token_secret' => "iDsJepMdlOh3ObBKmLxeI00y4lPJ3KkeWIzBT396CpuuN",
		'consumer_key' => "dxo1CC2VZ56mKoE7HXz1QktU0",
		'consumer_secret' => "IxY3S0rSPUSvLuLkWJNc1W3z3CVk45AZbNvjCYYs0KstgJETII"
		);

	// Dados de teste do Twitter do Vitor
	// $settings = array(
	// 	'oauth_access_token' => "439433279-QUvEnrYOXuT5alqM6y7F5PzclgEmmSkwSUPgCALh",
	// 	'oauth_access_token_secret' => "Pgt4nb5RjVqBKwV6dSxfvxo5Y6oqdqtdGeqbL9JT7Rvjs",
	// 	'consumer_key' => "okLSdY9tcEp16OCnm7lYM0RzA",
	// 	'consumer_secret' => "XVdNG4dw3bevJ8r5wzkJ6102tciypR6qjM4xT2pcHv7NrUss5X"
	// 	);

	$url = 'https://api.twitter.com/1.1/statuses/update.json';
	$requestMethod = 'POST';

	$postfields = array( 'status' => str_replace( '&#8243;', '"', get_the_title( $post_id ) ) . ' de R$ ' . mdu_get_meta( 'mdu_preco_original' ) . ' por R$ ' . mdu_get_meta( 'mdu_preco_promocao' ) . ' em ' . get_the_permalink( $post_id ) );

	$twitter = new TwitterAPIExchange($settings);
	echo $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();

}

// Add chart javascript to footer (some room to improvement right there, maybe ajaxifying)
add_action( 'wp_footer', 'mdu_js_chart_footer' );
function mdu_js_chart_footer() { if ( is_singular( 'promocao' ) ) : ?>

<?php $mdu_chart_labels = explode( '|', mdu_get_meta( 'mdu_chart_labels' ) ); ?>
<?php $mdu_chart_data   = explode( '|', mdu_get_meta( 'mdu_chart_data' ) );   ?>

<script>
	var lineChartData = {
		labels : [<?php foreach ( $mdu_chart_labels as $m ) echo "\"$m\","; ?>],
		datasets : [
		{
			label: "<?php the_title(); ?>",
			fillColor : "rgba(151,187,205,0.2)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			pointHighlightFill : "#fff",
			pointHighlightStroke : "rgba(151,187,205,1)",
			data : [<?php foreach ( $mdu_chart_data as $m ) echo "\"$m\","; ?>]
		}
		]
	}
	jQuery(window).load(function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
			tooltipTemplate: "<%if (label){%><%=label%>: <%}%>R$ <%= value %>",
			bezierCurve : false,
		});
	});
</script>

<?php
endif;
}

/* 20150810 - Vitor Paladini  */

add_action( 'wp_enqueue_scripts', 'mdu_promocao_scripts' );
function mdu_promocao_scripts() {
	if ( is_singular( 'promocao' ) ) {
		wp_enqueue_script( 'mdu-chart-js', get_template_directory_uri() . '/js/Chart.min.js', array(), '', false );
	}
}

// Register post types

add_action( 'init', 'mdu_registerPostType', 0 );
function mdu_registerPostType() {

	$labels = array(
		'name'                => _x( 'Promoções', 'Post Type General Name', 'manual_do_usuario' ),
		'singular_name'       => _x( 'Promoção', 'Post Type Singular Name', 'manual_do_usuario' ),
		'menu_name'           => __( 'Promoções', 'manual_do_usuario' ),
		'name_admin_bar'      => __( 'Promoção', 'manual_do_usuario' ),
		'parent_item_colon'   => __( 'Promoção Mãe', 'manual_do_usuario' ),
		'all_items'           => __( 'Todas as Promoções', 'manual_do_usuario' ),
		'add_new_item'        => __( 'Adicionar Promoção', 'manual_do_usuario' ),
		'add_new'             => __( 'Adicionar', 'manual_do_usuario' ),
		'new_item'            => __( 'Nova Promoção ', 'manual_do_usuario' ),
		'edit_item'           => __( 'Editar Promoção', 'manual_do_usuario' ),
		'update_item'         => __( 'Atualizar Promoção', 'manual_do_usuario' ),
		'view_item'           => __( 'Ver Promoção', 'manual_do_usuario' ),
		'search_items'        => __( 'Buscar Promoção', 'manual_do_usuario' ),
		'not_found'           => __( 'Não Encontrado', 'manual_do_usuario' ),
		'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'manual_do_usuario' ),
		);
	$args = array(
		'label'               => __( 'promocao', 'manual_do_usuario' ),
		'description'         => __( 'Promoções Manual do Usuário', 'manual_do_usuario' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-cart',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'comprar', 'with_front' => false ),
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capabilities' => array(
			'edit_post'          => 'edit_promo',
			'read_post'          => 'read_promo',
			'delete_post'        => 'delete_promo',
			'edit_posts'         => 'edit_promos',
			'edit_others_posts'  => 'edit_others_promos',
			'publish_posts'      => 'publish_promos',
			'read_private_posts' => 'read_private_promos',
			'create_posts'       => 'edit_promos',
			),
		);

	register_post_type( 'promocao', $args );
}

add_role(
	'promo_editor',
	'Editor de Promoções',
	array(
		'publish_promo' => true,
		'edit_promo' => true,
		'read_promo' => true,
		'delete_promo' => true,
		'edit_promos' => true,
		'edit_others_promos' => true,
		'publish_promos' => true,
		'read_private_promos' => true,
		'edit_promos' => true,
		'read' => true,
		'edit_posts' => false,
		'delete_posts' => false,
		'publish_posts' => false,
		'upload_files' => true,
		)
);

add_action( 'admin_init', 'add_theme_caps');
function add_theme_caps() {
    // gets the author role
    $role = get_role( 'administrator' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'publish_promo' ); 
    $role->add_cap( 'edit_promo' ); 
    $role->add_cap( 'read_promo' ); 
    $role->add_cap( 'delete_promo' ); 
    $role->add_cap( 'edit_promos' ); 
    $role->add_cap( 'edit_others_promos' ); 
    $role->add_cap( 'publish_promos' ); 
    $role->add_cap( 'read_private_promos' ); 
    $role->add_cap( 'edit_promos' ); 
}

add_action('pre_get_posts','mdu_order_promocao_modified');
function mdu_order_promocao_modified($qry) {
	if ( $qry->is_main_query() && is_archive( 'promocao' ) ) {
		$qry->set('orderby','modified');
	}
}

//  http://jeremyhixon.com/tool/wordpress-meta-box-generator/
function mdu_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

add_action( 'add_meta_boxes', 'mdu_add_meta_box' );
function mdu_add_meta_box() {
	add_meta_box(
		'fields_promocao',
		__( 'Campos extras de Promoção', 'mdu' ),
		'mdu_html',
		'promocao',
		'normal',
		'default'
		);
}
function mdu_html( $post) {
	wp_nonce_field( '_mdu_nonce', 'mdu_nonce' ); ?>

	<div class="input-row">
		<label for="mdu_preco_original"><strong><?php _e( 'Preço Original', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_preco_original" id="mdu_preco_original" value="<?php echo mdu_get_meta( 'mdu_preco_original' ); ?>">
	</div>
	<div class="input-row">
		<label for="mdu_preco_promocao"><strong><?php _e( 'Preço Promocional', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_preco_promocao" id="mdu_preco_promocao" value="<?php echo mdu_get_meta( 'mdu_preco_promocao' ); ?>">
	</div>
	<div class="input-row">
		<label for="mdu_chart_labels"><strong><?php _e( 'Labels do gráfico', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_chart_labels" id="mdu_chart_labels" value="<?php echo mdu_get_meta( 'mdu_chart_labels' ); ?>">
	</div>
	<div class="input-row">
		<label for="mdu_chart_data"><strong><?php _e( 'Valores de cada label', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_chart_data" id="mdu_chart_data" value="<?php echo mdu_get_meta( 'mdu_chart_data' ); ?>">
	</div>
	<div class="input-row">
		<label for="mdu_link"><strong><?php _e( 'Link', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_link" id="mdu_link" value="<?php echo mdu_get_meta( 'mdu_link' ); ?>">
	</div>
	<div class="input-row">
		<label for="mdu_agradecimento"><strong><?php _e( 'Agradecimento', 'mdu' ); ?></strong></label><br>
		<input type="text" name="mdu_agradecimento" id="mdu_agradecimento" value="<?php echo mdu_get_meta( 'mdu_agradecimento' ); ?>">
	</div>

	<?php
}

add_action( 'save_post', 'mdu_save' );
function mdu_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['mdu_nonce'] ) || ! wp_verify_nonce( $_POST['mdu_nonce'], '_mdu_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['mdu_preco_promocao'] ) )
		update_post_meta( $post_id, 'mdu_preco_promocao', esc_attr( $_POST['mdu_preco_promocao'] ) );
	if ( isset( $_POST['mdu_preco_original'] ) )
		update_post_meta( $post_id, 'mdu_preco_original', esc_attr( $_POST['mdu_preco_original'] ) );
	if ( isset( $_POST['mdu_link'] ) )
		update_post_meta( $post_id, 'mdu_link', esc_attr( $_POST['mdu_link'] ) );
	if ( isset( $_POST['mdu_agradecimento'] ) )
		update_post_meta( $post_id, 'mdu_agradecimento', esc_attr( $_POST['mdu_agradecimento'] ) );
	if ( isset( $_POST['mdu_chart_labels'] ) )
		update_post_meta( $post_id, 'mdu_chart_labels', esc_attr( $_POST['mdu_chart_labels'] ) );
	if ( isset( $_POST['mdu_chart_data'] ) )
		update_post_meta( $post_id, 'mdu_chart_data', esc_attr( $_POST['mdu_chart_data'] ) );
}

// Register taxonomy for promocao
add_action( 'init', 'mdu_custom_taxonomy', 0 );
function mdu_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tags (Promoção)', 'Taxonomy General Name', 'mdu' ),
		'singular_name'              => _x( 'Tag (Promoção)', 'Taxonomy Singular Name', 'mdu' ),
		'menu_name'                  => __( 'Tags (Promoção)', 'mdu' ),
		'all_items'                  => __( 'Todas as Tags', 'mdu' ),
		'parent_item'                => __( '', 'mdu' ),
		'parent_item_colon'          => __( '', 'mdu' ),
		'new_item_name'              => __( 'Nova Tag', 'mdu' ),
		'add_new_item'               => __( 'Adicionar Tag', 'mdu' ),
		'edit_item'                  => __( 'Editar Tag', 'mdu' ),
		'update_item'                => __( 'Atualizar Tag', 'mdu' ),
		'view_item'                  => __( 'Ver Tag', 'mdu' ),
		'separate_items_with_commas' => __( 'Separar Tags com vírgulas', 'mdu' ),
		'add_or_remove_items'        => __( 'Adicionar ou Remover Tags', 'mdu' ),
		'choose_from_most_used'      => __( 'Escolher Mais Utilizada', 'mdu' ),
		'popular_items'              => __( 'Tags Populares', 'mdu' ),
		'search_items'               => __( 'Buscar Tags', 'mdu' ),
		'not_found'                  => __( '', 'mdu' ),
		);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		);

	register_taxonomy( 'tagpromocao', array( 'promocao' ), $args );

}

function mdu_get_the_desconto ( $regular, $sale ) {
	$preco_original = intval( str_replace( array('.' , ','), array('', '.'), $regular ) );
	$preco_promocao = intval( str_replace( array('.' , ','), array('', '.'), $sale ) );
	return round( ( ( $preco_original - $preco_promocao ) / $preco_original ) * 100 );
}

function mdu_the_desconto ( $regular, $sale ) {
	echo mdu_get_the_desconto( $regular, $sale ) . '%';
}

add_action( 'admin_enqueue_scripts', 'mdu_admin_styles' );
function mdu_admin_styles() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
