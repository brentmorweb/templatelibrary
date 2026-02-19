<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Layout:</dt>
		<dd>
			<select name="custom_layout">
				<option value="20_80">20% | 80%</option>
				<option value="30_70">30% | 70%</option>
				<option value="40_60">40% | 60%</option>
				<option value="50_50" selected="selected">50% | 50% (default)</option>
				<option value="60_40">60% | 40%</option>
				<option value="70_30">70% | 30%</option>
				<option value="80_20">80% | 20%</option>
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
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Mobile Behaviour</dt>
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
		<dt>Reverse Order on Mobile:</dt>
		<dd>
			<select name="custom_mobile_reverse_order">
				<option value="false" selected>Disable (default)</option>
				<option value="true">Enable</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="row {custom_alignment} {custom_gap}" data-tpl-tooltip="Columns - 2 Column">
	<toggle rel="custom_layout" value="20_80">
		<div class="col-left col-{custom_mobile_breakpoint}-2">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-10">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="30_70">
		<div class="col-left col-{custom_mobile_breakpoint}-4">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-8">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="40_60">
		<div class="col-left col-{custom_mobile_breakpoint}-5">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-7">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="50_50">
		<div class="col-left col-{custom_mobile_breakpoint}-6">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-6">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="60_40">
		<div class="col-left col-{custom_mobile_breakpoint}-7">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-5">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="70_30">
		<div class="col-left col-{custom_mobile_breakpoint}-8">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-4">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="80_20">
		<div class="col-left col-{custom_mobile_breakpoint}-10">
			<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
		</div>
		<div class="col-right col-{custom_mobile_breakpoint}-2">
			<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
		</div>
	</toggle>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			const $el = $('#<?= $tpl_id ?>');
			const $colLeft = $el.find('.col-left');
			const $colRight = $el.find('.col-right');

			const isReverse = '{custom_mobile_reverse_order}';
			const breakPoint = '{custom_mobile_breakpoint}';

			if (isReverse === 'true') {
				$colLeft.addClass('order-last order-' + breakPoint + '-first');
				$colRight.addClass('order-first order-' + breakPoint + '-last');
			}
		})();
	});
</script>