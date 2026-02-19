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
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Icon</dt>
		<dt>Icon File:</dt>
		<dd>
			<input name="custom_icon" from="galleryFiles"/>
		</dd>
		<dt>Icon Alt:</dt>
		<dd>
			<input type="text" name="custom_icon_alt"/>
		</dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Content</dt>
		<dt>Title:</dt>
		<dd><textarea name="custom_title" size="2">Please Add a Title</textarea></dd>
		<dt>Title Tag:</dt>
		<dd>
			<select name="custom_tag">
				<option value="h2">H2 Tag</option>
				<option value="h3" selected="selected">H3 Tag (default)</option>
				<option value="h4">H4 Tag</option>
				<option value="h5">H5 Tag</option>
				<option value="h6">H6 Tag</option>
			</select>
		</dd>
		<dt>Description:</dt>
		<dd><textarea name="custom_des" size="8" class="richEdit compact"></textarea></dd>
	</dl>
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Link</dt>
		<dd>
			<input type="checkbox" name="custom_enable_link" cap="Enable Link" checked="checked" data-toggle-form=".<?= $tpl_id ?>-enable-link"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Button Label:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<input type="text" name="custom_btn_label" value="Learn More"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Button URL:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<select name="custom_btn_url" from="pages" zero="None" class="radioList new filter" size="4">
				<option value="{url}">{title}</option>
			</select>
		</dd>
		<dd class="<?= $tpl_id ?>-enable-link">
			<input type="text" name="custom_btn_external_url" placeholder="Or enter an external URL"/>
		</dd>
		<dt class="<?= $tpl_id ?>-enable-link">Open in New Window:</dt>
		<dd class="<?= $tpl_id ?>-enable-link">
			<select name="custom_btn_target">
				<option value="_self" selected>Disable (default)</option>
				<option value="_blank">Enable</option>
			</select>
		</dd>
	</dl>
</tplOptions>

<article id="<?= $tpl_id ?>" class="icon-card icon-card-style-1 {custom_color}" aria-labelledby="<?= $tpl_id ?>-title" data-tpl-tooltip="Icon Card - Style 1">
    <div class="icon-card-wrap" data-mh="icon-card-wrap">

	    <!-- Icon -->
	    <div class="icon-card-icon">
		    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
		         data-src="/get/files/image/galleries/{custom_icon}?resize=0x160"
		         class="img-fluid lazyload"
		         alt="{custom_icon_alt}" width="80" height="80"/>
	    </div>

	    <!-- Title -->
	    <?php for ($i = 1; $i <= 6; $i++) { ?>
		    <toggle rel="custom_tag" value="h<?= $i ?>">
			    <h<?= $i ?> id="<?= $tpl_id ?>-title" class="icon-card-title h4">{custom_title}</h<?= $i ?>>
		    </toggle>
	    <?php } ?>

	    <!-- Description -->
	    <div class="icon-card-des">{custom_des}</div>

	    <!-- Link -->
	    <toggle rel="custom_enable_link" value="1">

		    <!-- Button -->
		    <div class="icon-card-btn">
			    <span>{custom_btn_label}</span><i class="fas fa-arrow-right"></i>
		    </div>

		    <!-- Link -->
		    <toggle rel="custom_btn_external_url" value="">
			    <a class="icon-card-link medium" href="{custom_btn_url}" target="{custom_btn_target}"><span class="_sr-only">Learn more about {custom_title}</span></a>
		    </toggle>
		    <toggle rel="custom_btn_external_url">
			    <a class="icon-card-link medium" href="{custom_btn_external_url}" target="{custom_btn_target}"><span class="_sr-only">Learn more about {custom_title}</span></a>
		    </toggle>
	    </toggle>
    </div>
</article>