<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<?php if(!empty($vars)): ?>
						<h2>Активные курсы</h2>
					<?php else: ?>
						<h2>Подайте заявку что бы начать обучаться.</h2>
					<?php endif; ?>
				</div>
			</div>
			<?php if(!empty($vars)): ?>
			<div class="row row-padded-mb">
				<div class="col-md-6 col-md-offset-3">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-img-holder" style="background-image: url(/images/project-1.jpg);"></a>
						<div class="blog-text">
							<?php foreach($vars as $var): ?>
							<h3><a href="#"><?= $var['title'] ?></a></h3>
							<span class="posted_on">Часов: <?= $var['hours'] ?></span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<p><?= $var['description'] ?></p>
							<form action="/dashboard/course" method="POST" class="form">
								<div class="form-group">
									<input type="submit" value="Перейти к урокам" class="btn btn-primary">
								</div>
							</form>
							<?php endforeach; ?>
						</div> 
					</div>
				</div>
			</div>
			<?php else: ?>
				<div class="row row-padded-mb">
					<div class="col-md-6 col-md-offset-3">
						<div class="fh5co-blog animate-box">
							<div class="blog-text">
								<p>Запишитесь на курс что бы видеть активные курсы</p>
								<form action="/course/courses" method="POST" class="form">
									<div class="form-group">
										<input type="submit" value="Записаться" class="btn btn-primary">
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>