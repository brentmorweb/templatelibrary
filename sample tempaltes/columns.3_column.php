<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Layout:</dt>
		<dd>
			<select name="custom_layout">
				<option value="33_33_33" selected="selected">33% | 33% | 33% (default)</option>
				<option value="25_50_25">25% | 50% | 25%</option>
				<option value="50_25_25">50% | 25% | 25%</option>
				<option value="25_25_50">25% | 25% | 50%</option>
			</select>
		</dd>
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
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog">
		<dt>Mobile Breakpoint:</dt>
		<dd>
			<select name="custom_mobile_breakpoint">
				<option value="xs">375px</option>
				<option value="sm">575px</option>
				<option value="md">767px</option>
				<option value="lg" selected="selected">991px (default)</option>
				<option value="xl">1199px</option>
				<option value="xxl">1365px</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="row {custom_alignment} {custom_gap}" data-tpl-tooltip="Columns - 3 Column">
	<toggle rel="custom_layout" value="33_33_33">
		<div class="col-{custom_mobile_breakpoint}-4">
			<mwPageArea rel="column1" info="Column 1" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-4">
			<mwPageArea rel="column2" info="Column 2" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-4">
			<mwPageArea rel="column3" info="Column 3" sortable="page"></mwPageArea>
		</div>
	</toggle>
	<toggle rel="custom_layout" value="25_50_25">
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column1" info="Column 1" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-6">
			<mwPageArea rel="column2" info="Column 2" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column3" info="Column 3" sortable="page"></mwPageArea>
		</div>
	</toggle>
	<toggle rel="custom_layout" value="50_25_25">
		<div class="col-{custom_mobile_breakpoint}-6">
			<mwPageArea rel="column1" info="Column 1" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column2" info="Column 2" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column3" info="Column 3" sortable="page"></mwPageArea>
		</div>
	</toggle>
	<toggle rel="custom_layout" value="25_25_50">
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column1" info="Column 1" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-3">
			<mwPageArea rel="column2" info="Column 2" sortable="page"></mwPageArea>
		</div>
		<div class="col-{custom_mobile_breakpoint}-6">
			<mwPageArea rel="column3" info="Column 3" sortable="page"></mwPageArea>
		</div>
	</toggle>
</div>