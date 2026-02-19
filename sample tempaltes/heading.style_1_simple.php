<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Heading</dt>
		<dt>Alignment:</dt>
		<dd>
			<select name="custom_align">
				<option value="_text-center">Center</option>
				<option value="_text-left" selected="selected">Left (default)</option>
				<option value="_text-right">Right</option>
			</select>
		</dd>
		<dt>Heading Text:</dt>
		<dd><textarea name="custom_text" size="2">Please Add a Title</textarea></dd>
		<dd>
			<div class="cell-50">
				<label>Heading Tag:</label>
				<select name="custom_tag">
					<option value="h1">H1 Tag</option>
					<option value="h2" selected="selected">H2 Tag (default)</option>
					<option value="h3">H3 Tag</option>
					<option value="h4">H4 Tag</option>
					<option value="h5">H5 Tag</option>
					<option value="h6">H6 Tag</option>
					<option value="p">P Tag (paragraph)</option>
				</select>
			</div>
			<div class="cell-50">
				<label>Heading Size:</label>
				<select name="custom_size">
					<option value="" selected="selected">Default Size</option>
					<option value="h1">H1 Size</option>
					<option value="h2">H2 Size</option>
					<option value="h3">H3 Size</option>
					<option value="h4">H4 Size</option>
					<option value="h5">H5 Size</option>
					<option value="h6">H6 Size</option>
					<option value="paragraph">Paragraph Size</option>
				</select>
			</div>
		</dd>
		<dd>
			<div class="cell-50">
				<label>Heading Style:</label>
				<select name="custom_style">
					<option value="" selected="selected">Default</option>
					<option value="_font-sans-serif">Sans Serif</option>
					<option value="_font-sans-serif _font-italic">Sans Serif Italic</option>
					<option value="_font-serif">Serif</option>
					<option value="_font-serif _font-italic">Serif Italic</option>
				</select>
			</div>
			<div class="cell-50">
				<label>Heading Weight:</label>
				<select name="custom_weight">
					<option value="" selected="selected">Default</option>
					<option value="_font-thin">Thin</option>
					<option value="_font-normal">Normal</option>
					<option value="_font-semi-bold">Semi Bold</option>
					<option value="_font-bold">Bold</option>
				</select>
			</div>
		</dd>
		<dt>Heading Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_color" value="_text-primary" cap="Primary" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_color" value="_text-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_color" value="_text-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_color" value="_text-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_color" value="_text-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_color" value="_text-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_color" value="_text-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_color" value="_text-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_color" value="_text-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_color" value="_text-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_color" value="_text-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_color" value="_text-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>
</tplOptions>
<tplOptions caption="Advanced" order="2">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Anchor ID</dt>
		<dd>
			<input type="text" name="custom_id"/>
		</dd>
		<dd class="_tpl-info">Example: <strong>anchor-id</strong> (no space, no # hash, no uppercase)</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="heading heading-style-1 {custom_align}" data-tpl-tooltip="Heading- Style 1 Simple">
	<div id="{custom_id}" class="heading-wrap">
		<div class="heading-inner">
			<?php for ($i = 1; $i <= 6; $i++) { ?>
				<toggle rel="custom_tag" value="h<?= $i ?>">
					<h<?= $i ?> class="heading-text _pre-line {custom_color} {custom_size} {custom_style} {custom_weight}">{custom_text}</h<?= $i ?>>
				</toggle>
			<?php } ?>
			<toggle rel="custom_tag" value="p">
				<p class="heading-text _pre-line {custom_color} {custom_size} {custom_style} {custom_weight}">{custom_text}</p>
			</toggle>
		</div>
	</div>
</div>