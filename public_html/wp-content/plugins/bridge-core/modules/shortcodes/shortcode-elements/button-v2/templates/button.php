<button type="submit" <?php bridge_qode_inline_style($button_styles); ?> <?php bridge_qode_class_attribute($button_classes); ?> <?php echo bridge_qode_get_inline_attrs($button_data); ?> <?php echo bridge_qode_get_inline_attrs($button_custom_attrs); ?>>
    <span class="qode-btn-text"><?php echo esc_html($text); ?></span><?php echo bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-button-v2-icon-holder-inner'))); ?>
</button>