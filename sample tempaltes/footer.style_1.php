<tplOptions caption="Options" order="1">
	<dl class="mwDialog _tpl-box">
		<dt class="formGroup">Logo</dt>
		<dt>Logo :</dt>
		<dd>
			<input name="custom_logo_path" from="galleryFiles" />
		</dd>
		<dt>Logo Alt:</dt>
		<dd>
			<input type="text" name="custom_logo_alt" />
		</dd>
		<dd class="_tpl-info">Completing this field will slightly enhance the SEO ranking. <br/> Example: Name of the Organization</dd>
	</dl>
	<dl class="mwDialog">
		<dt>Copyright Text:</dt>
		<dd>
			<input type="text" name="custom_copyright_text"/>
		</dd>
		<dt>Background Color:</dt>
		<dd>
			<input type="radio" class="cell-10 _tpl-checkbox-color-empty" name="custom_bg_color" value="" cap="None"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary" name="custom_bg_color" value="_bg-primary" cap="Primary" checked="checked"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary" name="custom_bg_color" value="_bg-secondary" cap="Secondary"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third" name="custom_bg_color" value="_bg-third" cap="Third"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth" name="custom_bg_color" value="_bg-fourth" cap="Fourth"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-white" name="custom_bg_color" value="_bg-white" cap="White"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-light" name="custom_bg_color" value="_bg-light" cap="Light"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-gray" name="custom_bg_color" value="_bg-gray" cap="Gray"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-dark" name="custom_bg_color" value="_bg-dark" cap="Dark"/>
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-primary-light" name="custom_bg_color" value="_bg-primary-light" cap="Primary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-secondary-light" name="custom_bg_color" value="_bg-secondary-light" cap="Secondary Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-third-light" name="custom_bg_color" value="_bg-third-light" cap="Third Light" />
			<input type="radio" class="cell-10 _tpl-checkbox-color _bg-fourth-light" name="custom_bg_color" value="_bg-fourth-light" cap="Fourth Light" />
		</dd>
	</dl>
</tplOptions>

<tplOptions caption="Advanced" order="2">
    <dl class="mwDialog">
	    <dd>
		    <input type="checkbox" name="custom_enable_sns" cap="Enable Social Media Icons" checked="checked" />
	    </dd>
    </dl>
</tplOptions>

<?php $tpl_id = newSN('tpl-', 10); ?>

<div id="<?= $tpl_id ?>" class="footer footer-style-1 _content-style {custom_bg_color}" data-tpl-tooltip="Footer - Style 1">
	<div class="footer-wrap">
		<!-- Main -->
		<div class="footer-main">
			<div class="container">

				<!-- Top -->
				<div class="footer-top">

					<!-- Logo -->
					<a class="footer-logo" href="/" title="{custom_logo_alt}">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
						     data-src="/get/files/image/galleries/{custom_logo_path}?resize=400x0"
						     class="lazyload _img-fluid"
						     alt="{custom_logo_alt}" width="210" height="40"/>
					</a>

					<!-- Social Media -->
					<toggle rel="custom_enable_sns">
						<div class="footer-sns">
							<mwWidget rel="footerSoclinks" widget="Gensoclinks" icon_size="small" align="center" socials="instagram, facebook, twitter, linkedin" template="default.php" global="1"></mwWidget>
						</div>
					</toggle>
				</div>

				<!-- Bottom -->
				<div class="footer-bottom">
					<div class="row">

						<!-- Col 1 -->
						<div class="footer-col footer-col-1 col-xl-3 col-md-6 col-sm-12">
							<div class="footer-col-inner">
								<mwWidget rel="footerDescription" info="Footer Description" widget="Content" global="1">
									<p>Change the color to match your brand or vision, add your logo, choose the perfect thumbnail, remove the playbar, add speed controls, and more. </p>
								</mwWidget>
							</div>
						</div>

						<!-- Col 2 -->
						<div class="footer-col footer-col-2 col-xl-2 col-md-6 col-sm-12">
							<div class="footer-col-inner">
								<mwWidget rel="footerMenu1" info="Footer Menu #1" widget="Menu" menu="Footer Menu #1" template="default.php" global="1"></mwWidget>
							</div>
						</div>

						<!-- Col 3 -->
						<div class="footer-col footer-col-3 col-xl-3 col-md-6 col-sm-12">
							<div class="footer-col-inner">
								<mwWidget rel="footerMenu2" info="Footer Menu #2" widget="Menu" menu="Footer Menu #2" template="default.php" global="1"></mwWidget>
							</div>
						</div>

						<!-- Col 4 -->
						<div class="footer-col footer-col-4 col-xl-3 offset-xl-1 col-md-6 col-sm-12">
							<div class="footer-col-inner footer-col-newsletter">
								<mwWidget rel="footerNewsletterHead" info="Footer Newsletter Header" widget="Content" global="1">
									<h6>Newsletter</h6>
								</mwWidget>
								<mwWidget rel="footerNewsletter" widget="Contact" listid="33" global="1" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Copyright -->
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="footer-copyright-left col-xl-9 col-md-12">© Copyright <?= date("Y") ?> {custom_copyright_text}</div>
					<div class="footer-powered-by-right col-xl-3 col-md-12">Website by <a href="https://morweb.org">morweb.org</a></div>
				</div>
			</div>
		</div>
	</div>
</div>