<div class="container">
<?php //We add the companies brand name here?>
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>

	<a class="brand" href="<?php echo base_url(); ?>"><?php echo $this->lang->line("brand_name"); ?>
	</a>

	<div class="nav-collapse">
	<?php //We add the Top Navigation links here?>
		<ul class="nav">
			<li id="index_nav"><?php echo anchor("", $this->lang->line("nav_home")); ?></li>
			<li id="fields_nav"><?php echo anchor("fields", "Fields"); ?></li>
			<li id="students_nav"><?php echo anchor("students", "Students"); ?></li>
			<li id="contactus_nav"><?php echo anchor_popup(CONTACT_US, $this->lang->line("nav_contact_us")); ?>
			</li>
		</ul>

		<script type="text/javascript">
			$(function() {
				var current_path, url = window.location.pathname;

				if ((url.indexOf('/fields')) != -1){
					current_path = 'fields';
				} else if ((url.indexOf('/students')) != -1){
					current_path = 'students';
				} else if ((url.indexOf('/contactus')) != -1){
					current_path = 'contactus';
				} else if ((url.indexOf('/login')) != -1){
					current_path = 'login';
				} else {
					current_path = 'index';
				}

				$('.admin_nav').find('li').each(function () {
					$(this).removeClass('active');
				});

				$('#' + current_path + "_nav").addClass('active');
			});
		</script>

		<?php
			// Making services active or inactive
 			if (strstr($_SERVER['REQUEST_URI'], "/services")) { ?>
				<script type="text/javascript">
					$("#services_nav").addClass("active");
				</script>
		<?php } else { ?>
				<script type="text/javascript">
					$("#services_nav").removeClass("active");
				</script>
		<?php } ?>

		<?php // Added this ul for floating the Logout nav?>
		<ul class="nav pull-right">
		<?php
		if ( $this->user_status->is_signed_in() ) {
			$user_info = $this->session->userdata('user');
			$user_name = $user_info['first_name'].".".$user_info['last_name'];

			// $profile_string = '<div class="user_profile_nav"><b><i class="icon-user"></i> '.$user_info['email'].'</b><br />'.$this->lang->line("nav_txt_view_my_profile").'</div>';
			// $change_pass_string = '<i class="icon-lock"></i> '.$this->lang->line("nav_txt_change_pass");
			$logout_string = '<i class="icon-off"></i> '.$this->lang->line("nav_signout");
			?>
			<li class="dropdown"><?php echo anchor("", $user_name." <b class='caret'></b>", array ("class" => "dropdown-toggle", "data-toggle" => "dropdown"));?>
				<ul class="dropdown-menu">
					<!-- <li><?php echo anchor("", $profile_string); ?></li>
					<li class="divider"></li>
					<li><?php echo anchor("", $change_pass_string); ?>
					</li>
					<li class="divider"></li> -->
					<li><?php echo anchor("logout", $logout_string); ?>
					</li>
				</ul></li>
				<?php
		} else { ?>
			<li id="login_nav">
			<?php echo anchor("login", $this->lang->line("nav_signin"), array("style" => "background: url(&quot;" . base_url("img") . "/lock_icon.png&quot;) no-repeat scroll 0px center transparent; padding-left: 17px;")); ?>
			</li>
			<?php } ?>
		</ul>
	</div>

</div>
