<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt>Full Color Logo:</dt>
		<dd><input name="custom_logo_path" from="galleryFiles" /></dd>
		<dt>White Logo:</dt>
		<dd><input name="custom_white_logo_path" from="galleryFiles" /></dd>
		<dt>Logo Alt:</dt>
		<dd><input type="text" name="custom_logo_alt" placeholder="Example: Name of the Organization"/></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Buttons</dt>
		<dd><input type="checkbox" name="custom_enable_btn_1" cap="Enable Button #1" checked="checked" /></dd>
		<dd><input type="checkbox" name="custom_enable_btn_2" cap="Enable Button #2" checked="checked" /></dd>
		<dd><input type="checkbox" name="custom_enable_btn_3" cap="Enable Button #3" /></dd>
	</dl>
</tplOptions>
<tplOptions caption="Settings" order="2">
	<dl class="mwDialog">
		<dt>Enable Sticky Header:</dt>
		<dd>
			<select name="custom_enable_sticky">
				<option value="0">Disable</option>
				<option value="1" selected="selected">Enable (default)</option>
			</select>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Alert Message" order="3">
	<dl class="mwDialog">
		<dt class="formGroup">Alert Message</dt>
		<dd><input type="checkbox" name="custom_enable_alert_msg" cap="Enable Alert Message" /></dd>
		<dt>Location:</dt>
		<dd>
			<select name="custom_alert_msg_location">
				<option value="is-top" selected="selected">Above the header (default)</option>
				<option value="is-float-left">Float top left</option>
				<option value="is-float-right">Float top right</option>
			</select>
		</dd>
		<dt>Icon:</dt>
		<dd>
			<input type="radio" class="cell-25 _font-icon" name="custom_alert_msg_icon" value="fa-solid fa-bell" cap="" checked="checked"/>
			<input type="radio" class="cell-25 _font-icon" name="custom_alert_msg_icon" value="fa-solid fa-bullhorn" cap="" />
			<input type="radio" class="cell-25 _font-icon" name="custom_alert_msg_icon" value="fa-solid fa-exclamation" cap="!" />
			<input type="radio" class="cell-25 _font-icon" name="custom_alert_msg_icon" value="fa-solid fa-triangle-exclamation" cap="" />
		</dd>
		<dt>Type:</dt>
		<dd>
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-info" cap="Info (default)" style="background-image: url('/images/static/template-options/alert.style_1_info.png');" checked="checked" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-success" cap="Success" style="background-image: url('/images/static/template-options/alert.style_1_success.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-warning" cap="Warning" style="background-image: url('/images/static/template-options/alert.style_1_warning.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-error" cap="Error" style="background-image: url('/images/static/template-options/alert.style_1_error.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-white" cap="White" style="background-image: url('/images/static/template-options/alert.style_1_white.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-light" cap="Light" style="background-image: url('/images/static/template-options/alert.style_1_light.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-gray" cap="Gray" style="background-image: url('/images/static/template-options/alert.style_1_gray.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_alert_msg_type" value="is-dark" cap="Dark" style="background-image: url('/images/static/template-options/alert.style_1_dark.png');" />
		</dd>
		<dt>Content:</dt>
		<dd><textarea name="custom_alert_msg_content" class="richEdit simple" size="5"></textarea></dd>
		<dt>Cookie Expiration (Days):</dt>
		<dd><input type="number" name="custom_alert_msg_cookie_expiration" value="7" /></dd>
		<dd class="_tpl-info">After the message has been closed, it will reappear after a specified number of days (The default is 7 days).</dd>
	</dl>
