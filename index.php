<?php
$mode = $_REQUEST['page'];
$reload = null;
if (array_key_exists('page', $_REQUEST)) {
	$this_page = $_SERVER['REQUEST_URI'];
	if (strpos($this_page, "?") !== false) {
		$this_page = reset(explode("?", $this_page));
	}
	$reload = $this_page . '#' . $_REQUEST['page'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Ajax Navigation </title>
	<script><?php echo (isset($reload)) ? 'location.href = "'.$reload.'";' : '' ?></script>
	<link rel="stylesheet" href="css/core.css" />
</head>
<body <?php echo (isset($mode)) ? 'class="'.$mode.'"' : '' ?>>

	<header>
		<h1>
			SEO Indexible URI Navigation
		</h1>
		<nav>
			<ul>
				<li>
					<a class="action-link link-home" href="index.php?page=home" slideanchor="#home"> <strong>Home</strong> </a>
				</li>
				<li>
					<a class="action-link link-about-us" href="index.php?page=about-us" slideanchor="#about-us"> <strong>About Us</strong> </a>
				</li>
				<li>
					<a class="action-link link-projects" href="index.php?page=projects" slideanchor="#projects"> <strong>Projects</strong> </a>
				</li>
				<li>
					<a class="action-link link-press" href="index.php?page=press" slideanchor="#press"> <strong>Press</strong> </a>
				</li>
				<li>
					<a class="action-link link-contact" href="index.php?page=contact" slideanchor="#contact"> <strong>Contact</strong> </a>
				</li>
			</ul>
		</nav>
	</header>
	<section id="main">
		<ul id="slider">
			<?php
			if (($mode =='') || ($mode=='home')):
			?>
			<li id="home" rel="navigation">
				<h2>Home</h2>
			</li>
			<?php
			endif;
			if (($mode =='') || ($mode=='about-us')):
			?>
			<li id="about-us" rel="navigation">
				<h2>About Us</h2>
			</li>

			<?php
			endif;
			if (($mode =='') || ($mode=='projects')):
			?>
			<li id="projects" rel="navigation">
				<h2>Projects</h2>
			</li>

			<?php
			endif;
			if (($mode =='') || ($mode=='press')):
			?>
			<li id="press" rel="navigation">
				<h2>Press</h2>
			</li>

			<?php
			endif;
			if (($mode =='') || ($mode=='contact')):
			?>
			<li id="contact" rel="navigation">
				<h2>Contact</h2>
			</li>

			<?php
			endif;
			?>
		</ul>
	</section>
	<footer>
		<span class="copyright">&copy; <?php echo date('Y'); ?> <a href="http://whiteb0x.com">whiteb0x</a> All Rights Reserved Worldwide.</span>
	</footer>
	<script src="js/jquery.1.5.min.js"></script>
	<script src="js/jquery.easing-1.3.pack.js"></script>
	<script src="js/jquery.cycle.all.js"></script>
	<script src="js/functions.js"></script>
</body>
</html>

