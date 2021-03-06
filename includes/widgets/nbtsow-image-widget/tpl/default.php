<?php
$src = wp_get_attachment_image_src($image, $size);

$attr = array();
if( !empty($src) ) {
	$attr = array(
		'src' => $src[0],
	);
	if(!empty($src[1])) $attr['width'] = $src[1];
	if(!empty($src[2])) $attr['height'] = $src[2];
}

// Backward compability with WordPress before 4.4
if( function_exists('wp_get_attachment_image_srcset') ) {
	$attr['srcset'] = wp_get_attachment_image_srcset($image, $size);
}
if( !empty($alt) ) $attr['alt'] = $alt;
?>

<div class="nbtsow-image-widget">
	<?php if(!empty($url)) : ?><a href="<?php echo esc_url($url) ?>" <?php if($new_window) echo 'target="_blank"' ?>><?php endif; ?>
		<img <?php foreach($attr as $n => $v) echo $n.'="' . esc_attr($v) . '" ' ?>/>
	<?php if(!empty($url)) : ?></a><?php endif; ?>
</div>
