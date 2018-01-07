<style type="text/css">
.metro-pro-blue  #miforum a{
color:#000;
}
.metro-pro-blue #miforum a:hover{
color: #5bb1f9;
}
.fc{
background:#206494;
}
.fc:hover{
background: #076ec4;
}

</style>
<div style="clear:both;"></div>
<div style="background-color: #ddd;">
<?php
//replace with your URL
$rss = fetch_feed('http://feeds.feedburner.com/marineinsightforums');

if (!is_wp_error($rss)) :

	$maxitems = $rss -> get_item_quantity(5); //gets latest 5 items This can be changed to suit your requirements
	$rss_items = $rss -> get_items(1, $maxitems);
endif;
?>

<?php
//shortens description
function shorten($string, $length) {
	$suffix = '&hellip;';
	$short_desc = trim(str_replace(array("\r", "\n", "\t"), ' ', strip_tags($string)));
	$desc = trim(substr($short_desc, 0, $length));
	$lastchar = substr($desc, -1, 1);
	if ($lastchar == '.' || $lastchar == '!' || $lastchar == '?')
		$suffix = '';
		$desc .= $suffix;
	return $desc;
}
?>
<!--start of displaying our feeds-->
<div class="rss-items" id="wow-feed" >
<?php
		if ($maxitems == 0) echo '<div>No items.</div>';
		else foreach ( $rss_items as $item ) :
?>
<div class="item" style="border: 5px solid #ddd;margin-bottom:0px;margin-top:-5px;" >
	
	<span class="data">				
		<p class="fc" style="font-weight:400;padding:5px;margin-bottom:3px;" id="miforum"><img src="https://www.marineinsight.com/wp-content/uploads/2015/01/anchor.png" alt="anchor" style="float:left; width:15px; height:20px;margin-top:2%;margin-right:2%;margin-bottom:2%;"/><a href='<?php echo esc_url($item -> get_permalink()); ?>' title='<?php echo esc_html($item -> get_title()); ?>' target="_blank" style="color:#fff;"><?php echo shorten($item -> get_description(), '66'); ?></a></p>
	</span>
</div>
<?php endforeach; ?>
</div>
</div>
<div style="border: 5px solid #ddd; margin-top: -5px;
    padding: 5px;  background: #ddd;">
<div class="subscribe_btn" style="width:94%;text-align:center;margin-left:10px;">
<a href="http://forums.marineinsight.com/"  target="_blank"  style="color:#333;">Click HERE To Ask A Question</a>
</div>
</div>
