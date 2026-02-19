<tplOptions caption="Options" order="1">
    <dl class="mwDialog">
	    <dt>Number of Buttons:</dt>
	    <dd>
		    <select name="custom_number">
			    <option value="2" selected="selected">2 buttons</option>
			    <option value="3">3 buttons</option>
			    <option value="4">4 buttons</option>
		    </select>
	    </dd>
	    <dt>Gap Between Buttons:</dt>
	    <dd>
		    <select name="custom_gap">
			    <option value="_col-gap-10" selected="selected">Small</option>
			    <option value="_col-gap-30">Medium (default)</option>
			    <option value="_col-gap-60">Large</option>
			    <option value="_col-gap-100">Extra Large</option>
		    </select>
	    </dd>
	    <dt>Alignment:</dt>
	    <dd>
		    <select name="custom_align">
			    <option value="_justify-content-center">Center</option>
			    <option value="_justify-content-start" selected="selected">Left (default)</option>
			    <option value="_justify-content-end">Right</option>
			    <option value="_justify-content-between">Evenly Distributed</option>
		    </select>
	    </dd>
    </dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="multi-btns multi-btns-style-1" data-tpl-tooltip="Multi Button - Style 1">
	<div class="multi-btns-wrap">
		<div class="btn-group {custom_gap} {custom_align}">
			<mwWidget rel="multiBtns1"  widget="Button" link_text="BUTTON" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnLeft"></mwWidget>
			<mwWidget rel="multiBtns2"  widget="Button" link_text="BUTTON" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnLeft"></mwWidget>
			<toggle rel="custom_number" value="3|4"><mwWidget rel="multiBtns3"  widget="Button" link_text="BUTTON" template="rectangle.rectangle_solid.php" button_size="medium" align="mwBtnLeft"></mwWidget></toggle>
			<toggle rel="custom_number" value="4"><mwWidget rel="multiBtns4"  widget="Button" link_text="BUTTON" template="rectangle.rectangle_outline.php" button_size="medium" align="mwBtnLeft"></mwWidget></toggle>
		</div>
	</div>
</div>