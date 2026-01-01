<?php

class RenderViewController {
    public static function render($viewPath, $data = []) {
        extract($data);

        $baseViewPath = dirname(__DIR__) . '/views/';

        require_once $baseViewPath . 'layout/header.php';
        
        require_once $baseViewPath . 'layout/sidebar.php';

        echo '<div class="content">';
            require_once $baseViewPath . 'layout/topbar.php';
            
            require_once $baseViewPath . $viewPath . '.php';
        echo '</div>';

        require_once $baseViewPath . 'layout/footer.php';
    }
}