<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Width:</dt>
		<dd>
			<select name="custom_width">
				<option value="480">480 pixel wide</option>
				<option value="570">570 pixel wide</option>
				<option value="670" selected="selected">670 pixel wide (default)</option>
				<option value="770">770 pixel wide</option>
				<option value="870">870 pixel wide</option>
				<option value="970">970 pixel wide</option>
				<option value="1170">1170 pixel wide</option>
				<option value="1240">1240 pixel wide</option>
			</select>
		</dd>
		<dt>Position:</dt>
		<dd>
			<select name="custom_position">
				<option value="_mx-auto" selected="selected">Center (default)</option>
				<option value="_mr-auto">Left</option>
				<option value="_ml-auto">Right</option>
			</select>
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Custom Width</dt>
		<dd>
		    <input type="checkbox" name="custom_enable_custom_width" cap="Enable Custom Width"/>
		</dd>
		<dt>Specify a Custom Width:</dt>
		<dd>
			<input type="number" name="custom_custom_width"/>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="content-width _content-style" data-tpl-tooltip="Content Width">
	<toggle rel="custom_enable_custom_width" value="0">
		<div class="content-width-wrap {custom_position}" style="max-width: {custom_width}px;">
			<mwPageArea rel="mainContent" info="{custom_width} Pixel Wide Content Area" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_enable_custom_width" value="1">
		<div class="content-width-wrap {custom_position}" style="max-width: {custom_custom_width}px;">
			<mwPageArea rel="mainContent" info="{custom_custom_width} Pixel Wide Content Area" sortable="page"></mwPageArea>
		</div>
	</toggle>
</div>