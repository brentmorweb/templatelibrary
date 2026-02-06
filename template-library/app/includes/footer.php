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
                <a class="tl-site-footer__link" href="/app/auth/login.php">Login</a>
                <a class="tl-site-footer__link" href="/app/auth/logout.php">Logout</a>
            </div>
        </div>
    </footer>
    </body>
    </html>
    <?php
}
