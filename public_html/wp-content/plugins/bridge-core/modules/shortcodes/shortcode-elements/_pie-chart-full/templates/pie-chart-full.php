<?php

//Get content without tags from WP_Editor in Visual Composer
$pattern = "/\\d+(,?#?\\w*\\s?;?)*/";

preg_match_all($pattern, $content, $matches);

if (!empty($matches)) {
    if(!empty($matches[0])) {
        $match = $matches[0][0];
    } else {
        return $html = '<p>'. esc_html__('Insert valid Pie Chart data' ,'bridge-core') . '</p>';
    }
}

$id   = mt_rand(1000, 9999);
$datasets = array();
$values   = array();
$colors   = array();

$pie_chart_array = explode(";", $match);

for ( $i = 0 ; $i < count($pie_chart_array); $i++ ){
	$pie_chart_el = explode(",", $pie_chart_array[$i]);
	
	$values[] = intval(trim($pie_chart_el[0]));
	$colors[] = trim($pie_chart_el[1]);
}

$data = array(
	'data-values' => json_encode($values),
	'data-colors' => json_encode($colors),
);

if($element_appearance != '') {
	$data['data-element-appearance'] = $element_appearance;
}
?>

<div class="q_pie_graf_holder q-pie-chart-full">
	<div class="q_pie_graf" <?php echo bridge_qode_get_inline_attrs( $data ); ?>>
		<canvas id="<?php echo 'pie'. esc_attr($id); ?>" height="<?php echo esc_attr($height); ?>" width="<?php echo esc_attr($width); ?>"></canvas>
	</div>
	<div class="q_pie_graf_legend">
		<ul>
			<?php
			$pie_chart_array = explode(";", $match);
			for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
				$pie_chart_el = explode(",", $pie_chart_array[$i]);?>
				<li>
					<div class='color_holder' style="background-color:<?php echo trim($pie_chart_el[1]); ?>"></div>
					<p style="color: <?php echo esc_attr($color); ?>"><?php echo trim($pie_chart_el[2]); ?></p>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
