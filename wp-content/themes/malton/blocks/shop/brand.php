<?php
if( is_tax('product_brand') ) :
	$term_brand = get_queried_object();
?>
<div class="act-brand">
	<div class="container">
		<div class="col-xs-3 col-xs-offset-1">
			<?php $img = get_field('img', $term_brand); ?>
			<?php if($img) : ?>
				<img src="<?php echo $img['sizes']['image-auto-210']; ?>" />
			<?php endif; ?>
			
		</div>
		<div class="col-xs-7">
			<?php echo $term_brand->description; ?>
		</div>
	</div>
</div>
<?php endif; ?>