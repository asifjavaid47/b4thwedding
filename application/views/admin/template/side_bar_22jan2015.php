<div class="sidebar-menu">
	
		<header class="logo-env">
		
		<!-- logo -->
		<div class="logo">
			<a href="dashboard/main/index.html">
				<img src="<?php echo base_url(); ?>public/images/logo.png" alt="" />
			</a>
		</div>
		
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>
						
		
		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>
		
	</header>
		
	
			<ul id="main-menu" class="">
				<li id="search">
					<form method="get" action="#">
						<input type="text" name="q" class="search-input" placeholder="Search something..." />
						<button type="submit"><i class="entypo-search"></i></button>
					</form>
				</li>
				<li class="opened active">
					<a href="<?php echo base_url(); ?>admin"><i class="entypo-gauge"></i><span>Dashboard</span></a>
				</li>

<!--<li>
		<a href="#"><i class="entypo-newspaper"></i><span>Front End Management</span></a>
		

		<ul>
		

		<li>
				<a href="<?php echo base_url(); ?>admin/showMainSliderImages"><i class="entypo-newspaper"></i><span>Main Slider</span></a>
		</li>

		<li>
				<a href="<?php echo base_url(); ?>admin/mainSlider"><i class="entypo-newspaper"></i><span>Logo</span></a>
		</li>

		</ul>

</li>-->








<li>
            <a href="<?php echo base_url(); ?>admin/showMainSliderImages"><i class="entypo-newspaper"></i><span>Main Slider</span></a>
		

</li>









<!--<li>
    <a href="<?php echo base_url(); ?>admin/add_category"><span>Add Category</span></a>
</li>
<li>
    <a href="<?php echo base_url(); ?>admin/add_sub_category"><span>Add Sub Category</span></a>
</li>-->
<li>
    <a href="<?php echo base_url(); ?>admin/show_category"><i class="entypo-newspaper"></i><span>Manage Categories</span></a>
</li>
<li>
    <a href="<?php echo base_url(); ?>admin/show_sub_category"><i class="entypo-newspaper"></i><span>Manage Skills</span></a>
</li>
<li>
		<a href="<?php echo base_url(); ?>admin/show_user_list"><i class="entypo-newspaper"></i><span>User List</span></a>
		

</li>
<li>
		<a href="<?php echo base_url(); ?>admin/show_projects"><i class="entypo-newspaper"></i><span>Projects List</span></a>
		

</li>
<li>
		<a href="<?php echo base_url(); ?>admin/cancel_dispute"><i class="entypo-newspaper"></i><span>Cancel Dispute</span></a>


</li> 
<li>
    <a href="<?php echo base_url(); ?>admin/showWithdrawList"><i class="entypo-newspaper"></i><span>Withdraw Funds</span></a>
</li>

<!--<li>
		<a href="<?php echo base_url(); ?>admin/showPaymentRequest"><i class="entypo-newspaper"></i><span>Payment Request</span></a>
		

</li>-->

	<li>
		<a href="forms/main/index.html"><i class="entypo-doc-text"></i><span>Forms</span></a>
		

		<ul>

		<li>
			<a href="forms/advanced/index.html"><span>Advanced Plugins</span></a>
		</li>

		<li>
			<a href="forms/wizard/index.html"><span>Form Wizard</span></a>
		</li>

		<li>
			<a href="forms/validation/index.html"><span>Data Validation</span></a>
		</li>

		<li>
			<a href="forms/masks/index.html"><span>Input Masks</span></a>
		</li>

		<li>
			<a href="forms/sliders/index.html"><span>Sliders</span></a>
		</li>

		</ul>

</li>



		</ul>
			
		
