<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Gap:</dt>
		<dd>
			<select name="custom_gap">
				<option value="_gutter-0">None</option>
				<option value="_gutter-10">Small</option>
				<option value="_gutter-30" selected="selected">Medium (default)</option>
				<option value="_gutter-60">Large</option>
				<option value="_gutter-80">Extra Large</option>
			</select>
		</dd>
		<dt>Alignment:</dt>
		<dd>
			<select name="custom_alignment">
				<option value="" selected="selected">Align columns top (default)</option>
				<option value="_align-items-center">Align columns centered</option>
				<option value="_align-items-end">Align columns bottom</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="row {custom_alignment} {custom_gap}" data-tpl-tooltip="Columns - 4 Column">
	<div class="col-xl-3 col-lg-6">
		<mwPageArea rel="column1" info="Column 1" sortable="page"></mwPageArea>
	</div>
	<div class="col-xl-3 col-lg-6">
		<mwPageArea rel="column2" info="Column 2" sortable="page"></mwPageArea>
	</div>
	<div class="col-xl-3 col-lg-6">
		<mwPageArea rel="column3" info="Column 3" sortable="page"></mwPageArea>
	</div>
	<div class="col-xl-3 col-lg-6">
		<mwPageArea rel="column4" info="Column 4" sortable="page"></mwPageArea>
	</div>
</div>