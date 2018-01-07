add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
	
	$ad_code2 = '<div style="text-align:center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM_MI_after_3rd_para_NewLinkAD_Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6876250563925952"
     data-ad-slot="8414151307"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>';


	if (in_category('videos')) {
		return prefix_insert_after_paragraph( $ad_code2, 1, $content );
	}	
	
	return $content;

}

 
// Parent Function that makes the magic happen
 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}