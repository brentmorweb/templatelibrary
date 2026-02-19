<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Icon:</dt>
		<dd>
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-bell" cap="" checked="checked"/>
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-thumbs-up" cap="" />
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-bullhorn" cap="" />
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-exclamation" cap="!" />
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-circle-exclamation" cap="" />
			<input type="radio" class="cell-25 _font-icon" name="custom_icon" value="fa-solid fa-triangle-exclamation" cap="" />
		</dd>
		<dt>Type:</dt>
		<dd>
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-info" cap="Info (default)" style="background-image: url('/images/static/template-options/alert.style_1_info.png');" checked="checked" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-success" cap="Success" style="background-image: url('/images/static/template-options/alert.style_1_success.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-warning" cap="Warning" style="background-image: url('/images/static/template-options/alert.style_1_warning.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-error" cap="Error" style="background-image: url('/images/static/template-options/alert.style_1_error.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-white" cap="White" style="background-image: url('/images/static/template-options/alert.style_1_white.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-light" cap="Light" style="background-image: url('/images/static/template-options/alert.style_1_light.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-gray" cap="Gray" style="background-image: url('/images/static/template-options/alert.style_1_gray.png');" />
			<input type="radio" class="cell-25 _tpl-checkbox-img" name="custom_type" value="is-dark" cap="Dark" style="background-image: url('/images/static/template-options/alert.style_1_dark.png');" />
		</dd>
		<dt>Content:</dt>
		<dd>
			<textarea name="custom_content" class="richEdit compact" size="8"><h2>Please Add a Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel hendrerit dui, nec vestibulum ligula. In vitae ipsum a sem dictum convallis. Sed urna nibh, dapibus eget metus in, hendrerit placerat leo. Morbi lacinia lobortis elit, <a href="/Demo-Alerts">vitae finibus lorem lacinia vel</a>.</p></textarea>
		</dd>
	</dl>
</tplOptions>

<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Temporary hide this alert from the public:</dt>
		<dd>
			<select name="custom_temp_hide">
				<option value="" selected="selected">Disable (default)</option>
				<option value="is-temp-hide">Enable</option>
			</select>
		</dd>
		<dt>Enable close button:</dt>
		<dd>
			<select name="custom_enable_close_btn">
				<option value="0">Disable</option>
				<option value="1" selected="selected">Enable (default)</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="alert alert-style-1 {custom_type} {custom_temp_hide}" role="alert" data-tpl-tooltip="Alert - Style 1">

	<div class="alert-wrap">

		<!-- Icon -->
		<i class="alert-icon {custom_icon}" aria-hidden="true"></i>

		<!-- Content -->
		<div class="alert-content">{custom_content}</div>

		<!-- Close Button -->
		<toggle rel="custom_enable_close_btn">
			<button class="alert-close">
				<span class="_sr-only">Dismiss alert</span>
				<i class="fa-solid fa-times" aria-hidden="true"></i>
			</button>
		</toggle>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function() {
			$('#<?= $tpl_id ?> .alert-close').on('click', function () {
				$('#<?= $tpl_id ?>').remove();
			});
		})();
	});
</script>