</tplOptions>
<tplOptions caption="Megamenu" order="4">
	<dl class="mwDialog">
		<dt>Enable Megamenu:</dt>
		<dd>
			<select name="custom_enable_megamenu">
				<option value="0" selected="selected">Disable (default)</option>
				<option value="1">Enable</option>
			</select>
		</dd>
		<dt>Fullwidth:</dt>
		<dd>
			<select name="custom_megamenu_fullwidth">
				<option value="">Disable</option>
				<option value="is-fullwidth"  selected="selected">Enable (default)</option>
			</select>
		</dd>
	</dl>
	<?php for ($i = 1; $i <= 6; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Menu #<?= $i ?></dt>
			<dt>Number of Menu Columns:</dt>
			<dd>
				<select name="custom_megamenu_menu_<?= $i ?>" data-toggle-form>
					<option value="no-menu">Disable</option>
					<option value="has-0-menu" data-toggle-form-target=".tpl-megamenu-single-link-<?= $i ?>">Single link (no dropdown)</option>
					<option value="has-1-menu" data-toggle-form-target=".tpl-megamenu-has-col-<?= $i ?>">1 column menu dropdown</option>
					<option value="has-2-menu" data-toggle-form-target=".tpl-megamenu-has-col-<?= $i ?>" selected="selected">2 column menu dropdown (default)</option>
					<option value="has-3-menu" data-toggle-form-target=".tpl-megamenu-has-col-<?= $i ?>">3 column menu dropdown</option>
				</select>
			</dd>
			<dt class="tpl-megamenu-has-col-<?= $i ?>">Number of Intro Content Columns:</dt>
			<dd class="tpl-megamenu-has-col-<?= $i ?>">
				<select name="custom_megamenu_intro_<?= $i ?>">
					<option value="no-intro">Disable</option>
					<option value="has-1-intro" selected>1 column intro content (default)</option>
					<option value="has-2-intro" >2 column intro content</option>
				</select>
			</dd>
			<dt class="tpl-megamenu-single-link-<?= $i ?> tpl-megamenu-has-col-<?= $i ?>">Label:</dt>
			<dd class="tpl-megamenu-single-link-<?= $i ?> tpl-megamenu-has-col-<?= $i ?>"><input type="text" name="custom_megamenu_label_<?= $i ?>" value="Item" /></dd>
			<dt class="tpl-megamenu-single-link-<?= $i ?>">URL:</dt>
			<dd class="tpl-megamenu-single-link-<?= $i ?> _tpl-info">If "Single Link" is selected, please select a URL below.</dd>
			<dd class="tpl-megamenu-single-link-<?= $i ?>">
				<select name="custom_megamenu_url_<?= $i ?>" from="pages" zero="None" class="radioList new filter" size="4">
					<option value="{url}">{title}</option>
				</select>
			</dd>
			<dd class="tpl-megamenu-single-link-<?= $i ?>"><input type="text" name="custom_megamenu_external_url_<?= $i ?>" placeholder="Or enter an external URL"/></dd>
		</dl>
	<?php } ?>
</tplOptions>

<style type="text/css">
  html {
    --header-main-right-top-height: 46px;
    --header-main-right-top-height-mobile: 0px;
    --header-main-right-bottom-height: 110px;
    --header-main-right-bottom-height-mobile: 80px;
    --header-main-height: calc(var(--header-main-right-top-height) + var(--header-main-right-bottom-height));
    --header-main-height-mobile: calc(var(--header-main-right-top-height-mobile) + var(--header-main-right-bottom-height-mobile));
    --header-padding: 80px;
    --header-padding-tablet: 30px;
    --header-padding-mobile: 15px;
    --header-main-wrap-height: var(--header-main-height);
  }

  html.header-scrolled {
    --header-main-wrap-height: var(--header-main-height-mobile);
  }

  @media (max-width: 767px) {
    html {
      --header-main-wrap-height: var(--header-main-height-mobile);
    }
  }
</style>

