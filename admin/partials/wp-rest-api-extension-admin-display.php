<div class="wrap">
  <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-1">
      <div class="meta-box-sortables ui-sortable">
        <div class="postbox">
          <form method="post" name="wp_rest_api_extension_settings" action="options.php">
            <h2 class="hndle"><?php echo 'Add Registered Nav Menu API'; ?></h2>
            <div class="inside">
              <?php $menus = get_registered_nav_menus(); ?>
              <?php foreach ( $menus as $location => $description ) : ?>
                <fieldset>
                  <legend class="screen-reader-text"><span>Add Registered nav Menu API</span></legend>
                  <label for="<?php echo $this->plugin_name; ?>-registered-nav-menu-<?php echo $location ?>">
                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-registered-nav-menu-<?php echo $location ?>" name="<?php echo $this->plugin_name; ?> [registered-nav-menu-<?php echo $location ?>]" value="1"/>
                      <span><?php esc_attr_e($description, $this->plugin_name); ?></span>
                  </label>
                </fieldset>
              <?php endforeach;  ?>
            </div>

            <h2 class="hndle"><?php echo 'Add Next And Previous Links'; ?></h2>
            <div class="inside">
              <h4><?php echo 'Post types'; ?></h4>

              <?php
                  $args       = array(
                    'public'   => true,
                    '_builtin' => false,
                  );
                  $output     = 'objects';
                  $operator   = 'and';
                  $post_types = get_post_types( $args, $output, $operator );
              ?>
              <fieldset>
                <legend class="screen-reader-text"><span>Add Next And Previous Links</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-next-prev-links-page">
                  <input type="checkbox" id="<?php echo $this->plugin_name; ?>-next-prev-links-page" name="<?php echo $this->plugin_name; ?> [next-prev-links-page]" value="1"/>
                    <span><?php esc_attr_e('Page', $this->plugin_name); ?></span>
                </label>
              </fieldset>
              <fieldset>
                <legend class="screen-reader-text"><span>Add Next And Previous Links</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-next-prev-links-post">
                  <input type="checkbox" id="<?php echo $this->plugin_name; ?>-next-prev-links-post" name="<?php echo $this->plugin_name; ?> [next-prev-links-post]" value="1"/>
                    <span><?php esc_attr_e('Post', $this->plugin_name); ?></span>
                </label>
              </fieldset>
              <?php if ( ! empty( $post_types ) ) : ?>
                <?php foreach ( $post_types as $post_type ) : ?>
                  <fieldset>
                    <legend class="screen-reader-text"><span>Add Next And Previous Links</span></legend>
                    <label for="<?php echo $this->plugin_name; ?>-next-prev-links-<?php echo $post_type->name ?>">
                      <input type="checkbox" id="<?php echo $this->plugin_name; ?>-next-prev-links-<?php echo $post_type->name ?>" name="<?php echo $this->plugin_name; ?> [next-prev-links-<?php echo $post_type->name ?>]" value="1"/>
                        <span><?php esc_attr_e($post_type->label, $this->plugin_name); ?></span>
                    </label>
                  </fieldset>
                <?php endforeach; ?>
              <?php endif;  ?>
            </div>

            <div class="inside">
              <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
