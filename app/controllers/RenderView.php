<?php
class RenderViewController {
    public function view($viewName, $data = []) {
        extract($data); 

        require_once 'app/views/layout/header.php';
        require_once 'app/views/layout/sidebar.php';

        require_once 'app/views/layout/topbar.php'; 

        require_once 'app/views/' . $viewName . '.php';
        require_once 'app/views/layout/footer.php';
    }
}