</div>	
	<div class="main-content">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
			<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<!--<img src="../../../neon-x/assets/images/thumb-1.png" alt="" class="img-circle" />-->
					Admin
				</a>
				
				<ul style="display:none;" class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="#">
							<i class="entypo-user"></i>
							Edit Profile
						</a>
					</li>
					
					<li>
						<a href="../../../neon-x/mailbox/main/index.html">
							<i class="entypo-mail"></i>
							Inbox
						</a>
					</li>
					
					<li>
						<a href="../../../neon-x/extra/calendar/index.html">
							<i class="entypo-calendar"></i>
							Calendar
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-clipboard"></i>
							Tasks
						</a>
					</li>
				</ul>
			</li>
		
		</ul>
		
		<ul style="display:none;" class="user-info pull-left pull-right-xs pull-none-xsm">
			
			<!-- Raw Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-attention"></i>
					<span class="badge badge-info">6</span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
	<p class="small">
		<a href="#" class="pull-right">Mark all Read</a>
		You have <strong>3</strong> new notifications.
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-user-add pull-right"></i>
				
				<span class="line">
					<strong>New user registered</strong>
				</span>
				
				<span class="line small">
					30 seconds ago
				</span>
			</a>
		</li>
		
		<li class="unread notification-secondary">
			<a href="#">
				<i class="entypo-heart pull-right"></i>
				
				<span class="line">
					<strong>Someone special liked this</strong>
				</span>
				
				<span class="line small">
					2 minutes ago
				</span>
			</a>
		</li>
		
		<li class="notification-primary">
			<a href="#">
				<i class="entypo-user pull-right"></i>
				
				<span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>
				
				<span class="line small">
					3 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-danger">
			<a href="#">
				<i class="entypo-cancel-circled pull-right"></i>
				
				<span class="line">
					John cancelled the event
				</span>
				
				<span class="line small">
					9 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-info">
			<a href="#">
				<i class="entypo-info pull-right"></i>
				
				<span class="line">
					The server is status is stable
				</span>
				
				<span class="line small">
					yesterday at 10:30am
				</span>
			</a>
		</li>
		
		<li class="notification-warning">
			<a href="#">
				<i class="entypo-rss pull-right"></i>
				
				<span class="line">
					New comments waiting approval
				</span>
				
				<span class="line small">
					last week
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">View all notifications</a>
</li>				</ul>
				
			</li>
			
			<!-- Message Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-mail"></i>
					<span class="badge badge-secondary">10</span>
				</a>
				
				<ul class="dropdown-menu">
					<li>
	<ul class="dropdown-menu-list scroller">
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="../../../neon-x/assets/images/thumb-1.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>
				
				<span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
			</a>
		</li>
		
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="../../../neon-x/assets/images/thumb-2.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>
				
				<span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="../../../neon-x/assets/images/thumb-3.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Hayden Cartwright
					- a week ago
				</span>
				
				<span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="../../../neon-x/assets/images/thumb-4.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>
				
				<span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="../../../neon-x/mailbox/main/index.html">All Messages</a>
</li>				</ul>
				
			</li>
			
			<!-- Task Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-list"></i>
					<span class="badge badge-warning">1</span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
	<p>You have 6 pending tasks</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Procurement</span>
					<span class="percent">27%</span>
				</span>
			
				<span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">App Development</span>
					<span class="percent">83%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">HTML Slicing</span>
					<span class="percent">91%</span>
				</span>
				
				<span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Database Repair</span>
					<span class="percent">12%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Backup Create Progress</span>
					<span class="percent">54%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Upgrade Progress</span>
					<span class="percent">17%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
					</span>
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">See all tasks</a>
</li>				</ul>
				
			</li>
		
		</ul>
	
	</div>
	
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
			<!--<li>
				<a href="#">Live Site</a>
			</li>
			
			<li class="sep"></li>
			
			<li>
				<a href="#" data-toggle="chat" data-animate="1" data-collapse-sidebar="1">
					<i class="entypo-chat"></i>
					Chat
					
					<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
				</a>
			</li>
			
			<li class="sep"></li>-->
			
			<li>
				<a href="<?php echo base_url(); ?>admin/logout">
					Log Out <i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
		
	</div>
	
</div>

<hr />