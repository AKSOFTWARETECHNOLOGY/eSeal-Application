<aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options='{"minWidth": 991, "containerSelector": ".container", "padding": {"top": 110}}'>
<h4 class="heading-secondary">Dashboard</h4>
<ul class="nav nav-list mb-xlg">
<li><a href="dashboard.php#info">Contact Info</a></li>
<li><a href="dashboard.php#language">My Languages</a></li>
<li><a href="dashboard.php#genre">My Genre</a></li>
<?php if($user_role==2) { ?>
<li><a href="dashboard.php#content">My Contents</a></li>
<?php } ?>
<?php if($user_role==7) { ?>
<li><a href="dashboard.php#book">My Books</a></li>
<li><a href="dashboard.php#requirement">My Requirements</a></li>
<?php } ?>
<li><a href="logout.php">Logout</a></li>
</ul></aside>