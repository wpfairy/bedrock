<?php 
if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} else { ?>
	<img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
<?php } ?>
<?php
//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
        $template=get_template_directory();
        $the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}
?>
<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
  echo get_the_post_thumbnail($post->ID);
} else {
   echo main_image();
} ?>