<div class="site_box">
	<style scoped>
		.site_box{
			display: grid;
			grid-template-columns: max-content 1fr;
			grid-row-gap: 10px;
			grid-column-gap: 20px;
		}
		.site_field{
			display: contents;
		}
	</style>
	<p class="meta-options site_field">
		<label for="hero_heading">Hero Heading</label>
		<input type="text" name="hero_heading" id="hero_heading" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hero_heading', true ) ); ?>">
	</p>
	<p class="meta-options site_field">
		<label for="short_description">Short Description</label>
		<textarea id="short_description" name="short_description" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'short_description', true ) ); ?>" rows="5" cols="33"><?php echo esc_textarea( get_post_meta( get_the_ID(), 'short_description', true ) ); ?></textarea>
	</p>
	<p class="meta-options site_field">
		<label for="hero_image">Hero Background Image</label>
		<input type="url" name="hero_image" id="hero_image" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hero_image', true ) ); ?>">
	</p>
	<p class="meta-options site_field">
		<label for="button_link">Url</label>
		<input type="url" name="button_link" id="button_link" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'button_link', true ) ); ?>">
	</p>
	<p class="meta-options site_field">
		<label for="button_title">Button Title</label>
		<input type="text" name="button_title" id="button_title" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'button_title', true ) ); ?>">
	</p>
</div>