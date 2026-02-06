<?php

declare(strict_types=1);

$defaultPage = 'app/index.php';

header('Location: ' . $defaultPage, true, 302);
exit;
