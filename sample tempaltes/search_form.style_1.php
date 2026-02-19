<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Input Placeholder:</dt>
		<dd>
			<input type="text" name="custom_input_placeholder" value="Search..."/>
		</dd>
		<dt>Button Label:</dt>
		<dd>
			<input type="text" name="custom_btn_label" value="Search"/>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="search-form search-form-style-1 _js-apply-mw-form-style _mb-30" data-tpl-tooltip="Search Form - Style 1">
	<div class="search-form-wrap">
		<form action="/search" method="get">
			<div class="Dialog">
				<div class="input-inline">
					<input type="text" name="q" value="" title="Search" placeholder="{custom_input_placeholder}">
					<input type="submit" value="Submit" class="mwFormSubmit">
				</div>
			</div>
		</form>
	</div>
</div>