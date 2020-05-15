<?php require_once('header.php');?>
<div class="message"><?php if(!empty($data6)): echo $data6; endif; ?></div>
<div class="content-active">
	
	<div id="loginForm" class="login-active">
		<p class="header">Login</p>
		<hr>
		<div class="form">
		<form name="formLogin" method="post" id="loginForm" action="/home/login">
			<div class="form-group">
				<?php if(!empty($data1)): echo $data1; endif; ?> 
    			<input type="email" id="email" name="email">
    			<label class="form-label" for="email">Email<span class="required">*</span> <i class="far fa-envelope"></i></label>
  			</div>
			
			<div class="form-group">
				<?php if(!empty($data2)): echo $data2; endif; ?>
				<input type="password" id="password" name="password">
				<label class="form-label" for="password">Password <span class="required">*</span> <i class="fas fa-lock"></i></label>
			</div>

			<div class="footer">
				<input name="login" class="btn btn-active" type="submit" value="LOGIN">
			</div>
		</form> 
</div>
	</div>
	<div id="signUpForm" class="sign-up-active">
		<p class="header">Sign Up</p>
		<hr>
		<form name="formSignUp" method="post" id="formSignUp" action="/home/signUp">
			<div class="form-group">
				<?php if(!empty($data3)): echo $data3; endif; ?>
				<input type="text" id="name" name="name">
				<label class="form-label" for="name">Name <span class="required">*</span><i class="far fa-user"></i></label>
			</div>
			<div class="form-group">
				<?php if(!empty($data4)): echo $data4; endif; ?>
				<input type="email" id="email" name="email">
				<label class="form-label" for="email">Email <span class="required">*</span><i class="far fa-envelope"></i></label>
			</div>
			<div class="form-group">
				<?php if(!empty($data5)): echo $data5; endif; ?>
				<input type="password" id="password" name="password">
				<label class="form-label" for="password">Password <span class="required">*</span></span><i class="fas fa-lock"></i></label>
			</div>
			<input name="signup" class="btn btn-active" type="submit" value="SIGN UP">
		</form> 
	</div>
</div>
<div class="content-inactive">
	<div class="sign-up-inactive">
		<p class="header">Don't have an account?</p>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<button id="btn-sup-ia" class="btn btn-inactve" onclick="formFieldsSignUp()">SIGN UP</button>
	</div>
	<div class="login-inactive">
		<p class="header">Have an account?</p>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		<button id="btn-log-ia" class="btn btn-inactve" onclick="formFieldsLogin()">LOGIN</button>
	</div>
</div>
<?php require_once('footer.php');

