<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Курс <?= $vars['title'] ?></h2>
					<p>Подайте заявку что бы начать обучаться.</p>
				</div>
			</div>

			<div class="row row-padded-mb">
				<div class="col-md-6 col-md-offset-3">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-img-holder" style="background-image: url(/images/project-1.jpg);"></a>
						<div class="blog-text">
							<h3><a href="#"><?= $vars['title'] ?></a></h3>
							<span class="posted_on">Часов: <?= $vars['hours'] ?></span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<p><?= $vars['description'] ?></p>
							<form action="/dashboard/course" method="POST" class="form">
								<div class="form-group">
									<input type="submit" value="Записаться" class="btn btn-primary">
								</div>
							</form>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>