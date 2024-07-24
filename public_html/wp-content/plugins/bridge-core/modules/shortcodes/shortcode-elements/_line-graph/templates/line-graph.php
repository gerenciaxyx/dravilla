<?php

$bridge_qode_options        = bridge_qode_return_global_options();
$id                         = mt_rand(1000, 9999);
$bezierCurve                = $type == "rounded" ? "true" : "false";
$content                    = strip_tags($content);
$line_graph_array           = explode(";", $content);
$text_fontsize              = ! empty( $bridge_qode_options['text_fontsize'] ) ? $bridge_qode_options['text_fontsize'] : 15;
$line_graph_labels_array    = explode(",", $labels);
$background_colors          = array();
$values                     = array();

if(!empty($bridge_qode_options['text_color']) && $custom_color == ""){
	$text_color = $bridge_qode_options['text_color'];
} else if(empty($bridge_qode_options['text_color']) && $custom_color != ""){
	$text_color = $custom_color;
} else if(!empty($bridge_qode_options['text_color']) && $custom_color != ""){
	$text_color = $custom_color;
}else{
	$text_color = '#818181';
}

for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
	$line_graph_el = explode(",", $line_graph_array[$i]);
	$color         =  bridge_qode_hex2rgb(trim($line_graph_el[0]));
	
	unset($line_graph_el[0], $line_graph_el[1]);

	$background_colors[] = 'rgba(' . $color[0] . ',' . $color[1] . ',' . $color[2] . ',0.7)';
	$values[] = implode(',', $line_graph_el);
}

$data = array(
	'data-scale-step-width' => $scale_step_width,
	'data-scale-steps' => $scale_steps,
	'data-bezier-curve' => $bezierCurve,
	'data-scale-font-color' => $text_color,
	'data-scale-font-size' => $text_fontsize,
	'data-labels' => json_encode($line_graph_labels_array),
	'data-values' => json_encode($values),
	'data-background-colors' => json_encode($background_colors),
);?>

<div class="q_line_graf_holder">
	<div class="q_line_graf" <?php echo bridge_qode_get_inline_attrs( $data ); ?>>
		<canvas id="<?php echo 'lineGraph'. $id ?>" height="<?php echo esc_html($height); ?>" width="<?php echo esc_html($width); ?>"></canvas>
	</div>
	<div class="q_line_graf_legend">
		<ul>
			<?php for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
					$line_graph_el = explode(",", $line_graph_array[$i]); ?>
				<li>
					<div class="color_holder" style="background-color:<?php echo trim($line_graph_el[0]); ?>"></div>
					<p style="color:<?php echo $custom_color; ?>"><?php echo trim($line_graph_el[1]); ?></p>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>