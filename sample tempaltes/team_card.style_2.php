<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Image</dt>
		<dt>Image File:</dt>
		<dd><input name="custom_img" from="galleryFiles"/></dd>
		<dt>Image Alt:</dt>
		<dd><input type="text" name="custom_img_alt"/></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Details</dt>
		<dt>Name:</dt>
		<dd><input type="text" name="custom_name" value="Add a Name"/></dd>
		<dt>Title:</dt>
		<dd><textarea name="custom_title" size="3"></textarea></dd>
		<dt>Bio:</dt>
		<dd><textarea name="custom_bio" class="richEdit compact" size="8"></textarea></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Contacts</dt>
		<dt>Phone:</dt><dd><input type="text" name="custom_phone"/></dd>
		<dt>Email:</dt><dd><input type="text" name="custom_email"/></dd>
	    <dt>Linkedin:</dt><dd><input type="text" name="custom_linkedin"/></dd>
	    <dt>Facebook:</dt><dd><input type="text" name="custom_facebook"/></dd>
	    <dt>Instagram:</dt><dd><input type="text" name="custom_instagram"/></dd>
	    <dt>Twitter/x.com:</dt><dd><input type="text" name="custom_twitter"/></dd>
	    <dt>Youtube:</dt><dd><input type="text" name="custom_youtube"/></dd>
	    <dt>Tiktok:</dt><dd><input type="text" name="custom_tiktok"/></dd>
	</dl>
</tplOptions>
<tplOptions caption="Settings" order="2">
    <dl class="mwDialog">
		<dt>Enable Popup:</dt>
		<dd>
			<select name="custom_enable_popup">
				<option value="1" selected="selected">Enable (default)</option>
				<option value="0">Disable</option>
			</select>
		</dd>
    </dl>
</tplOptions>
<tplOptions caption="Accessibility" order="2">
	<dl class="mwDialog">
		<dd>
			<div class="alert alert-style-1 is-info _mb-0">
				<div class="alert-wrap">
					<i class="alert-icon fa-solid fa-bell"></i>
					<div class="alert-content">
						<p><b>Accessibility Compliance</b></p>
						<p>As per <a href="https://www.w3.org/WAI/tutorials/page-structure/headings/" target="_blank">WAI guidelines</a>, Ensure you use the following option(s) to set the appropriate tag for your heading. Non-compliance risks rendering the page inaccessible.</p>
					</div>
				</div>
			</div>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Heading Hierarchy</dt>
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