<!-- Header -->
<div id="<?= $tpl_id ?>" class="header header-style-6" data-tpl-tooltip="Header - Style 6">
	<div class="header-wrap">

		<!-- Alert Message -->
		<toggle rel="custom_enable_alert_msg">
			<div id="<?= $tpl_id ?>-alert" class="alert alert-style-1 {custom_alert_msg_type} {custom_alert_msg_location}" role="alert" aria-hidden="true">
				<div class="alert-wrap">
					<i class="alert-icon {custom_alert_msg_icon}" aria-hidden="true"></i>
					<div class="alert-content">{custom_alert_msg_content}</div>
					<button class="alert-close" aria-label="Dismiss alert">
						<i class="fa-solid fa-times" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</toggle>

		<!-- Main -->
		<div class="header-main">
			<div class="header-main-wrap">

				<!-- Backdrop -->
				<div class="header-backdrop"></div>

				<!-- background -->
				<div class="header-bg"></div>

				<!-- Main Left -->
				<div class="header-main-left">

					<!-- Logo -->
					<a class="header-logo" href="/" title="{custom_logo_alt}">
						<img class="logo-color" src="/get/files/image/galleries/{custom_logo_path}?resize=600x0" alt="{custom_logo_alt}" width="600" height="156" />
						<img class="logo-white" src="/get/files/image/galleries/{custom_white_logo_path}?resize=600x0" alt="{custom_logo_alt}" width="600" height="156" />
					</a>
				</div>

				<!-- Main Right -->
				<div class="header-main-right">

					<!-- Main Right Top -->
					<div class="header-main-right-top">

						<!-- Utility Menu -->
						<div class="header-utility-menu">
							<mwWidget rel="utilityBarMenu" info="Utility Menu" widget="Menu" menu="Utility Menu" template="default.php" global="1"></mwWidget>
						</div>

						<!-- Social Media -->
						<mwWidget rel="headerSns" widget="Gensoclinks" icon_size="medium" align="center" socials="instagram, facebook, twitter, linkedin" template="default.php" global="1"></mwWidget>

						<!-- Search Button -->
						<button class="search-btn"
						        aria-label="Open Search Form Dialog"
						        aria-controls="<?= $tpl_id ?>-search-dialog">
							<i class="fa-solid fa-search" aria-hidden="true"></i>
						</button>
					</div>

					<!-- Main Right Bottom -->
					<div class="header-main-right-bottom">

						<!-- Menu -->
						<div class="header-menu">
							<mwWidget rel="headerMainMenu" info="Header Menu" widget="Menu" menu="Header Menu" template="default.php" global="1"></mwWidget>
						</div>

						<!-- Megamenu -->
						<div class="megamenu megamenu-style-1 {custom_megamenu_fullwidth}">
							<div class="megamenu-wrap">
								<nav aria-label="Megamenu">
									<ul class="megamenu-level-1">
										<?php for ($i = 1; $i <= 6; $i++) { ?>
											<toggle rel="custom_megamenu_menu_<?= $i ?>" value="has-0-menu">
												<li class="no-children">
													<a href="{custom_megamenu_url_<?= $i ?>}" data-external-link="{custom_megamenu_external_url_<?= $i ?>}" tabindex="0">
														<span>{custom_megamenu_label_<?= $i ?>}</span>
													</a>
												</li>
											</toggle>
											<toggle rel="custom_megamenu_menu_<?= $i ?>" value="has-1-menu|has-2-menu|has-3-menu">
												<li class="has-children {custom_megamenu_menu_<?= $i ?>} {custom_megamenu_intro_<?= $i ?>}">
													<a href="#" tabindex="0" aria-expanded="false" aria-controls="megamenu-panel-<?= $i ?>">
														<span>{custom_megamenu_label_<?= $i ?>}</span>
														<i class="fa-solid fa-caret-down" aria-hidden="true"></i>
													</a>
													<div id="megamenu-panel-<?= $i ?>" class="megamenu-panel _content-style">
														<div class="megamenu-panel-wrap">
															<toggle rel="custom_megamenu_intro_<?= $i ?>" value="has-1-intro|has-2-intro">
																<div class="megamenu-intro">
																	<mwWidget rel="megaMenu<?= $i ?>Intro1" widget="Content" global="1"></mwWidget>
																</div>
															</toggle>
															<toggle rel="custom_megamenu_intro_<?= $i ?>" value="has-2-intro">
																<div class="megamenu-intro">
																	<mwWidget rel="megaMenu<?= $i ?>Intro2" widget="Content" global="1"></mwWidget>
																</div>
															</toggle>
															<div class="megamenu-menus">
																<toggle rel="custom_megamenu_menu_<?= $i ?>" value="has-1-menu|has-2-menu|has-3-menu">
																	<div class="megamenu-menu">
																		<!--<mwWidget rel="megaMenu<?/*= $i */?>Menu1Title" widget="Content" global="1"><p><strong>Menu Title</strong></p></mwWidget>-->
																		<mwWidget rel="megaMenu<?= $i ?>Menu1" widget="Menu" template="default.php" global="1"></mwWidget>
																	</div>
																</toggle>
																<toggle rel="custom_megamenu_menu_<?= $i ?>" value="has-2-menu|has-3-menu">
																	<div class="megamenu-menu">
																		<!--<mwWidget rel="megaMenu<?/*= $i */?>Menu2Title" widget="Content" global="1"><p><strong>Menu Title</strong></p></mwWidget>-->
																		<mwWidget rel="megaMenu<?= $i ?>Menu2" widget="Menu" template="default.php" global="1"></mwWidget>
																	</div>
																</toggle>
																<toggle rel="custom_megamenu_menu_<?= $i ?>" value="has-3-menu">
																	<div class="megamenu-menu">
																		<!--<mwWidget rel="megaMenu<?/*= $i */?>Menu3Title" widget="Content" global="1"><p><strong>Menu Title</strong></p></mwWidget>-->
																		<mwWidget rel="megaMenu<?= $i ?>Menu3" widget="Menu" template="default.php" global="1"></mwWidget>
																	</div>
																</toggle>
															</div>
														</div>
													</div>
												</li>
											</toggle>
										<?php } ?>
									</ul>
								</nav>
							</div>
						</div>

						<!-- Burger -->
						<button id="<?= $tpl_id ?>-burger"
						        class="burger"
						        aria-expanded="false"
						        aria-label="Open Mobile Menu"
						        aria-controls="<?= $tpl_id ?>-mobile-menu">
							<span class="burger-wrap" aria-hidden="true">
								<span class="burger-lines"><span></span><span></span><span></span></span>
								<span class="burger-slashes"><span></span><span></span></span>
								<span class="burger-text"><span>Menu</span><span>Close</span></span>
							</span>
						</button>

						<!-- Buttons -->
						<nav class="header-btns" aria-label="Header Buttons">
							<ul>
								<toggle rel="custom_enable_btn_1">
									<li>
										<mwWidget rel="headerButton1" widget="Button" link_text="DONATE" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
									</li>
								</toggle>
								<toggle rel="custom_enable_btn_2">
									<li>
										<mwWidget rel="headerButton2" widget="Button" link_text="CONTACT" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
									</li>
								</toggle>
								<toggle rel="custom_enable_btn_3">
									<li>
										<mwWidget rel="headerButton3" widget="Button" link_text="ENROLLMENT" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
									</li>
								</toggle>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Search Dialog -->
