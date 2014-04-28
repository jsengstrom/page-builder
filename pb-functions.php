<?php  
  // Declare sidebar widget zones
  function sidebar_widgets_init() {
  	
  	// Generate custom sidebars using ACF
	  if ( get_field( 'sidebars', 'option' ) ){
      while ( has_sub_field( 'sidebars', 'option' ) ){
        $sidebar_name = get_sub_field( 'sidebar_name', 'option' );
        $sidebar_id = str_replace( " ", "-", $sidebar_name );
        $sidebar_id = strtolower( $sidebar_id );
        register_sidebar(
          array(
            'name' => $sidebar_name,
            'id' => $sidebar_id,
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
          )
        );
      }
	  }
  };
  
  add_action( 'widgets_init', 'sidebar_widgets_init' );


  //Sidebar Choices - Page Builder
  function my_acf_load_sidebar( $field ) {
    $field['choices'] = array();
    $field['choices']['default-sidebar'] = 'Default Sidebar';
    $field['choices']['none'] = 'No Sidebar';
    
    if(get_field('sidebars', 'option')) {
      while(has_sub_field('sidebars', 'option')) {
        
        $label = get_sub_field('sidebar_name');
        $value = str_replace(" ", "-", $label);
        $value = strtolower($value);
        
        $field['choices'][ $value ] = $label;
        
      }
    }
    return $field;
  }

  add_filter('acf/load_field/name=sidebar_select', 'my_acf_load_sidebar');
  
  
 // Enqueue Stylesheets and Scripts
  function enqueue_page_builder_files() {

    wp_register_style( 'add-bp-styles', get_template_directory_uri() . '/page-builder/build/pb-styles.css','','', 'all' );
    wp_register_script( 'add-map-script', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', '', null,''  );
    wp_register_script( 'add-pb-script', get_template_directory_uri() . '/page-builder/build/pb-scripts.min.js', '','',true  );

    if(have_rows('page_builder')) {
      wp_enqueue_style( 'add-bp-styles' );
      wp_enqueue_script('add-map-script');
      wp_enqueue_script('add-pb-script');
    }
  }

  add_action( 'wp_enqueue_scripts', 'enqueue_page_builder_files' );