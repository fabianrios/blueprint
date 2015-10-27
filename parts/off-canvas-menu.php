<?php
/**
 * Template part for off canvas menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="nav-header">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo_moviles.jpg" alt="" />
	<a href="#" class="tree right" data-reveal-id="menu"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/tree.jpg" alt="" /></a>
</div>

<div id="menu" class="reveal-modal blueish" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <div class="nav-header">
  	<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo_moviles.jpg" alt="" />
  	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
  </div>
  
  <ul>
  	<li><a href="">STRATEGY</a></li>
	<li><a href="">ABOUT US</a></li>
	<li><a href="">CONTACT US</a></li>
	<li><a href="">PORTFOLIO</a></li>
  </ul>
  <hr />
  <ul>
  	<li><a href="#">CLIENT LOGIN</a></li>
  </ul>
  
</div>