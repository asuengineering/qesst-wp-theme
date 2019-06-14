<?php
$height = '';
$background_url = '';
$headline_color = '';

$height = carbon_get_the_post_meta( 'ribbon-height' );
$background_url = carbon_get_the_post_meta( 'ribbon-background');
$headline_color = carbon_get_the_post_meta( 'ribbon-headline-color' );
?>

<div class="ribbon" style="background-image:url('<?php echo $background_url; ?>'); height:<?php echo $height; ?>;">
    <div class="container">
        <div class="d-flex flex-row align-items-center">
            <div class="col">
                <header class="entry-header" style="color:<?php echo $headline_color; ?>;">
                    <?php the_title( '<h1 class="display-2 entry-title typed-normal">', '</h1>' ); ?>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
</div>