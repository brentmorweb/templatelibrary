<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<?php for ($i = 1; $i <= 6; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Tab #<?= $i ?></dt>
			<dd>
				<input type="checkbox" name="custom_enable_<?= $i ?>" cap="Enable Tab #<?= $i ?>"/>
			</dd>
			<dt>Label:</dt>
			<dd>
				<textarea name="custom_label_<?= $i ?>" size="2">Tab #<?= $i ?></textarea>
			</dd>
			<dt>Icon:</dt>
			<dd>
				<input name="custom_icon_<?= $i ?>" from="galleryFiles"/>
			</dd>
		</dl>
	<?php } ?>
</tplOptions>

<div id="<?= $tpl_id ?>" class="tabs tabs-style-3" data-tpl-tooltip="Tabs - Style 3">
	<div class="tabs-wrap">
		<div class="tabs-header">
			<div class="tabs-navs" role="tablist" aria-label="Tabs">
				<?php for ($i = 1; $i <= 6; $i++) { ?>
					<toggle rel="custom_enable_<?= $i ?>">
						<button id="<?= $tpl_id ?>-tab-<?= $i ?>"
						        class="tabs-nav"
						        role="tab"
						        aria-selected="false"
						        aria-controls="<?= $tpl_id ?>-panel-<?= $i ?>">
							<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
							     data-src="get/files/image/galleries/{custom_icon_<?= $i ?>}?resize=0x60"
							     class="lazyload _img-fluid"
							     alt="{custom_label_<?= $i ?>}" height="60" width="60"
							     aria-hidden="true"/>
							<span>{custom_label_<?= $i ?>}</span>
						</button>
					</toggle>
				<?php } ?>
			</div>
			<div class="tabs-nav-indicator"><span></span></div>
		</div>
		<div class="tabs-panels">
			<?php for ($i = 1; $i <= 6; $i++) { ?>
				<toggle rel="custom_enable_<?= $i ?>">
					<div id="<?= $tpl_id ?>-panel-<?= $i ?>"
					     class="tabs-panel"
					     role="tabpanel"
					     tabindex="0"
					     aria-labelledby="<?= $tpl_id ?>-tab-<?= $i ?>">
						<mwPageArea rel="tabsPanel<?= $i ?>" info="Tabs #<?= $i ?> Panel" sortable="page"></mwPageArea>
					</div>
				</toggle>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $tabs = $('#<?= $tpl_id ?>');
			var $navs = $tabs.find('.tabs-nav');
			var $panels = $tabs.find('.tabs-panel');
			var $indicator = $tabs.find('.tabs-nav-indicator span');

			var $activeNav = $navs.eq(0);
			var $activePanel = $panels.eq(0);

			//--------------------------------
			// Init
			//--------------------------------
			//
			// Init nav & panel
			//
			$activeNav.addClass('active').attr('aria-selected', 'true');
			$activePanel.addClass('active');

			// Init indicator
			//
			$indicator.width($activeNav.outerWidth());

			//--------------------------------
			// Toggle tabs
			//--------------------------------
			//
			$navs.on('click', function () {

				// Selectors
				//
				var $this = $(this);
				var INDEX = $this.index();

				// Hide tabs
				//
				$activeNav.removeClass('active').attr('aria-selected', 'false');
				$activePanel.removeClass('active');

				// Update index
				//
				$activeNav = $navs.eq(INDEX);
				$activePanel = $panels.eq(INDEX);

				// Toggle tab
				//
				$activeNav.addClass('active').attr('aria-selected', 'true');
				$activePanel.addClass('active');

				// Update indicator
				//
				$indicator.css({
					left: $activeNav.position().left,
					width: $activeNav.outerWidth()
				});
			});

			//--------------------------------
			// Indicator
			//--------------------------------
			//
			$navs.on('mouseenter', function () {
				var $this = $(this);
				$indicator.css({left: $this.position().left, width: $this.outerWidth()});
			});

			$navs.on('mouseleave', function () {
				$indicator.css({left: $activeNav.position().left, width: $activeNav.outerWidth()});
			});
		})();
	});
</script>