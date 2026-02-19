<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
    <dl class="mwDialog">
        <dt>Heading Text:</dt>
        <dd>
            <input type="text" name="custom_heading_text"/>
        </dd>
	    <dt>Heading Tag:</dt>
	    <dd>
		    <select name="custom_heading_tag">
			    <option value="h1">H1 Tag</option>
			    <option value="h2" selected="selected">H2 Tag (default)</option>
			    <option value="h3">H3 Tag</option>
			    <option value="h4">H4 Tag</option>
			    <option value="h5">H5 Tag</option>
			    <option value="h6">H6 Tag</option>
			    <option value="p">P Tag</option>
		    </select>
	    </dd>
    </dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="a11y a11y-visually-hidden-heading" data-tpl-tooltip="Accessibility Tool - Visually Hidden Heading">
	<div class="a11y-visually-hidden-heading-wrap" data-tpl-tooltip="Visually Hidden Heading for Accessibility - currently selected <{custom_heading_tag}> tag">
		<toggle rel="custom_heading_tag" value="h1"><h1 class="heading-text _text-center">{custom_heading_text}</h1></toggle>
		<toggle rel="custom_heading_tag" value="h2"><h2 class="heading-text _text-center">{custom_heading_text}</h2></toggle>
		<toggle rel="custom_heading_tag" value="h3"><h3 class="heading-text _text-center">{custom_heading_text}</h3></toggle>
		<toggle rel="custom_heading_tag" value="h4"><h4 class="heading-text _text-center">{custom_heading_text}</h4></toggle>
		<toggle rel="custom_heading_tag" value="h5"><h5 class="heading-text _text-center">{custom_heading_text}</h5></toggle>
		<toggle rel="custom_heading_tag" value="h6"><h6 class="heading-text _text-center">{custom_heading_text}</h6></toggle>
		<toggle rel="custom_heading_tag" value="p"><p class="heading-text _text-center">{custom_heading_text}</p></toggle>
	</div>
</div>