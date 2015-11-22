<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

</section>
<footer id="footer">
	<?php // do_action( 'foundationpress_before_footer' ); ?>
	<?php // dynamic_sidebar( 'footer-widgets' ); ?>
	<?php // do_action( 'foundationpress_after_footer' ); ?>
  
  <div class="row row-x" id="contact-us">
    <div class="large-4 columns">
      <h6 class="nm">© BLUEPRINT INVESTMENTS LLC </h6>
      <a href="/wordpress/disclaimer">Disclaimer</a>
    </div>
    <div class="large-8 columns">
<div class="right">
	<p class="nm small-margin">We are located at 154 Grand Street New York, NY 10013. Phone. <a href="tel://+1 347 932 3575">+1.347.932.3575</a>  Email. <a href="mailto:info@blueprintcapitalpartners.com">info@blueprintcapitalpartners.com</a></p>
	<p class="nm">For investment inquiries and general information, please email <a href="mailto:info@blueprintcp.com">info@blueprint.cp </a> </p>
	<p class="nm small-margin">For leasing inquiries, contact peoperty manager <a href="mailto:info@blueprintcapitalpartners.com">Joseph A. Del Forno Inc</a>. at <a href="tel://+1 201 432 7000">+1.201.432.7000</a> </p>
</div>
    </div>
  </div>
  
</footer>

<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>

<a class="exit-off-canvas"></a>
<?php endif; ?>

	<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	</div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>


