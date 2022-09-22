		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(/images/img_bg_4.jpg);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 text-center slider-text">
									<div class="slider-text-inner">
										<h1 class="heading-section">Курсы</h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div id="fh5co-blog">
		<div class="container">
			<div class="row row-padded-mb">
				
					<?php foreach($vars as $course): ?>
					<div class="col-md-4 animate-box">
						<div class="fh5co-event">
							<div class="date text-center"><span>15<br>Mar.</span></div>
							<h3><a href="#"><?= $course['title'] ?></a></h3>
							<p><?= $course['description'] ?></p>
							<?php if(isset($_SESSION['user']['id'])): ?>
								<form action="/course/courses" method="POST" class="form">
									<input type="hidden" name="course_title" class="form-control" value="<?= $course['title'] ?>">
									<input type="hidden" name="course_id" class="form-control" value="<?= $course['id'] ?>">
									<div class="form-group">
										<input type="submit" value="Записаться" class="btn btn-primary">
									</div>
								</form>
							<?php else: ?>
								<div class="alert alert-danger">Для записи авторизуйтесь в систему</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
	