<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dt>Orientation:</dt>
		<dd>
			<select name="custom_orientation">
				<option value="is-vertical" selected="selected">Top to Bottom (default)</option>
				<option value="is-horizontal">Left to Right</option>
			</select>
		</dd>
	</dl>
	<?php for ($i = 1; $i <= 10; $i++) { ?>
		<dl class="mwDialog _tpl-box">
			<dt class="formGroup">Tab #<?= $i ?></dt>
			<dd>
				<input type="checkbox" name="custom_enable_<?= $i ?>" cap="Enable Tab #<?= $i ?>" <?=($i>=1&&$i<=3)?'checked':''?> />
			</dd>
			<dt>Label</dt>
			<dd>
				<textarea name="custom_label_<?= $i ?>" size="2">Tab #<?= $i ?></textarea>
			</dd>
		</dl>
	<?php } ?>
</tplOptions>

<div id="<?= $tpl_id ?>" class="tabs tabs-style-2 {custom_orientation} _js-tabs" data-tpl-tooltip="Tabs - Style 2">
	<div class="tabs-wrap">
		<div class="tabs-navs" role="tablist" aria-label="Tabs">
			<?php for ($i = 1; $i <= 10; $i++) { ?>
				<toggle rel="custom_enable_<?= $i ?>">
					<button id="<?= $tpl_id ?>-tab-<?= $i ?>"
					        class="tabs-nav"
					        role="tab"
					        aria-selected="false"
					        aria-controls="<?= $tpl_id ?>-panel-<?= $i ?>">
						<span>{custom_label_<?= $i ?>}</span>
					</button>
				</toggle>
			<?php } ?>
		</div>
		<div class="tabs-panels">
			<?php for ($i = 1; $i <= 10; $i++) { ?>
				<toggle rel="custom_enable_<?= $i ?>">
					<div id="<?= $tpl_id ?>-panel-<?= $i ?>"
					     class="tabs-panel"
					     role="tabpanel"
					     tabindex="0"
					     aria-labelledby="<?= $tpl_id ?>-tab-<?= $i ?>">
						<mwPageArea rel="tabsPanel<?= $i ?>" info="Tabs #<?= $i ?> Panel" sortable="page"></mwPageArea>
					</div>
				</toggle>
			<?php } ?>
		</div>
	</div>
</div>