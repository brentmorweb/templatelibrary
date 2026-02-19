<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Color</dt>
		<dt>Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_color" value="is-white" cap="White" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_color" value="is-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_color" value="is-primary" cap="Primary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_color" value="is-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_color" value="is-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_color" value="is-fourth" cap="Fourth"/>
		</dd>
	</dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="count-up count-up-style-2 is-card _js-count-up {custom_color}" data-tpl-tooltip="Count Up - Style 2">
	<div class="count-up-wrap">
		<div class="count-up-item">
			<h2 class="count-up-item-wrap">
				<span class="count-up-number">
					<span class="count-up-prefix"></span>
					<span class="count-up-num">50</span>
					<span class="count-up-suffix">+</span>
				</span>
				<span class="count-up-label">Lorem Ipsum Praesent</span>
			</h2>
		</div>
		<div class="count-up-item">
			<h2 class="count-up-item-wrap">
				<span class="count-up-number">
					<span class="count-up-prefix"></span>
					<span class="count-up-num">50</span>
					<span class="count-up-suffix">+</span>
				</span>
				<span class="count-up-label">Lorem Ipsum Praesent</span>
			</h2>
		</div>
		<div class="count-up-item">
			<h2 class="count-up-item-wrap">
				<span class="count-up-number">
					<span class="count-up-prefix"></span>
					<span class="count-up-num">50</span>
					<span class="count-up-suffix">+</span>
				</span>
				<span class="count-up-label">Lorem Ipsum Praesent</span>
			</h2>
		</div>
		<div class="count-up-item">
			<h2 class="count-up-item-wrap">
				<span class="count-up-number">
					<span class="count-up-prefix"></span>
					<span class="count-up-num">50</span>
					<span class="count-up-suffix">+</span>
				</span>
				<span class="count-up-label">Lorem Ipsum Praesent</span>
			</h2>
		</div>
		<div class="count-up-item">
			<h2 class="count-up-item-wrap">
				<span class="count-up-number">
					<span class="count-up-prefix"></span>
					<span class="count-up-num">50</span>
					<span class="count-up-suffix">+</span>
				</span>
				<span class="count-up-label">Lorem Ipsum Praesent</span>
			</h2>
		</div>
	</div>
</div>