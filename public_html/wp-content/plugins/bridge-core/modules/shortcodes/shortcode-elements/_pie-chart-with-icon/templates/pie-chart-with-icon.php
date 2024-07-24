<?php

$qodeIconCollections = bridge_qode_return_icon_collections();

$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

$html = '';
$html .= '<div class="q_pie_chart_with_icon_holder"><div class="q_percentage_with_icon" data-percent="' . $percent . '" data-linewidth="' . $line_width . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '">';

if( ! empty( $icon_pack ) ){
	if($qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) && ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)} != ""){
		$icon_style = "";
		if($icon_color != ""){
			$icon_style .= 'color: '.$icon_color.';';
		}

		$icon_class = "qode_pie_chart_icon_element ";
		if( ! empty( $icon_size ) ){
			$icon_class .= $icon_size;
		}

		if( $qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) ) {
			$html .= $qodeIconCollections->getIconHTML(
				${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
				$icon_pack,
				array('icon_attributes' => array('style' => $icon_style, 'class' => $icon_class)));
		}
	}
} else{
	$html .= '<i class="fa '.$icon.' '.$icon_size.'"';
	if ($icon_color != "") {
	    $html .= ' style="color: ' . $icon_color . ';"';
	}
	$html .= '></i>';
}

$html .= '</div><div class="pie_chart_text">';
if ($title != "") {
    $html .= '<'.$title_tag.' class="pie_title"';
    if ($title_color != "") {
        $html .= ' style="color: ' . $title_color . ';"';
    }
    $html .= '>' . $title . '</'.$title_tag.'>';
}
if ($text != "") {
    $html .= '<p ';
    if ($text_color != "") {
        $html .= ' style="color: ' . $text_color . ';"';
    }
    $html .= '>' . $text . '</p>';
}
$html .= "</div></div>";
echo bridge_qode_get_module_part( $html );
