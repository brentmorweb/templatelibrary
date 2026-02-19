<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Dialog</dt>
		<dt>Dialog Size:</dt>
		<dd>
			<select name="custom_dialog_size">
				<option value="is-sm" selected="selected">Small (default)</option>
				<option value="is-md">Medium</option>
				<option value="is-lg">Large</option>
			</select>
		</dd>
		<dt>Content Type:</dt>
		<dd>
			<select name="custom_content_type">
				<option value="img_text_btn" selected="selected">Image, Text & Button (default)</option>
				<option value="text_btn">Text & Button</option>
				<option value="text_only">Text Only</option>
				<option value="custom">Custom</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Button</dt>
		<dt>Button Label:</dt>
		<dd>
			<input type="text" name="custom_btn_label" value="Learn More" />
		</dd>
		<dt>Button Style:</dt>
		<dd>
			<select name="custom_btn_style">
				<option value="" selected="selected">Rectangle Solid (default)</option>
				<option value="is-outline">Rectangle Outline</option>
				<option value="is-rounded">Rounded Solid</option>
				<option value="is-rounded is-outline">Rounded Outline</option>
			</select>
		</dd>
		<dt>Button Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_btn_color" value="is-primary" cap="Primary" checked="checked" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_btn_color" value="is-secondary" cap="Secondary" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_btn_color" value="is-third" cap="Third" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_btn_color" value="is-fourth" cap="Fourth" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_btn_color" value="is-white" cap="White" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_btn_color" value="is-light" cap="Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_btn_color" value="is-gray" cap="Gray" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_btn_color" value="is-dark" cap="Dark" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_btn_color" value="is-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_btn_color" value="is-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_btn_color" value="is-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_btn_color" value="is-fourth-light" cap="Fourth Light" />
		</dd>
		<dt>Button Size:</dt>
		<dd>
			<select name="custom_btn_size">
				<option value="small">Small</option>
				<option value="medium" selected="selected">Medium (default)</option>
				<option value="large">Large</option>
			</select>
		</dd>
		<dt>Button Alignment:</dt>
		<dd>
			<select name="custom_btn_align">
				<option value="mwBtnCenter" selected="selected">Center (default)</option>
				<option value="mwBtnLeft">Left</option>
				<option value="mwBtnRight">Right</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="modal modal-style-1 {custom_dialog_size}" data-tpl-tooltip="Modal - Style 1">
	<div class="modal-wrap">

		<!-- Modal Button -->
		<div class="{custom_btn_align}">
			<div class="btn {custom_btn_style} {custom_btn_color}">
				<button id="<?= $tpl_id ?>-open-btn"
				        class="modal-btn {custom_btn_size}"
				        aria-expanded="false"
				        aria-controls="<?= $tpl_id ?>-dialog">
					<span>{custom_btn_label}</span>
				</button>
			</div>
		</div>

		<!-- Modal Container -->
		<div id="<?= $tpl_id ?>-container" class="modal-container">

			<!-- Modal Dialog -->
			<div id="<?= $tpl_id ?>-dialog"
			     class="modal-dialog"
			     role="dialog"
			     aria-modal="true">

				<!-- Modal Close Button -->
				<button id="<?= $tpl_id ?>-close-btn"
				        class="modal-close-btn"
				        aria-label="Close Dialog">
					<i class="fa-solid fa-times" aria-hidden="true"></i>
				</button>

				<!-- Modal Inner -->
				<div class="modal-inner">

					<!-- Image, Text and Button -->
					<toggle rel="custom_content_type" value="img_text_btn">
						<mwWidget rel="mainImg" widget="File" Info="Image" file="dummy-169.jpg" template=""></mwWidget>
						<div class="content-area is-md _content-style">
							<div class="content-area-wrap">
								<div class="container">
									<mwWidget rel="mainText" info="Text Area" widget="Content">
										<h4 style="text-align: center;">Lorem Ipsum</h4>
										<p style="text-align: center;">Aliquam molestie, quam eu vestibulum placerat, lacus augue vehicula est, eu commodo urna magna ut massa. Pellentesque id tortor lectus.</p>
									</mwWidget>
									<mwWidget rel="mainBtn" info="Button" widget="Button" link_text="Learn More" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnCenter"></mwWidget>
								</div>
							</div>
						</div>
					</toggle>

					<!-- Text and Button -->
					<toggle rel="custom_content_type" value="text_btn">
						<div class="content-area is-md _content-style">
							<div class="content-area-wrap">
								<div class="container">
									<mwWidget rel="mainText" info="Text Area" widget="Content">
										<h4 style="text-align: center;">Lorem Ipsum</h4>
										<p style="text-align: center;">Aliquam molestie, quam eu vestibulum placerat, lacus augue vehicula est, eu commodo urna magna ut massa. Pellentesque id tortor lectus.</p>
									</mwWidget>
									<mwWidget rel="mainBtn" info="Button" widget="Button" link_text="Learn More" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnCenter"></mwWidget>
								</div>
							</div>
						</div>
					</toggle>

					<!-- Text Only -->
					<toggle rel="custom_content_type" value="text_only">
						<div class="content-area is-md _content-style">
							<div class="content-area-wrap">
								<div class="container">
									<mwWidget rel="mainText" info="Text Area" widget="Content">
										<h4 style="text-align: center;">Lorem Ipsum</h4>
										<p style="text-align: center;">Aliquam molestie, quam eu vestibulum placerat, lacus augue vehicula est, eu commodo urna magna ut massa. Pellentesque id tortor lectus.</p>
									</mwWidget>
								</div>
							</div>
						</div>
					</toggle>

					<!-- Custom -->
					<toggle rel="custom_content_type" value="custom">
						<mwPageArea rel="mainContent" info="Content Area" sortable="page"></mwPageArea>
					</toggle>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			var $body = $('body');
			var $modal = $('#<?= $tpl_id ?>');
			var $openBtn = $('#<?= $tpl_id ?>-open-btn');
			var $closeBtn = $('#<?= $tpl_id ?>-close-btn');
			var $dialog = $('#<?= $tpl_id ?>-dialog');
			var $container = $('#<?= $tpl_id ?>-container');

			var $focusableEls = $dialog.find('a, button, :input, [tabindex]:not([tabindex="-1"])');
			var $firstFocusable = $focusableEls.first();
			var $lastFocusable = $focusableEls.last();

			//--------------------------------
			// Functions
			//--------------------------------
			//
			function openDialog() {
				$body.addClass('_overflow-hidden');
				$modal.addClass('active');
				$container.fadeIn(400);
				$openBtn.attr('aria-expanded', 'true');
				$closeBtn.focus();
			}

			function closeDialog() {
				$body.removeClass('_overflow-hidden');
				$modal.removeClass('active');
				$container.fadeOut(400);
				$openBtn.attr('aria-expanded', 'false');
				$openBtn.focus();
			}

			//--------------------------------
			// Toggle Dialog
			//--------------------------------
			//
			$openBtn.on('click', function () {
				openDialog();
			});

			$closeBtn.on('click', function () {
				closeDialog();
			});

			$container.on('click', function (e) {
				if (e.target === this) {
					closeDialog();
				}
			});

			//--------------------------------
			// Keyboard Trap
			//--------------------------------
			//
			$dialog.on('keydown', function(e) {
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
						closeDialog();
						break;
				}
			});
		})();
	});
</script>