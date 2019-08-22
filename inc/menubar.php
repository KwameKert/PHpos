





	<div class="navbar navbar-default header-highlight">

		<div class="navbar-header">

			<a class="navbar-brand" href="dashboard.php"><img src="../images/logo_icon_light.png" alt=""></a>



			<ul class="nav navbar-nav visible-xs-block">

				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>

				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>

			</ul>

		</div>



		<div class="navbar-collapse collapse" id="navbar-mobile">

			<ul class="nav navbar-nav">

				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>



				<li class="dropdown">

				



					<div class="dropdown-menu dropdown-content">




						


						<div class="dropdown-content-footer">

							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>

						</div>

					</div>

				</li>

			</ul>



			<div class="navbar-right">

				<p class="navbar-text">Hello, <?php echo $_SESSION['app_user']['full_name'];?></p>

				<p class="navbar-text"><span class="label bg-success">Online</span></p>


			</div>

		</div>

	</div>