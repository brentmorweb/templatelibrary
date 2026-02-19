<!--<resource req="site.accordion_style_1" />-->

<tplOptions caption="Options" order="1">
	<dl class="mwDialog">
		<dd>
			<div class="alert alert-style-1 is-info _mb-0">
				<div class="alert-wrap">
					<i class="alert-icon fa-solid fa-bell"></i>
					<div class="alert-content"><p>
							<b>To add more accordions, drag and drop it in between existing accordion items.</b></p>
					</div>
				</div>
			</div>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Options</dt>
		<dt>Heading Text:</dt>
		<dd>
			<textarea name="custom_heading" size="2">Please Add a Heading</textarea>
		</dd>
		<dt>Icon:</dt>
		<dd>
			<input type="radio" class="cell-even" name="custom_icon" value="0" cap="None" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-plus" cap="&plus;" checked="checked" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-chevron-down" cap="" />
			<input type="radio" class="cell-even _font-icon" name="custom_icon" value="fa-solid fa-caret-down" cap="" />
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
	    <dt class="formGroup">Settings</dt>
		<dd>
			<input type="checkbox" name="custom_keep_open" value="active" cap="Set this accordion to open by default" />
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup"><i class="fa-solid fa-universal-access"></i> Accessibility Options</dt>
		<dt>Heading Tag:</dt>
		<dd>
			<select name="custom_heading_tag">
				<option value="h2">H2 Tag</option>
				<option value="h3" selected="selected">H3 Tag (default)</option>
				<option value="h4">H4 Tag</option>
				<option value="h5">H5 Tag</option>
				<option value="h6">H6 Tag</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="accordion accordion-style-1 {custom_keep_open}" data-tpl-tooltip="Accordion - Style 1">
	<div class="accordion-wrap">

		<?php for ($i = 1; $i <= 6; $i++) { ?>
			<toggle rel="custom_heading_tag" value="h<?= $i ?>">
				<h<?= $i ?> class="accordion-header">
					<button id="<?= $tpl_id ?>-btn"
					        aria-expanded="false"
					        aria-controls="<?= $tpl_id ?>-panel">
						<span>{custom_heading}</span>
						<i class="{custom_icon}" aria-hidden="true"></i>
					</button>
				</h<?= $i ?>>
			</toggle>
		<?php } ?>

		<div id="<?= $tpl_id ?>-panel"
		     class="accordion-panel"
		     role="region"
		     aria-labelledby="<?= $tpl_id ?>-btn">
			<div class="accordion-panel-inner">
				<mwPageArea rel="mainContent" info="Drag and drop widgets or sub-templates here." sortable="page"></mwPageArea>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
	    (function () {
		    var $el = $('#<?= $tpl_id ?>');
		    var $btn = $('#<?= $tpl_id ?>-btn');
		    var $panel = $('#<?= $tpl_id ?>-panel');

		    if ($el.hasClass('active')) {
			    $btn.attr('aria-expanded', 'true');
			    $panel.show();
		    } else {
			    $btn.attr('aria-expanded', 'false');
			    $panel.hide();
		    }

		    $btn.on('click', function () {
			    if ($el.hasClass('active')) {
				    $el.removeClass('active');
				    $btn.attr('aria-expanded', 'false');
				    $panel.slideUp();
			    } else {
				    $el.addClass('active');
				    $btn.attr('aria-expanded', 'true');
				    $panel.slideDown();
			    }
		    });
	    })();
	});
</script>