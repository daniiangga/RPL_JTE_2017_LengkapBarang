<?php
/*
Template Name: Shop Orders
*/
?>
<?php get_header(); ?>
<?php get_sidebar('profile-left'); ?>
<div class="column fivecol">
	<div class="element-title indented">
		<h1><?php _e('Pesanan di toko', 'makery'); ?></h1>
	</div>
	<?php ThemexInterface::renderTemplateContent('shop-orders'); ?>
	<?php if(ThemexCore::checkOption('shop_multiple')) { ?>
	<span class="secondary"><?php _e('Toko ini tidak ada', 'makery'); ?></span>
	<?php } else if(ThemexShop::$data['status']!='publish') { ?>
	<span class="secondary"><?php _e('Toko ini sedang di review.', 'makery'); ?></span>
	<?php } else if(empty(ThemexShop::$data['orders'])) { ?>
	<span class="secondary"><?php _e('Belum ada pesanan yang diterima', 'makery'); ?></span>	
	<?php } else { ?>
	<table>
		<thead>
			<tr>
				<th>&#8470;</th>
				<th><?php _e('Tanggal', 'makery'); ?></th>
				<th><?php _e('Status', 'makery'); ?></th>
				<th><?php _e('Jumlah', 'makery'); ?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach(ThemexShop::$data['orders'] as $ID) {
			$order=ThemexWoo::getOrder($ID);
			?>
			<tr>
				<td>
					<a href="<?php echo ThemexCore::getURL('shop-order', $order['ID']); ?>">
						<?php echo $order['number']; ?>
					</a>
				</td>
				<td>
					<time datetime="<?php echo date('Y-m-d', strtotime($order['date'])); ?>" title="<?php echo esc_attr(strtotime($order['date'])); ?>"><?php echo date_i18n(get_option('date_format'), strtotime($order['date'])); ?></time>
				</td>
				<td><?php echo $order['condition']; ?></td>
				<td><?php echo $order['total']; ?></td>
				<td class="textright">
					<a href="<?php echo ThemexCore::getURL('shop-order', $order['ID']); ?>" title="<?php _e('Ubah', 'makery'); ?>" class="element-button small square secondary">
						<span class="fa fa-pencil"></span>
					</a>
				</td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
	<?php } ?>
</div>
<?php get_sidebar('profile-right'); ?>
<?php get_footer(); ?>