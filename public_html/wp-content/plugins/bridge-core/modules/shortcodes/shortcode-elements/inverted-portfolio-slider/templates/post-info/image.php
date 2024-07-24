<div class="qode-ips-image">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>

    <?php $params['aux'] = true; ?>

    <div class="qode-ips-aux-title">
        <?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/title', 'inverted-portfolio-slider', '', $params ); ?>
    </div>
</div>