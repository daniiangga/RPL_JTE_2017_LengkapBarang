				<?php if(is_active_sidebar('footer')) { ?>
					<div class="clear"></div>
					<div class="footer-sidebar sidebar clearfix">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer')); ?>
					</div>
				<?php } ?>
			</section>
			<!-- /content -->			
		</div>
		
	</div>
	<?php wp_footer(); ?>
</body>
</html>