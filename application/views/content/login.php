<div class="container">
	<div class="row">
	  <div class="col-xs-12 col-sm-8 col-md-4">&nbsp;</div>
	  <div class="col-xs-12 col-sm-4 col-md-4" style="margin-top: 90px;">
		<?php echo $this->session->flashdata('message'); ?>
	  	<div  class="panel panel-default"><div class="panel-body">
	  		<div class="text-center"><h4>Login </h4></div>
	  		<form method="post" action="<?php echo base_url();?>pages/login">
			  <div class="form-group">
			    <label for="InputUsername1">Username</label>
			    <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="InputPassword1">Password</label>
			    <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			</form>
	  	</div></div>
	  	
	  </div>
	</div>
</div>