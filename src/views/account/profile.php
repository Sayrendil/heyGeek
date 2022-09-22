	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center animate-box">
					<h3><?= $title ?></h3>
					<form action="/account/profile" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" name="login" class="form-control" placeholder="Логин" value="<?= $_SESSION['user']['login'] ?>" disabled>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="email" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" id="phone" name="phone" value="<?= $_SESSION['user']['phone'] ?>" class="form-control" placeholder="Телефон">
							</div>
						</div>

						<!-- <div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<!-- <input type="password" id="password" name="password" class="form-control" placeholder="Новый пароль"> -->
							<!-- </div> -->
						<!-- </div> --> -->

						<!-- <div class="form-group">
							<input type="submit" value="Изменить" class="btn btn-primary">
						</div> -->

					</form>		
				</div>
			</div>
		</div>
	</div>