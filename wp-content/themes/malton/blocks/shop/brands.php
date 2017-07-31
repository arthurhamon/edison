<?php
	$brands = get_terms('product_brand', array(
		'hide_empty' => true,
	));
?>
<?php if(count($brands)) : ?>
<div class="brands hidden-xs">
	<div class="wrap-jcarousel" data-responsivecountitem="5">
		<div class="container">
			<div class="row">
				<div class="col-xs-1">					
					<a href="#" class="jcarousel-prev"></a>
				</div>
				<div class="col-xs-10">
					<div class="jcarousel">
						<ul>
							<?php foreach($brands as $row) : 
								$img = get_field('img', $row);
								$img = ($img) ? '<img src="'.$img['sizes']['image-auto-210'].'" alt="" />' : $row->name;
							?>
							<li>
								<div class="item">
									<div class="vertical-middle">
										<a href="<?php echo get_term_link( $row ); ?>"><?php echo $img ?></a>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-xs-1">					
					<a href="#" class="jcarousel-next"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>