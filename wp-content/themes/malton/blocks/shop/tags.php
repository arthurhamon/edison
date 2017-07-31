<?php
	$tags = get_terms('product_tag', array(
		'hide_empty' => true,
	));
?>
<?php if(count($tags)) : ?>
<div class="container">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<ul class="tags">
				<?php foreach($tags as $row) : ?>
					<li><a href="<?php echo get_term_link( $row ); ?>" class="btn btn-transparent-2"><?php echo $row->name ?></a></li>		
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>