<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-1 col-md-offset-2 animate-box">
					<h3><?= $title ?></h3>
					<form action="/account/recovery" method="POST" class="form">
						<div class="row form-group">

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="email" id="email" name="email" class="form-control" placeholder="Ваш Email">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="password" id="password" name="password" class="form-control" placeholder="Новый пароль">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Отправить" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>