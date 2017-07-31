<?php $categories = get_categories(array('hide_empty' => true)); 
$actTerm = get_queried_object();
?>
<?php 
if($categories): ?>
<div class="blog-categories">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<ul>
				<?php foreach($categories as $row) : ?>
					<li <?php if($actTerm->cat_ID == $row->cat_ID) : ?>class="act"<?php endif; ?>><a href="<?php echo get_category_link( $row->cat_ID );?>"><?php echo $row->name; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<div class="col-xs-12 visible-xs">
				<div class="wrap-btn-menu">
					<a href="#menu-blog-categories" class="btn-menu switch-menu-blog-categories" id="switch-menu-blog-categories">
						<span class="icon"><span class="middle-line"></span></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="menu-blog-categories" class="first-screen-wrap-menu">
	<div class="close-area"></div>
	<ul>
	<?php foreach($categories as $row) : ?>
		<li><a href="<?php echo get_category_link( $row->cat_ID ); ?>"><?php echo $row->name; ?></a></li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>