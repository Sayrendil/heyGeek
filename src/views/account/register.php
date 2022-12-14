<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li class="url"><a href="http://freehtml5.co">freeHTML5.co</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Регистрация</h3>
					<form action="/account/register" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" name="login" class="form-control" placeholder="Логин">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<select name="gender" id="gender" class="form-control">
									<option value="">Пол</option>
									<option value="1">Мужчина</option>
									<option value="2">Женщина</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<select name="age" id="age" class="form-control">
									<option value="">Возраст</option>
									<?php
										for($i = 10; $i <= 100; $i++) {
									?>
									<option value="<?= $i ?>"><?= $i ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="email" id="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" id="phone" name="phone" class="form-control" placeholder="Телефон">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="password" id="password" name="password" class="form-control" placeholder="Пароль">
							</div>
						</div>

						<div class="form-group">
							<input type="submit" value="Регистрация" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>