<div id="<?= $tpl_id ?>-search-dialog"
     class="search-dialog search-dialog-style-1"
     role="dialog"
     aria-modal="true"
     aria-hidden="true"
     aria-labelledby="<?= $tpl_id ?>-search-label">
	<div class="search-dialog-backdrop"></div>
	<div class="search-dialog-wrap">
		<form class="search-dialog-form" action="/search" method="GET">
			<label id="<?= $tpl_id ?>-search-label" class="_sr-only">Search by keyword:</label>
			<input type="text" name="q" value="" placeholder="SEARCH...">
			<button type="submit" aria-label="Search Now"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
	</div>
	<button class="search-dialog-close-btn" aria-label="Close Search Form Dialog">
		<i class="fa-solid fa-times" aria-hidden="true"></i>
	</button>
</div>

<!-- Mobile Menu -->
<div id="<?= $tpl_id ?>-mobile-menu"
     class="mobile-menu mobile-menu-style-1 _content-style"
     aria-hidden="true"
     aria-labelledby="<?= $tpl_id ?>-mobile-menu-label">
	<div class="mobile-menu-backdrop"></div>
	<div class="mobile-menu-wrap">
		<div class="mobile-menu-inner">
			<button id="<?= $tpl_id ?>-mobile-menu-close-btn"
			        class="mobile-menu-close-btn burger active"
			        aria-label="Close mobile menu">
				<span class="burger-wrap" aria-hidden="true">
					<span class="burger-lines"><span></span><span></span><span></span></span>
					<span class="burger-slashes"><span></span><span></span></span>
					<span class="burger-text"><span>Menu</span><span>Close</span></span>
				</span>
			</button>
			<div class="mobile-menu-header">
				<div id="<?= $tpl_id ?>-mobile-menu-label" class="_sr-only">Mobile Menu</div>
			</div>
			<div class="mobile-menu-body">

				<!-- Mobile Menu Navigation -->
				<div class="mobile-menu-nav">
					<mwWidget rel="mobileMenu" info="Mobile Menu" widget="Menu" menu="Header Menu" template="default.php" global="1"></mwWidget>
				</div>
			</div>
			<div class="mobile-menu-footer">

				<!-- Mobile Menu Buttons -->
				<nav class="mobile-menu-btns" aria-label="Mobile Menu Buttons">
					<ul>
						<toggle rel="custom_enable_btn_1">
							<li>
								<mwWidget rel="mobileMenuButton1" widget="Button" link_text="ENROLLMENT" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
							</li>
						</toggle>
						<toggle rel="custom_enable_btn_2">
							<li>
								<mwWidget rel="mobileMenuButton2" widget="Button" link_text="DONATE" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
							</li>
						</toggle>
						<toggle rel="custom_enable_btn_3">
							<li>
								<mwWidget rel="mobileMenuButton3" widget="Button" link_text="CONTACT" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnCenter" global="1"></mwWidget>
							</li>
						</toggle>
					</ul>
				</nav>

				<!-- Mobile Menu Social Media -->
				<mwWidget rel="mobileMenuSns" widget="Gensoclinks" icon_size="medium" align="center" socials="instagram, facebook, twitter, linkedin" template="default.php" global="1"></mwWidget>
			</div>
		</div>
	</div>
</div>

