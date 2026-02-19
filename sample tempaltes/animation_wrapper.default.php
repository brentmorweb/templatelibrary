<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Animation Style:</dt>
		<dd>
			<select name="custom_style">
				<option value="fade-up" selected="selected">Fade Up (default)</option>
				<option value="fade-down">Fade Down</option>
				<option value="fade-right">Fade Right</option>
				<option value="fade-left">Fade Left</option>
				<option value="fade-in">Fade In</option>
				<option value="zoom-in">Zoom In</option>
				<option value="zoom-out">Zoom Out</option>
			</select>
		</dd>
		<dt>Animation Duration:</dt>
		<dd>
			<select name="custom_duration">
				<option value="0.2">0.2 seconds</option>
				<option value="0.4" selected="selected">0.4 seconds (default)</option>
				<option value="0.6">0.6 seconds</option>
				<option value="0.8">0.8 seconds</option>
				<option value="1">1 seconds</option>
				<option value="1.2">1.2 seconds</option>
				<option value="1.4">1.4 seconds</option>
				<option value="1.8">1.8 seconds</option>
				<option value="2">2 seconds</option>
			</select>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Animation Trigger Position (from top):</dt>
		<dd>
			<select name="custom_trigger_position">
				<option value="0">0%</option>
				<option value="0.1">10%</option>
				<option value="0.2">20%</option>
				<option value="0.3">30%</option>
				<option value="0.4">40%</option>
				<option value="0.5">50%</option>
				<option value="0.6">60%</option>
				<option value="0.7">70%</option>
				<option value="0.8" selected="selected">80% (default)</option>
				<option value="0.9">90%</option>
				<option value="1">100%</option>
			</select>
		</dd>
		<dt>Animation Reverse:</dt>
		<dd>
			<select name="custom_reverse">
				<option value="0">Disable</option>
				<option value="1" selected="selected">Enable (default)</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<style type="text/css">
  #<?= $tpl_id ?> { --animation-duration:{custom_duration}s; }
</style>

<div id="<?= $tpl_id ?>" class="animation-wrapper animation-wrapper-default">
	<div class="animation-wrapper-wrap" data-animation="{custom_style}">
		<div class="animation-wrapper-inner {custom_style}">
			<mwPageArea rel="mainContent" info="Animation Content Area" sortable="page"></mwPageArea>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function() {
			var $el = $('#<?= $tpl_id ?>');
			var $inner = $el.find('.animation-wrapper-inner');
			var triggerHook = '{custom_trigger_position}';
			var isReverse = '{custom_reverse}';

			isReverse = isReverse !== '0';

			new ScrollMagic.Scene({
				triggerElement: $el[0],
				triggerHook: triggerHook
			})
				.setClassToggle($inner[0], 'is-animated')
				.reverse(isReverse)
				.addTo(SMController);
		})();
	});
</script>