<?php $img = get_field('career-img', 2); ?>
<div class="career" <?php if($img) echo 'style="background-image: url('.$img['url'].')';?>">		
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 text-center">
				<div class="inner">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 text-center">
							<h2 class="text-center main-title"><?php the_field('career-title', 2); ?></h2>	
							<p class="text"><?php the_field('career-text', 2); ?></p>
							<a href="#" class="btn btn-transparent-white text-uppercase">Узнать подробнее про карьеру</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>