<!-- Javascript -->
<script type="text/javascript">

	//-----------------------------------------------------------
	//
	// Global Variables
	//
	//-----------------------------------------------------------
	//
	// Return boolean true if template option 'custom_enable_megamenu' return '1'.
	var IS_MEGAMENU_ENABLED = '{custom_enable_megamenu}' === '1';

	// Return boolean true if template option 'custom_enable_sticky' return 'is-sticky'.
	var IS_STICKY_HEADER    = '{custom_enable_sticky}' === '1';

	//-----------------------------------------------------------
	//
	// Global Handles
	//
	//-----------------------------------------------------------
	//
	//--------------------------------
	// Regular Menu VS Megamenu
	//--------------------------------
	//
	if (IS_MEGAMENU_ENABLED) {
		$('#<?= $tpl_id ?> .header-menu').remove();
		$('html').addClass('has-megamenu');
	} else {
		$('#<?= $tpl_id ?> .megamenu').remove();
		$('html').removeClass('has-megamenu');
	}

	//--------------------------------
	// Sticky Menu
	//--------------------------------
	//
	if (IS_STICKY_HEADER) {
		$('html').addClass('has-sticky-header');
	} else {
		$('html').removeClass('has-sticky-header');
	}

	//--------------------------------
	// Overlap Header
	//--------------------------------
	//
	$('html').addClass('has-overlap-header');

	//-----------------------------------------------------------
	//
	// Document Ready
	//
	//-----------------------------------------------------------
	//
	$(document).ready(function () {

		//-----------------------------------------------------------
		//
		// Make Menu Accessible
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Make Focusable
			//--------------------------------
			//
			var focusableSelectors = [
				'#<?= $tpl_id ?> .mwPageBlock.Menu a',
				'#<?= $tpl_id ?>-mobile-menu .mwPageBlock.Menu a'
			].join(', ');

			$(focusableSelectors).each(function () {
				var $this = $(this);
				var href = $this.attr('href');

				$this.attr('tabindex', '0');

				if (!href) {
					$this.attr('href', '');
				}
			});

			//--------------------------------
			// Make Nav
			//--------------------------------
			//
			var $mainMenu = $('#<?= $tpl_id ?> .header-menu > .mwPageBlock.Menu > .blockContents > ul');
			var $utilityMenu = $('#<?= $tpl_id ?> .header-utility-menu > .mwPageBlock.Menu > .blockContents > ul');
			var $mobileMenu = $('#<?= $tpl_id ?>-mobile-menu .mobile-menu-nav > .mwPageBlock.Menu > .blockContents > ul');

			$mainMenu.wrap('<nav aria-label="Main Menu"></nav>');
			$utilityMenu.wrap('<nav aria-label="Utility Menu"></nav>');
			$mobileMenu.wrap('<nav aria-label="Mobile Menu"></nav>');

			//--------------------------------
			// Make Expandable
			//--------------------------------
			//
			var expandableSelectors = [
				'#<?= $tpl_id ?> .header-menu li.has-children',
				'#<?= $tpl_id ?> .megamenu li.has-1-menu.no-intro li.has-children',
				'#<?= $tpl_id ?>-mobile-menu .mobile-menu-nav li.has-children'
			].join(', ');

			$(expandableSelectors).each(function (index) {
				var $this = $(this);
				var $thisA = $this.children('a');
				var $childUl = $this.children('ul');
				var ID = '<?= $tpl_id ?>' + '-' + index + '-' + $thisA.text().toLowerCase().replace(/[^a-zA-Z]/g, '');

				$thisA.attr('aria-expanded', 'false').attr('aria-controls', ID);
				$childUl.attr('id', ID);
			});
		})();

		//-----------------------------------------------------------
		//
		// Main Menu
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Exit if Megamenu was enabled
			//--------------------------------
			//
			if (IS_MEGAMENU_ENABLED) {
				return false;
			}

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $el = $('#<?= $tpl_id ?>');
			var $li = $el.find('.header-menu li.has-children');
			var $link = $li.find('a');
			var $directLink = $li.children('a');

			function active($li, $a) {
				$li.addClass('active');
				$a.attr('aria-expanded', 'true');
			}

			function inactive($li, $a) {
				$li.removeClass('active');
				$a.attr('aria-expanded', 'false');
			}

			$directLink.on('click', function (e) {
				e.preventDefault();
			});

			$directLink.on('mouseenter', function () {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				active($parentLi, $thisLink);
			});

			$li.on('mouseleave', function () {
				var $thisLi = $(this);
				var $childLink = $thisLi.children('a');

				inactive($thisLi, $childLink);
			});

			$directLink.on('keydown', function (e) {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				switch (e.key) {
					case 'Enter':
					case ' ':
						e.preventDefault();
						if ($parentLi.hasClass('active')) {
							inactive($parentLi, $thisLink);
						} else {
							active($parentLi, $thisLink);
						}
						break;
				}
			});

			$link.on('keydown', function (e) {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li.active');
				var $parentLink = $parentLi.children('a');

				if ($parentLi.length && e.key === 'Escape') {
					e.preventDefault();
					$parentLink.focus();
					inactive($parentLi, $thisLink);
				}
			});

			$li.on('focusout', function(e) {
				var $thisLi = $(this);
				var $childLink = $thisLi.find('a[aria-expanded]');

				setTimeout(function() {
					if (!$thisLi.has(document.activeElement).length > 0) {
						inactive($thisLi, $childLink);
					}
				});
			});
		})();

		//-----------------------------------------------------------
		//
		// Megamenu
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Exit if Megamenu was disabled
			//--------------------------------
			//
			if (!IS_MEGAMENU_ENABLED) {
				return false;
			}

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $el = $('#<?= $tpl_id ?>');
			var $megamenu = $el.find('.megamenu');
			var $parentMenu = $megamenu.find('.megamenu-level-1');
			var $li = $parentMenu.children('li.has-children:not(.has-1-menu.no-intro)');
			var $link = $li.children('a');

			function active($li, $a) {
				$li.addClass('active');
				$a.attr('aria-expanded', 'true');
			}

			function inactive($li, $a) {
				$li.removeClass('active');
				$a.attr('aria-expanded', 'false');
			}

			$link.on('click', function (e) {
				e.preventDefault();
			});

			$link.on('mouseenter', function () {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				active($parentLi, $thisLink);
			});

			$link.on('keydown', function (e) {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				switch (e.key) {
					case 'Enter':
					case ' ':
						e.preventDefault();
						if ($parentLi.hasClass('active')) {
							inactive($parentLi, $thisLink);
						} else {
							active($parentLi, $thisLink);
						}
						break;
				}
			});

			$li.on('mouseleave', function () {
				var $thisLi = $(this);
				var $childLink = $thisLi.children('a');

				inactive($thisLi, $childLink);
			});

			$li.on('keydown', function (e) {
				var $thisLi = $(this);
				var $childLink = $thisLi.children('a');

				if ($thisLi.hasClass('active') && e.key === 'Escape') {
					inactive($thisLi, $childLink);
					$childLink.focus();
				}
			});

			$li.on('focusout', function() {
				var $thisLi = $(this);
				var $childLink = $thisLi.find('a[aria-expanded]');

				setTimeout(function() {
					if (!$thisLi.has(document.activeElement).length > 0) {
						inactive($thisLi, $childLink);
					}
				});
			});
		})();

		//-----------------------------------------------------------
		//
		// 1 column megamenu menu dropdown without intro
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Exit if Megamenu was disabled
			//--------------------------------
			//
			if (!IS_MEGAMENU_ENABLED) {
				return false;
			}

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $el = $('#<?= $tpl_id ?>');
			var $megamenu = $el.find('.megamenu');
			var $li = $megamenu.find('li.has-1-menu.no-intro, li.has-1-menu.no-intro li.has-children');
			var $link = $li.find('a');
			var $directLink = $li.children('a');

			function active($li, $a) {
				$li.addClass('active');
				$a.attr('aria-expanded', 'true');
			}

			function inactive($li, $a) {
				$li.removeClass('active');
				$a.attr('aria-expanded', 'false');
			}

			$directLink.on('click', function (e) {
				e.preventDefault();
			});

			$directLink.on('mouseenter', function () {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				active($parentLi, $thisLink);
			});

			$li.on('mouseleave', function () {
				var $thisLi = $(this);
				var $childLink = $thisLi.children('a');

				inactive($thisLi, $childLink);
			});

			$directLink.on('keydown', function (e) {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li');

				switch (e.key) {
					case 'Enter':
					case ' ':
						e.preventDefault();

						if ($parentLi.hasClass('active')) {
							inactive($parentLi, $thisLink);
						} else {
							active($parentLi, $thisLink);
						}

						break;
				}
			});

			$link.on('keydown', function (e) {
				var $thisLink = $(this);
				var $parentLi = $thisLink.closest('li.active');
				var $parentLink = $parentLi.children('a');

				if ($parentLi.length && e.key === 'Escape') {
					e.preventDefault();
					$parentLink.focus();
					inactive($parentLi, $thisLink);
				}
			});

			$li.on('focusout', function(e) {
				var $thisLi = $(this);
				var $childLink = $thisLi.find('a[aria-expanded]');

				setTimeout(function() {
					if (!$thisLi.has(document.activeElement).length > 0) {
						inactive($thisLi, $childLink);
					}
				});
			});
		})();

		//-----------------------------------------------------------
		//
		// Alert Message
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $header             = $('#<?= $tpl_id ?>');
			var $headerWrap         = $header.find('.header-wrap');
			var $alertMsg           = $('#<?= $tpl_id ?>-alert');
			var $alertMsgCloseBtn   = $alertMsg.find('.alert-close');

			//--------------------------------
			// Location
			//--------------------------------
			//
			if ($alertMsg.hasClass('is-bottom')) {
				$alertMsg.appendTo($headerWrap);
			}

			//--------------------------------
			// Parameters
			//--------------------------------
			//
			var COOKIE_EXPIRATION       = 7;
			var NEW_COOKIE_EXPIRATION   = parseInt('{custom_alert_msg_cookie_expiration}');
			var COOKIE_NAME             = 'HEADER_ALERT_MESSAGE';
			var COOKIE_CONTENT          = $(`<div>{custom_alert_msg_content}</div>`).text().replace(/\s+/g, ' ').trim();

			//--------------------------------
			// Set Cookie Expiration
			//--------------------------------
			//
			if (isNaN(NEW_COOKIE_EXPIRATION)) {
				// console.log(COOKIE_NAME + ' cookie expiration is set to default 7 days');
			} else {
				COOKIE_EXPIRATION = NEW_COOKIE_EXPIRATION;
				// console.log(COOKIE_NAME +' cookie expiration is set to ' + NEW_COOKIE_EXPIRATION + ' days');
			}

			//--------------------------------
			// Check Cookie
			//--------------------------------
			//
			checkCookie(COOKIE_NAME);

			if (getCookie(COOKIE_NAME)) {
				$alertMsg.removeClass('active').attr('aria-hidden', 'true');
			} else {
				$alertMsg.addClass('active').attr('aria-hidden', 'false');
			}

			//--------------------------------
			// Close Message and Set Cookie
			//--------------------------------
			//
			$alertMsgCloseBtn.on('click', function () {
				$alertMsg.removeClass('active').attr('aria-hidden', 'true');
				$(document).trigger('resetRootCSS', 'Emitted from Header Close Alert Event.');
				setCookie(COOKIE_NAME, COOKIE_CONTENT, COOKIE_EXPIRATION);
				checkCookie(COOKIE_NAME);
			});

			//--------------------------------
			// Functions
			//--------------------------------
			//
			function checkCookie(cname) {
				var match = getCookie(cname);

				if (match && match[1] !== COOKIE_CONTENT) {
					deleteCookie(cname);
					// console.log(cname + ' cookie has been cleared.');
				} else if (match) {
					// console.log(cname + ' cookie is REMEMBERED on this browser.');
				} else {
					// console.log(cname + ' cookie is NOT REMEMBERED on this browser.');
				}
			}

			function setCookie(cname, cvalue, exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

				var expires = "expires=" + d.toUTCString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

				// console.log(cname + ' cookie was set to "' + cvalue + '", and will be expired on ' + expires);
			}

			function deleteCookie(cname) {
				document.cookie = cname +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			}

			function getCookie(cname) {
				return document.cookie.match(new RegExp("(?:^|; )" + cname + "=([^;]*)"));
			}
		})();

		//-----------------------------------------------------------
		//
		// Search
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $body = $('body');
			var $openBtn = $('#<?= $tpl_id ?> .search-btn');
			var $dialog = $('#<?= $tpl_id ?>-search-dialog');
			var $closeBtn = $dialog.find('.search-dialog-close-btn');
			var $backdrop = $dialog.find('.search-dialog-backdrop');
			var $searchInput = $dialog.find('input[name="q"]');

			//--------------------------------
			// Helper Functions
			//--------------------------------
			//
			function openSearchForm() {
				$body.addClass('_overflow-hidden');
				$openBtn.addClass("active");
				$dialog.fadeIn(400).addClass("active").attr('aria-hidden', 'false');
				$searchInput.focus();
			}

			function closeSearchForm() {
				$body.removeClass('_overflow-hidden');
				$openBtn.removeClass("active");
				$dialog.fadeOut(400).removeClass("active").attr('aria-hidden', 'true');
				$openBtn.focus();
			}

			//--------------------------------
			// Toggle Dialog
			//--------------------------------
			//
			$openBtn.on('click', openSearchForm);
			$closeBtn.on('click', closeSearchForm);
			$backdrop.on('click', closeSearchForm);

			//--------------------------------
			// Keyboard Trap
			//--------------------------------
			//
			var $focusableEls = $dialog.find('a, button, :input, [tabindex]:not([tabindex="-1"])');
			var $firstFocusable = $focusableEls.first();
			var $lastFocusable = $focusableEls.last();

			$dialog.on('keydown', function(e) {

				var activeElement = document.activeElement;

				switch (e.key) {
					case 'Tab':
						if (e.shiftKey && activeElement === $firstFocusable[0]) {
							e.preventDefault();
							$lastFocusable.focus();
						} else if (!e.shiftKey && activeElement === $lastFocusable[0]) {
							e.preventDefault();
							$firstFocusable.focus();
						}
						break;
					case 'Escape':
						e.preventDefault();
						closeSearchForm();
						break;
				}
			});
		})();

		//-----------------------------------------------------------
		//
		// Mobile Menu
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $body = $('body');
			var $burger = $('#<?= $tpl_id ?>-burger');
			var $menu = $('#<?= $tpl_id ?>-mobile-menu');
			var $menuCloseBtn = $('#<?= $tpl_id ?>-mobile-menu-close-btn');
			var $menuWrap = $menu.find('.mobile-menu-wrap');
			var $menuBackdrop = $menu.find('.mobile-menu-backdrop');
			var $nav = $menu.find('.mobile-menu-nav');
			var $navA = $nav.find('li.has-children > a');

			var $focusableEls = $menu.find('a, button, :input, [tabindex]:not([tabindex="-1"])');
			var $firstFocusable = $focusableEls.first();
			var $lastFocusable = $focusableEls.last();

			//--------------------------------
			// Initialization
			//--------------------------------
			//
			// Append a plus symbol to <a class="has-children">
			//
			$navA.append('<i class="fa fa-chevron-right" aria-hidden="true"></i>');

			//--------------------------------
			// Helper Functions
			//--------------------------------
			//
			function active($ul, $li, $a) {
				$ul.slideDown(100).addClass('active');
				$li.addClass('active');
				$a.attr('aria-expanded', 'true');
			}

			function inactive($ul, $li, $a) {
				$ul.slideUp(100).removeClass('active');
				$li.removeClass('active');
				$a.attr('aria-expanded', 'false');
			}

			function openMenu() {
				$body.addClass('_overflow-hidden');
				$burger.attr('aria-expanded', 'true');
				$menu.addClass('active').css({'pointer-events': 'auto', 'visibility': 'visible'}).attr('aria-hidden', 'false');

				window.requestAnimationFrame(function () {
					$menuWrap.animate({'right':'0'}, 200);
					$menuBackdrop.fadeIn(200);
				});

				$menuCloseBtn.focus();
			}

			function closeMenu() {
				$body.removeClass('_overflow-hidden');
				$burger.attr('aria-expanded', 'false');

				// Use requestAnimationFrame for smoother animation
				window.requestAnimationFrame(function () {
					$menuWrap.animate({'right':'-100%'}, 200);
					$menuBackdrop.fadeOut(200, function () {
						inactive(
							$nav.find('ul.active'),
							$nav.find('li.active'),
							$nav.find('a[aria-expanded=true]')
						);
					});
				});
				$burger.focus();
			}

			//--------------------------------
			// Utility function to bind both
			// click and touchstart
			//--------------------------------
			//
			function bindClickAndTouch($element, handler) {
				$element.on('click touchstart', function (e) {
					e.preventDefault();
					handler();
				});
			}

			//--------------------------------
			// Toggle Mobile Menu
			//--------------------------------
			//
			bindClickAndTouch($burger, function () {
				$burger.hasClass('active') ? closeMenu() : openMenu();
			});

			bindClickAndTouch($menuCloseBtn.add($menuBackdrop), closeMenu);

			//--------------------------------
			// Keyboard Trap
			//--------------------------------
			//
			$menu.on('keydown', function(e) {
				switch (e.key) {
					case 'Tab':
						if (e.shiftKey && document.activeElement === $firstFocusable[0]) {
							e.preventDefault();
							$lastFocusable.focus();
						} else if (!e.shiftKey && document.activeElement === $lastFocusable[0]) {
							e.preventDefault();
							$firstFocusable.focus();
						}
						break;
					case 'Escape':
						closeMenu();
						break;
				}
			});

			//--------------------------------
			// Toggle Children
			//--------------------------------
			//
			$navA.on('click', function(e) {
				e.preventDefault();

				var $this = $(this);
				var $thisLi = $this.closest('li.has-children');
				var $thisUl = $this.next('ul');
				var $activeChildUl = $thisUl.find('ul.active');
				var $activeChildLi = $thisUl.find('li.active');
				var $activeChildA = $thisUl.find('a[aria-expanded=true]');
				var $activeSiblingLi = $thisLi.siblings('li.active');
				var $activeSiblingChildUl = $activeSiblingLi.find('ul.active');
				var $activeSiblingChildLi = $activeSiblingLi.find('li.active');
				var $activeSiblingChildA =$activeSiblingLi.find('a[aria-expanded=true]');

				if ($thisLi.hasClass('active')) {
					inactive($thisUl, $thisLi, $this);
				} else {
					active($thisUl, $thisLi, $this);
				}

				$activeSiblingLi.removeClass('active');
				inactive($activeChildUl, $activeChildLi, $activeChildA);
				inactive($activeSiblingChildUl, $activeSiblingChildLi, $activeSiblingChildA);
			});
		})();

		//-----------------------------------------------------------
		//
		// Sticky Header & Scroll
		//
		//-----------------------------------------------------------
		//
		(function () {

			//--------------------------------
			// Exit if Header isn't Sticky
			//--------------------------------
			//
			if (!IS_STICKY_HEADER) {
				return false;
			}

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $html = $('html');
			var $mainArea = $('#main-area');
			var $header = $('#<?= $tpl_id ?>');
			var $headerMain = $header.find('.header-main');

			//--------------------------------
			// Scroll Magic
			//--------------------------------
			//
			new ScrollMagic.Scene({
				triggerElement: $headerMain[0],
				triggerHook: 0,
				offset: 0
			})
				.setClassToggle($html[0], 'header-stuck')
				.addTo(SMController);

			new ScrollMagic.Scene({
				triggerElement: $mainArea[0],
				triggerHook: 0,
				offset: 150
			})
				.setClassToggle($html[0], 'header-scrolled')
				.addTo(SMController);
		})();
	});
</script>