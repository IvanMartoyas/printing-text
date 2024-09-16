<?php

// подлкючаю стили и скрипты
function printing_scripts() {
	wp_enqueue_style( 'printingStyle', get_template_directory_uri() . '/printing-text/printing-style.css');
	wp_enqueue_script( 'addPrinting', get_template_directory_uri() . '/printing-text/printing-script.js');
}	

add_action( 'wp_enqueue_scripts', 'printing_scripts' );


add_shortcode( 'printing_text', 'printing_func' ); 

function printing_func( $atts ){ 

    ob_start();

    $id = $atts['id']; 
    $text = $atts['text']; 

    ?>

    <script>
        printing_text("<? echo $id; ?>", '<? echo $text; ?>');
    </script>

    <?
        return ob_get_clean();
    } 
// [printing_text text="text text text text text" id="text1"]