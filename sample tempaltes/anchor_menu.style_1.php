<?php $tpl_id = newSN('tpl_', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Settings</dt>
		<dt>Enable Sticky:</dt>
		<dd>
			<select name="custom_enable_sticky">
				<option value="is-sticky" selected="selected">Enable (default)</option>
				<option value="not-sticky">Disable</option>
			</select>
		</dd>
	</dl>
	<?php for ($i = 1; $i <= 6; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Anchor #<?= $i ?></dt>
			<dd><input type="checkbox" name="custom_enable_<?= $i ?>" cap="Enable Anchor #<?= $i ?>"/></dd>
			<dt>Label:</dt>
			<dd><input type="text" name="custom_label_<?= $i ?>" value="Tab #<?= $i ?>"/></dd>
			<dt>Target Anchor ID:</dt>
			<dd class="_tpl-info">Example: <b>anchor-id</b></dd>
			<dd><input type="text" name="custom_link_<?= $i ?>" value="anchor-id"/></dd>
			<dt>Icon (optional):</dt>
			<dd class="_tpl-info">For best results, please select/upload a PNG image with a transparent background.</dd>
			<dd><input name="custom_icon_<?= $i ?>" from="galleryFiles"/></dd>
			<dt>Icon Alt</dt>
			<dd><input type="text" name="custom_icon_alt_<?= $i ?>"/></dd>
		</dl>
	<?php } ?>
</tplOptions>

<div id="<?= $tpl_id ?>" class="anchor-menu anchor-menu-style-1 {custom_enable_sticky}" data-tpl-tooltip="Anchor Menu - Style 1">
	<div class="anchor-menu-wrap">
		<nav aria-label="Anchor Menu">
			<ul>
				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_enable_<?= $i ?>">
						<li>
							<a href="#{custom_link_<?= $i ?>}">
								<toggle rel="custom_icon_<?= $i ?>">
									<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
									     data-src="/get/files/image/galleries/{custom_icon_<?= $i ?>}?resize=60x0"
									     class="lazyload _img-fluid"
									     alt="{custom_icon_alt_<?= $i ?>}" width="30" height="30"
									     aria-hidden="true"/>
								</toggle>
								<span>{custom_label_<?= $i ?>}</span>
							</a>
						</li>
					</toggle>
				<?php } ?>
				<li class="back-to-top">
					<button aria-label="Back to top"><i class="fa-solid fa-chevron-up" aria-hidden="true"></i></button>
				</li>
			</ul>
		</nav>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {

			//--------------------------------
			// Elms & Params
			//--------------------------------
			//
			var $menu = $('#<?= $tpl_id ?>');
			var $menuWrap = $menu.find('.anchor-menu-wrap');
			var $menuAnchor = $menu.find('a');
			var $backToTopBtn = $menu.find('.back-to-top button');
			var isSticky = '{custom_enable_sticky}' === 'is-sticky';
			var headerOffset = $('.header').hasClass('is-sticky') ? $('.header-main-wrap').outerHeight(true) + 5 : 0;
			var clickedHref = '';
			var $clickedTarget;
			var sectionsArray = [];
			var scenes = [];
			var stickyScene;

			//--------------------------------
			// Smooth Scroll Function
			//--------------------------------
			//
			function smoothScroll(targetOffset) {
				$('html, body').stop(true, false).animate({
					scrollTop: targetOffset
				}, 400);
			}

			//--------------------------------
			// Create Scenes Function
			//--------------------------------
			//
			function createScenes() {

				// Clear existing scenes to prevent duplicates
				//
				scenes.forEach(function (scene) {
					scene.destroy(true);
				});
				scenes = [];

				// Loop through sectionsArray
				//
				if (isSticky && _isMinBrowserWidth(1200)) {
					sectionsArray.forEach(function (section) {
						var $section = $(section);
						var $anchor = $menuAnchor.filter('[href="' + section + '"]');

						// Create the ScrollMagic scene
						//
						var scene = new ScrollMagic.Scene({
							triggerElement: $section[0],
							duration: $section.outerHeight(true)
						})
							.setClassToggle($anchor[0], "active")
							.addTo(SMController);

						// Add the scene to the scenes array for reference
						//
						scenes.push(scene);
					});
				}
			}

			//--------------------------------
			// Enable Sticky
			//--------------------------------
			//
			function enableSticky() {
				if (stickyScene) {
					stickyScene.destroy(true);
				}

				$menu.css('height', '');

				if (isSticky && _isMinBrowserWidth(1200)) {
					$menu.height($menuWrap.outerHeight(true));

					stickyScene = new ScrollMagic.Scene({
						triggerElement: $menu[0],
						triggerHook: 0,
						offset: -headerOffset
					})
						.setClassToggle($menu[0], 'is-stuck')
						.addTo(SMController);
				}
			}

			//--------------------------------
			// Create Sections
			//--------------------------------
			//
			$menuAnchor.each(function () {
				var $this = $(this);
				var href = $this.attr('href');

				if (href && href.startsWith('#')) {
					var $target = $(href);

					if ($target.length) {
						sectionsArray.push(href);
					}
				}
			});

			//--------------------------------
			// Back to Top
			//--------------------------------
			//
			$backToTopBtn.on('click', function () {
				smoothScroll(0);
			});

			//--------------------------------
			// Scroll To Target
			//--------------------------------
			//
			$menuAnchor.on('click', function (e) {
				e.preventDefault();
				clickedHref = $(this).attr('href');

				if (clickedHref && clickedHref.startsWith('#')) {
					$clickedTarget = $(clickedHref);

					if ($clickedTarget.length) {
						smoothScroll($clickedTarget.offset().top - headerOffset);
					} else {
						throw new Error('The anchor link "' + clickedHref + '" does not exist, please check your settings.');
					}
				}
			});

			//--------------------------------
			// Initialize
			//--------------------------------
			//
			createScenes();
			enableSticky();

			//--------------------------------
			// Window Resize
			//--------------------------------
			//
			window.addEventListener('resize', _debounce(function () {
				headerOffset = $('.header').hasClass('is-sticky') ? $('.header-main-wrap').outerHeight(true) + 5 : 0;
				createScenes();
				enableSticky();
			}, 250));

		})();
	});
</script>