<div id="<?= $tpl_id ?>" class="team-card team-card-style-2" data-tpl-tooltip="Team Card - Style 2">
    <div class="team-card-wrap" data-mh="team-card-style-2-wrap-height">

	    <!-- Image -->
	    <div class="team-card-img _ratio-34">
		    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
		         data-src="/get/files/image/galleries/{custom_img}?resize=600x0"
		         class="lazyload _img-fluid"
		         alt="{custom_img_alt}" width="300" height="450"
		         onerror="this.style.display='none'; this.parentNode.classList.add('_img-placeholder-add-img');">
	    </div>

	    <!-- Body -->
	    <div class="team-card-body">
		    <?php for ($i = 1; $i <= 6; $i++) { ?>
			    <toggle rel="custom_heading_tag" value="h<?= $i ?>">
				    <h<?= $i ?> class="team-card-name">{custom_name}</h<?= $i ?>>
			    </toggle>
		    <?php } ?>
		    <p class="team-card-title">{custom_title}</p>
	    </div>

	    <!-- Popup Dialog -->
	    <toggle rel="custom_enable_popup">
		    <button class="team-card-open-btn" aria-expanded="false" aria-controls="<?= $tpl_id ?>-dialog" aria-label="Read More about {custom_name}">
			    <span class="_sr-only">Read More about {custom_name}</span>
		    </button>

		    <div id="<?= $tpl_id ?>-dialog" class="team-card-dialog" role="dialog" aria-modal="true" aria-labelledby="<?= $tpl_id ?>-dialog-label">
			    <button class="team-card-dialog-close-btn" aria-label="Close Dialog">
				    <i class="fa-solid fa-times" aria-hidden="true"></i>
			    </button>
			    <div class="team-card-dialog-img">
				    <picture>
					    <source data-srcset="/get/files/image/galleries/{custom_img}?resize=1200x0" media="(min-width: 600px)"/>
					    <source data-srcset="/get/files/image/galleries/{custom_img}?resize=600x0" media="(max-width: 599px)"/>
					    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
					         data-src="/get/files/image/galleries/{custom_img}?resize=600x0"
					         class="lazyload _img-fluid"
					         alt="{alt}" width="960" height="1440"/>
				    </picture>
			    </div>
			    <div class="team-card-dialog-right">
				    <div class="team-card-dialog-right-inner">

					    <h3 id="<?= $tpl_id ?>-dialog-label" class="team-card-dialog-name">{custom_name}</h3>
					    <p class="team-card-dialog-title">{custom_title}</p>
					    <nav class="team-card-dialog-contact sns-link sns-link-default large" aria-label="{custom_name}'s Contact Info and Social Media">
						    <ul>
							    <toggle rel="custom_phone"><li><a href="tel:{custom_phone}" target="_blank"><span class="_sr-only">Phone: </span><i class="fa-solid fa-phone" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_email"><li><a href="mailto:{custom_email}" target="_blank"><span class="_sr-only">Email: </span><i class="fa-solid fa-email" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_linkedin"><li><a href="{custom_linkedin}" target="_blank"><span class="_sr-only">Linkedin: </span><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_facebook"><li><a href="{custom_facebook}" target="_blank"><span class="_sr-only">Facebook: </span><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_instagram"><li><a href="{custom_instagram}" target="_blank"><span class="_sr-only">Instagram: </span><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_twitter"><li><a href="{custom_twitter}" target="_blank"><span class="_sr-only">Twitter: </span><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_youtube"><li><a href="{custom_youtube}" target="_blank"><span class="_sr-only">Youtube: </span><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li></toggle>
							    <toggle rel="custom_tiktok"><li><a href="{custom_tiktok}" target="_blank"><span class="_sr-only">Tiktok: </span><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a></li></toggle>
						    </ul>
					    </nav>
					    <div class="team-card-dialog-des _mce-style">{custom_bio}</div>
				    </div>
			    </div>
		    </div>
	    </toggle>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

		//-----------------------------------------------------------
		//
		// Toggle Dialog
		//
		//-----------------------------------------------------------
		//
		(function () {
			var $body = $('body');
			var $el = $('#<?= $tpl_id ?>');
			var $dialog = $el.find('.team-card-dialog');
			var $openBtn = $el.find('.team-card-open-btn');
			var $closeBtn = $el.find('.team-card-dialog-close-btn');

			function closeDialog() {
				$body.removeClass('_overflow-hidden');
				$dialog.fadeOut(200);
				$openBtn.attr('aria-expanded', 'false').focus();
			}

			//--------------------------------
			// Open Dialog
			//--------------------------------
			//
			$openBtn.on('click', function () {
				$body.addClass('_overflow-hidden');
				$openBtn.attr('aria-expanded', 'true');
				$dialog.fadeIn(200);
				$closeBtn.focus();
			});

			//--------------------------------
			// Close Dialog
			//--------------------------------
			//
			$closeBtn.on('click', function () {
				closeDialog();
			});

			//--------------------------------
			// Keyboard Trap
			//--------------------------------
			//
			$dialog.on('keydown', function(e) {
				var $focusableEls = $dialog.find('a, button, :input, [tabindex]:not([tabindex="-1"])');
				var $firstFocusable = $focusableEls.first();
				var $lastFocusable = $focusableEls.last();

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