<?php
/* IMAGES RESPONSIVE ON ATTACHMENT IMAGES */
function image_tag_class($class) {
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

/* ADD CONTENT WIDTH FUNCTION */

function pahoy_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'pahoy_content_width', 1170 );
}
add_action( 'after_setup_theme', 'pahoy_content_width', 0 );

/* ADD CONTENT WIDTH FUNCTION */

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    $classes[] = 'nav-item';
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

// let's add our custom class to the actual link tag

function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'topnav') {
        $classes[] = 'nav-link';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pahoy_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'pahoy_pingback_header' );

/* --------------------------------------------------------------
/* CUSTOM CATEGORY ICON
-------------------------------------------------------------- */
if ( ! class_exists( 'CT_TAX_META' ) ) {

    class CT_TAX_META {

        public function __construct() {
            //
        }

        public function init() {
            add_action( 'product_cat_add_form_fields', array ( $this, 'add_product_cat_image' ), 10, 2 );
            add_action( 'created_category', array ( $this, 'save_product_cat_image' ), 10, 2 );
            add_action( 'product_cat_edit_form_fields', array ( $this, 'update_product_cat_image' ), 10, 2 );
            add_action( 'edited_category', array ( $this, 'updated_product_cat_image' ), 10, 2 );
            add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
            add_action( 'admin_footer', array ( $this, 'add_script' ) );
        }

        public function load_media() {
            wp_enqueue_media();
        }

        public function add_product_cat_image ( $taxonomy ) { ?>
<div class="form-field term-group">
    <label for="category-image-id">
        <?php _e('Image', 'usaveganmag'); ?></label>
    <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
    <div id="category-image-wrapper"></div>
    <p>
        <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'usaveganmag' ); ?>" />
        <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'usaveganmag' ); ?>" />
    </p>
</div>
<?php }
        public function save_product_cat_image ( $term_id, $tt_id ) {
            if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
                $image = $_POST['category-image-id'];
                add_term_meta( $term_id, 'category-image-id', $image, true );

            }
        }

        public function update_product_cat_image ( $term, $taxonomy ) { ?>
<tr class="form-field term-group-wrap">
    <th scope="row">
        <label for="category-image-id">
            <?php _e( 'Image', 'usaveganmag' ); ?></label>
    </th>
    <td>
        <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
        <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
        <div id="category-image-wrapper">
            <?php if ( $image_id ) { ?>
            <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
            <?php } ?>
        </div>
        <p>
            <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'usaveganmag' ); ?>" />
            <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'usaveganmag' ); ?>" />
        </p>
    </td>

</tr>
<?php   }

        public function updated_product_cat_image ( $term_id, $tt_id ) {
            if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
                $image = $_POST['category-image-id'];
                update_term_meta ( $term_id, 'category-image-id', $image );
            } else {
                update_term_meta ( $term_id, 'category-image-id', '' );
            }
        }

        public function add_script() { ?>
<script>
    jQuery(document).ready(function($) {
        function ct_media_upload(button_class) {
            var _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;
            $('body').on('click', button_class, function(e) {
                var button_id = '#' + $(this).attr('id');
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(button_id);
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment) {
                    if (_custom_media) {
                        $('#category-image-id').val(attachment.id);
                        $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                        $('#category-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                    } else {
                        return _orig_send_attachment.apply(button_id, [props, attachment]);
                    }
                }
                wp.media.editor.open(button);
                return false;
            });
        }
        ct_media_upload('.ct_tax_media_button.button');
        $('body').on('click', '.ct_tax_media_remove', function() {
            $('#category-image-id').val('');
            $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
        });
        // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
        $(document).ajaxComplete(function(event, xhr, settings) {
            var queryStringArr = settings.data.split('&');
            if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                var xml = xhr.responseXML;
                $response = $(xml).find('term_id').text();
                if ($response != "") {
                    // Clear the thumb image
                    $('#category-image-wrapper').html('');
                }
            }
        });
    });

</script>
<?php }

    }
}

$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
