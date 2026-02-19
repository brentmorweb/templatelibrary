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
		<dt>Alignment:</dt>
		<dd>
			<select name="custom_alignment">
				<option value="" selected="selected">Align columns top (default)</option>
				<option value="_align-items-center">Align columns centered</option>
				<option value="_align-items-end">Align columns bottom</option>
			</select>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Left Column</dt>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color_l" value="" cap="None" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color_l" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color_l" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color_l" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color_l" value="_bg-dark" cap="Dark"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color_l" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color_l" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color_l" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color_l" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color_l" value="_bg-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color_l" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color_l" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color_l" value="_bg-fourth" cap="Fourth"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Right Column</dt>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color_r" value="" cap="None" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color_r" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color_r" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color_r" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color_r" value="_bg-dark" cap="Dark"/>
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color_r" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color_r" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color_r" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color_r" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color_r" value="_bg-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color_r" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color_r" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color_r" value="_bg-fourth" cap="Fourth"/>
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

<div id="<?= $tpl_id ?>" class="colored-columns colored-columns-2c row _gutter-0 _content-style" data-tpl-tooltip="Colored Columns - 2 Column">
	<toggle rel="custom_layout" value="20_80">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-2 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-10 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="30_70">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-4 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-8 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="40_60">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-5 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-7 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="50_50">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-6 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-6 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="60_40">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-7 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-5 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="70_30">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-8 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-4 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>

	<toggle rel="custom_layout" value="80_20">
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-10 {custom_bg_color_l}">
			<div class="_spa-60">
				<mwPageArea rel="column1" info="Left Column" sortable="page"></mwPageArea>
			</div>
		</div>
		<div class="_d-flex {custom_alignment} col-{custom_mobile_breakpoint}-2 {custom_bg_color_r}">
			<div class="_spa-60">
				<mwPageArea rel="column2" info="Right Column" sortable="page"></mwPageArea>
			</div>
		</div>
	</toggle>
</div>