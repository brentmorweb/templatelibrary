<?php $tpl_id = newSN('tpl-', 10); ?>

<tplOptions caption="Options" order="1">
    <dl class="mwDialog">
	    <dt>PDF :</dt>
	    <dd>
		    <input name="custom_pdf" from="galleryFiles"/>
	    </dd>
    </dl>
</tplOptions>

<div id="<?= $tpl_id ?>" class="pdf-viewer pdf-viewer-style-1" data-tpl-tooltip="PDF Viewer - Style 1">
    <div class="pdf-viewer-wrap">
	    <object data="/files/galleries/{custom_pdf}" type="application/pdf" width="100%" height="800px">
		    <p>It appears you don't have a PDF plugin for this browser. <a href="/files/galleries/{custom_pdf}">click here</a> to download the PDF file.</p>
	    </object>
    </div>
</div>