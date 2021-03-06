<?php
/*
Template Name: Shops
*/

get_header();

$layout=ThemexCore::getOption('shops_layout', 'right');

$columns=3;
if($layout!='full') {
	$columns=2;
}

$width='four';
if($columns==2) {
	$width='six';
}

if($layout=='left') {
?>
<aside class="sidebar column fourcol">
	<?php ThemexSidebar::renderSidebar('shops', true); ?>
</aside>
<div class="column eightcol last">
<?php } else if($layout=='right') { ?>
<div class="column eightcol">
<?php } else { ?>
<div class="fullcol">
<?php } ?>
	<?php 
	echo category_description();	
	if(is_page()) {
		ThemexShop::queryShops();		
	}
	
	if(have_posts()) {
	?>
	<div class="shops-wrap clearfix">
		<?php
		$counter=0;
		while(have_posts()) {
			the_post();
			$counter++;
			?>
			<div class="column <?php echo $width; ?>col <?php echo $counter==$columns ? 'last':''; ?>">
				<?php get_template_part('content', 'shop'); ?>
			</div>
			<?php
			if($counter==$columns) {
				$counter=0;
				echo '<div class="clear"></div>';
			}
		}
		?>
	</div>
	<?php } else { ?>
	<h3><?php _e('Tidak ada toko yang ditemukan. Cari toko lain?','makery'); ?></h3>
	<p><?php _e('Maaf, tidak ada toko yang sesuai dengan yang dicari. Coba lagi dengan kosa kata berbeda.','makery'); ?></p>
	<?php } ?>
	<?php ThemexInterface::renderPagination(); ?>
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar column fourcol last">
	<?php ThemexSidebar::renderSidebar('shops', true); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>