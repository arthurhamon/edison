<?php $product_cat = get_term_of_term('product_cat', 'product_brand', 'product'); ?>
<div id="menu-categories" class="menu-categories">
	<div class="inner">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12 parents-list">
				<?php if(isset($product_cat[0])) : ?>
				<ul>
					<?php foreach($product_cat[0] as $row) : ?>
						<li><a data-brand-list="#brand-list-<?php echo $row->term_id; ?>" href="#childs-<?php echo $row->term_id; ?>"><?php echo $row->name; ?></a></li>
					<?php endforeach; ?>
				</ul>				
				<?php endif; ?>
			</div>
			<div class="col-sm-4 col-xs-12 childs-list">
				<?php foreach($product_cat[0] as $row) {
					writeParent($row->term_id, $product_cat, true);
				}?>
			</div>
			<div class="col-sm-4 col-xs-12 brans-list">
				<div class="row">
					<?php foreach($product_cat[0] as $row) : ?>
						<?php if(count($row->link_terms)) : ?>
							<div class="item" id="brand-list-<?php echo $row->term_id; ?>">
								<?php $i=0; foreach($row->link_terms as $brand) : $i++;
									$img = get_field('img', $brand);
									$img = ($img) ? '<img src="'.$img['sizes']['image-auto-210'].'" alt="" />' : $brand->name;
								?>								
								<div class="col-xs-6"><a href="<?php echo get_term_link( $brand ); ?>"><?php echo $img; ?></a></div>
								<?php if(!($i%2)) echo '<div class="clearfix"></div>'; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>