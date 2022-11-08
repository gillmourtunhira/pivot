<footer>
	<div class="container my-5">
		<div class="row justify-content-start">
			<div class="col-4">
				<h2 class="text-capitalize"><?php echo bloginfo('name'); ?></h2>
			</div>
		</div>
		<hr>
		<div class="row justify-content-between">
			<div class="col-3">
				<h3 class="fs-6">&copy; <?php echo bloginfo('name'); ?> <?php echo date('Y'); ?></h3> 
			</div>
			<div class="col-3">
				<?php wp_nav_menu([
                'theme_location'  => 'terms',
                'depth'           => 0, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => '',
                'menu_class'      => 'navbar-nav d-flex flex-column flex-md-row justify-content-center p-0 gap-2',
                'footer_a_link'   =>  'text-white text-decoration-none ',
                'add_li_class'    =>  'my-2',
                  ]);
              ?>
			</div>
			<div class="col-3 d-flex justify-content-end">
				<a class="text-decoration-none fw-bold text-dark fs-6" href="https://gillmourtunhira.com"><?php echo __('SITE BY GILLMOUR'); ?></a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>