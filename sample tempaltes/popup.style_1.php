<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Popup Dialog</dt>
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
		<dt class="formGroup">Cookie Configurations</dt>
		<dt>Delay Timer (seconds):</dt>
		<dd>
			<input type="text" name="custom_delay_timer" value="5"/>
		</dd>
		<dt>Expiration (days):</dt>
		<dd>
			<input type="text" name="custom_cookie_expiration" value="7"/>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="popup popup-style-1 {custom_dialog_size}" data-tpl-tooltip="Popup - Style 1">
	<div class="popup-wrap">

		<!-- Editor -->
		<div class="popup-editor _hide-from-public">
			<div class="content-card content-card-style-1">
				<div class="content-card-wrap">
					<div class="content-card-header">
						<h2 class="h5">Popup Configuration</h2>
					</div>
					<div class="content-card-body _mce-style">
						<div class="row _gutter-120 _mb-30">
							<div class="col-lg-6 _border-right">
								<h3 class="h6 _mb-10">Delay Timer:</h3>
								<p>The popup is set to appear <span class="badge badge-primary badge-md">{custom_delay_timer}</span> seconds after this page has loaded.</p>
								<h3 class="h6 _mb-10">Cookie Expiration:</h3>
								<p>The popup's cookie is set to expire after <span class="badge badge-primary badge-md">{custom_cookie_expiration}</span> days.</p>
								<h3 class="h6 _mb-10">Status:</h3>
								<p class="popup-status _mb-0"></p>
							</div>
							<div class="col-lg-6">
								<h3 class="h6 _mb-10">Important Note:</h3>
								<ul>
									<li>This configuration section is hidden from public view.</li>
									<li>To modify these settings, right-click in this area and select <span class="badge badge-primary badge-md">Edit Template</span></li>
									<li>Should there be any adjustments to the popup's settings, ensure to click the <span class="badge badge-primary badge-md">Reset Popup</span> button below to apply changes and then refresh the page.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="content-card-footer">
						<div class="btn-group _col-gap-10">
							<div class="btn is-primary"><button class="popup-edit-btn medium">Edit Popup</button></div>
							<div class="btn is-outline is-primary "><button class="popup-reset-btn medium"><span>Reset Popup</span></button></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="popup-container">
			<div class="popup-dialog">
				<button class="popup-close-btn" aria-label="Close Popup Window"><i class="fa-solid fa-times"></i></button>
				<div class="popup-inner">
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

			//--------------------------------
			// Selectors
			//--------------------------------
			//
			var $body                 = $('body');
			var $el                   = $('#<?= $tpl_id ?>')
			var $status               = $('.popup-status', $el)
			var $editBtn              = $('.popup-edit-btn', $el);
			var $resetBtn             = $('.popup-reset-btn', $el);
			var $closeBtn             = $('.popup-close-btn', $el);
			var $container            = $('.popup-container', $el);

			//--------------------------------
			// Parameters
			//--------------------------------
			//
			var DELAY                   = 5000;
			var NEW_DELAY               = parseInt('{custom_delay_timer}') * 1000;
			var COOKIE_EXPIRATION       = 7;
			var NEW_COOKIE_EXPIRATION   = parseInt('{custom_cookie_expiration}');
			var CNAME                 = 'POPUP_ADVANCED';
			var CVALUE                = 'READ';

			//--------------------------------
			// Check Cookie Status
			//--------------------------------
			//
			checkCookie(CNAME);

			//--------------------------------
			// Delay Timer
			//--------------------------------
			//
			if (!isNaN(NEW_DELAY) && typeof NEW_DELAY === "number") {
				DELAY = NEW_DELAY;
				// console.log('The popup timer is set to ' + NEW_DELAY + ' milliseconds');
			} else {
				// console.log('The popup timer uses default 5000 milliseconds');
			}

			if (!getCookie(CNAME)) {
				setTimeout(function () {
					openPopup();
				}, DELAY);
			}

			//--------------------------------
			// Cookie
			//--------------------------------
			//
			if (!isNaN(NEW_COOKIE_EXPIRATION) && typeof NEW_COOKIE_EXPIRATION === "number") {
				COOKIE_EXPIRATION = NEW_COOKIE_EXPIRATION;
				// console.log('The popup cookies history is set to ' + NEW_COOKIE_EXPIRATION + ' days');
			} else {
				// console.log('The popup cookies history uses default 7 days');
			}

			//--------------------------------
			// Click Events
			//--------------------------------
			//
			$editBtn.on('click', function () {
				openPopup();
			});

			$resetBtn.click(function () {
				deleteCookie(CNAME);
				checkCookie(CNAME);
			});

			$closeBtn.on('click', function () {
				closePopup();
				setCookie(CNAME, CVALUE, COOKIE_EXPIRATION);
				checkCookie(CNAME);
			});

			$container.on('click', function (e) {
				if (e.target !== this) {
					return;
				}

				closePopup();
				setCookie(CNAME, CVALUE, COOKIE_EXPIRATION);
				checkCookie(CNAME);
			});

			//--------------------------------
			// Functions
			//--------------------------------
			//
			function openPopup() {
				$body.addClass('_overflow-hidden');
				$container.fadeIn(400);
				$el.addClass('active');
			}

			function closePopup() {
				$body.removeClass('_overflow-hidden');
				$container.fadeOut(400);
				$el.removeClass('active');
			}

			function checkCookie(cname) {
				var match = getCookie(cname);

				$status.html(
					match
					? 'The popup cookie has been saved by your browser. To view the popup again, click the <span class="badge badge-primary">Reset Popup<\/span> button and then refresh the page.'
					: 'Your browser has no saved popup cookie, the popup will appear <span class="badge badge-primary">{custom_delay_timer}<\/span> seconds after the page loads.'
				);
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
	});
</script>