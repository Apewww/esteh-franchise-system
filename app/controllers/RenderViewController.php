<?php

class RenderViewController
{
    public function render($view, $data = [])
    {
        extract($data);

        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/layout/sidebar.php';

        echo '<div class="content">';

        // ✅ SATU-SATUNYA TOPBAR
        require __DIR__ . '/../views/layout/topbar.php';

        require __DIR__ . '/../views/' . $view . '.php';

        echo '</div>';

        require __DIR__ . '/../views/layout/footer.php';
    }
}

