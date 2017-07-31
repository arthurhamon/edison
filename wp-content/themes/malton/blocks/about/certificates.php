<?php $certificates = get_field('сertificates');
$countCertificateOnSlide = (wpmd_is_phone()) ? 1 : 4;
if( $certificates ): ?>
<div id="certificates" class="certificates">
	<div class="h2 main-title">Лицензии и сертификаты</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="wrap-jcarousel" data-responsivecountitem="1" data-wrap="circular">
					<div class="jcarousel">
						<ul>
							<li>
							<div class="row">
							<?php $i=0; foreach( $certificates as $image ) : $i++; ?>
								<div class="col-sm-3 col-xs-12"><a href="<?php echo $image['sizes']['image-800-auto']; ?>" class="fancybox" rel="gallery-certificates"><img src="<?php echo $image['sizes']['image-300-auto']; ?>" alt="<?php echo $image['alt']; ?>" /></a></div>
								<?php if(!($i%$countCertificateOnSlide) || $i == count($certificates)) : ?>
									</div>
									</li>
									<?php if($i < count($certificates)) echo('<li><div class="row">');?>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="control-panel">
						<a href="#" class="jcarousel-prev"></a>
						<div class="jcarousel-pagination hidden-xs" data-shownum="false"></div>
						<a href="#" class="jcarousel-next"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>