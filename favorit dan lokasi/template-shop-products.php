<?php
/*
Template Name: Shop Products
*/
?>
<?php get_header(); ?>
<?php get_sidebar('profile-left'); ?>
<div class="column fivecol">
	<div class="element-title indented">
		<h1><?php _e('Barang toko', 'makery'); ?></h1>
	</div>
	<?php ThemexInterface::renderTemplateContent('shop-products'); ?>
	<?php if(ThemexCore::checkOption('shop_multiple')) { ?>
	<span class="secondary"><?php _e('Toko ini tidak ada', 'makery'); ?></span>
	<?php } else if(ThemexShop::$data['status']!='publish') { ?>
	<span class="secondary"><?php _e('Toko ini sedang di review', 'makery'); ?></span>
	<?php } else if(empty(ThemexShop::$data['products'])) { ?>
	<p class="secondary"><?php _e('Belum ada barang yang di input', 'makery'); ?></p>
	<?php } else { ?>
	<table class="profile-table">
		<thead>
			<tr>
				<th><?php _e('Nama', 'makery'); ?></th>
				<th><?php _e('Stok barang', 'makery'); ?></th>
				<th><?php _e('Harga', 'makery'); ?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach(ThemexShop::$data['products'] as $ID) {
			$product=ThemexWoo::getProduct($ID);
			?>
			<tr>
				<td>
					<a href="<?php echo ThemexCore::getURL('shop-product', $product['ID']); ?>" <?php if($product['status']=='draft') { ?>class="secondary"<?php } ?>>
						<?php 
						if(empty($product['title'])) {
							_e('Tidak ada judul', 'makery');
						} else {
							echo $product['title'];
						}
						?>
					</a>
				</td>
				<td>
				<?php 
				if($product['type']=='virtual') {
					echo '&ndash;';
				} else {
					echo $product['object']->get_total_stock();
				}				
				?>
				</td>
				<td><?php echo $product['price']; ?></td>
				<td class="textright nobreak">
					<a href="<?php echo ThemexCore::getURL('shop-product', $product['ID']); ?>" title="<?php _e('Ubah', 'makery'); ?>" class="element-button small square secondary">
						<span class="fa fa-pencil"></span>
					</a>&nbsp;
					<a href="<?php echo get_permalink($product['ID']); ?>" target="_blank" title="<?php _e('Lihat', 'makery'); ?>" class="element-button small square secondary">
						<span class="fa fa-eye"></span>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
	<?php if(ThemexShop::$data['status']=='publish') { ?>
	<a href="<?php echo ThemexCore::getURL('shop-product'); ?>" class="element-button primary"><?php _e('Tambahkan Barang', 'makery'); ?></a>
	<?php } ?>
</div>
<?php get_sidebar('profile-right'); ?>
<?php get_footer(); ?>