<!-- Home Hero -->
<?php
    $heading = get_post_meta( get_the_ID(), 'hero_heading', true );
    $description = get_post_meta( get_the_ID(), 'short_description', true );
    $btn_title = get_post_meta( get_the_ID(), 'button_title', true );
    $btn_link = get_post_meta( get_the_ID(), 'button_link', true );
    $bgimg_link =  get_post_meta( get_the_ID(), 'hero_image', true );
?>
<div class="cta-linear">
    <div class="p-5 mb-4 cta-cover" style="background-image: linear-gradient(45deg, black, #00000078), url(<?php echo esc_url($bgimg_link); ?>)">
        <div class="container-fluid py-5 text-white">
            <div class="container cta-heading">
                <div class="row cta-heading--top my-3">
                    <h1 class="display-3 fw-bold cta-heading--top_title">
                        <?php 
                            if( ! empty( $heading ) ){
                                echo esc_attr($heading);
                            } else {
                                the_title();
                            }
                        ?>
                    </h1>
                    <?php
                        $excerpt = get_the_excerpt();
                        if( ! empty( $description ) ){
                            ?>
                            <p class="col-md-8 fs-4"><?php echo esc_attr( $description ); ?></p>
                            <?php
                        } elseif( ! empty( $excerpt ) ){
                        ?>
                            <p class="col-md-8 fs-4"><?php echo $excerpt; ?></p>
                    <?php } else{ echo ''; } ?>
                </div>
                <?php
                    if( ! empty( $btn_link && $btn_title ) ) :
                ?>
                <a href="<?php echo $btn_link; ?>" class="btn btn-green btn-lg rounded-pill fs-6"><?php echo $btn_title; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Home Hero -->