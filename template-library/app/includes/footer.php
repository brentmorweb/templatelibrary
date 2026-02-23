<?php

declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

function render_footer(): void
{
    ?>
    <footer class="tl-site-footer">
        <div class="tl-site-footer__inner">
            <div class="tl-site-footer__copyright">
                © <?php echo e(date('Y')); ?> Template Library. All rights reserved.
            </div>
            <div class="tl-site-footer__links">
                <?php if (!is_authenticated()) : ?>
                    <a class="tl-site-footer__link" href="auth/login.php">Login</a>
                <?php endif; ?>
                <?php if (is_authenticated()) : ?>
                    <a class="tl-site-footer__link" href="auth/logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </footer>
    </body>
    </html>
    <?php
}
