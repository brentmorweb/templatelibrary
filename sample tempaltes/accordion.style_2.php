<!--<resource req="site.accordion_style_2" />-->

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dd>
			<div class="alert alert-style-1 is-info _mb-0">
				<div class="alert-wrap">
					<i class="alert-icon fa-solid fa-bell"></i>
					<div class="alert-content"><p>
							<b>To add more accordions, drag and drop it in between existing accordion items.</b></p>
					</div>
				</div>
			</div>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Options</dt>
		<dt>Heading Text:</dt>
		<dd>
			<textarea name="custom_heading" size="2">Please Add a Heading</textarea>
		</dd>
		<dt>Icon:</dt>
		<dd>
			<input type="radio" class="cell-even" name="custom_icon" value="0" cap="None" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-plus" cap="&plus;" checked="checked" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-chevron-down" cap="" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-caret-down" cap="" />
		</dd>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color" value="" cap="None" checked="checked" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Settings</dt>
		<dd>
			<input type="checkbox" name="custom_keep_open" value="active" cap="Set this accordion to open by default" />
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup"><i class="fa-solid fa-universal-access"></i> Accessibility Options</dt>
		<dt>Heading Tag:</dt>
		<dd>
			<select name="custom_heading_tag">
				<option value="h2">H2 Tag</option>
				<option value="h3" selected="selected">H3 Tag (default)</option>
				<option value="h4">H4 Tag</option>
				<option value="h5">H5 Tag</option>
				<option value="h6">H6 Tag</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="accordion accordion-style-2 {custom_keep_open}" data-tpl-tooltip="Accordion - Style 2">
	<div class="accordion-wrap {custom_bg_color}">

		<?php for ($i = 1; $i <= 6; $i++) { ?>
			<toggle rel="custom_heading_tag" value="h<?= $i ?>">
				<h<?= $i ?> class="accordion-header">
					<button id="<?= $tpl_id ?>-btn"
					        aria-expanded="false"
					        aria-controls="<?= $tpl_id ?>-panel">
						<span>{custom_heading}</span>
						<i class="{custom_icon}" aria-hidden="true"></i>
					</button>
				</h<?= $i ?>>
			</toggle>
		<?php } ?>

		<div id="<?= $tpl_id ?>-panel"
		     class="accordion-panel"
		     role="region"
		     aria-labelledby="<?= $tpl_id ?>-btn" >
			<div class="accordion-panel-inner">
				<mwPageArea rel="mainContent" info="Drag and drop widgets or sub-templates here." sortable="page"></mwPageArea>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			var $el = $('#<?= $tpl_id ?>');
			var $btn = $('#<?= $tpl_id ?>-btn');
			var $panel = $('#<?= $tpl_id ?>-panel');

			if ($el.hasClass('active')) {
				$btn.attr('aria-expanded', 'true');
				$panel.show();
			} else {
				$btn.attr('aria-expanded', 'false');
				$panel.hide();
			}

			$btn.on('click', function () {
				if ($el.hasClass('active')) {
					$el.removeClass('active');
					$btn.attr('aria-expanded', 'false');
					$panel.slideUp();
				} else {
					$el.addClass('active');
					$btn.attr('aria-expanded', 'true');
					$panel.slideDown();
				}
			});
		})();
	});
</script>