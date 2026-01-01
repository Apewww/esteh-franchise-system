<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Sistem Es Teh'; ?> | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f7f7f7; }
        .sidebar { width: 240px; min-height: 100vh; background: #b6ffad; padding: 20px; transition: all 0.3s ease; }
        .sidebar.hide { margin-left: -240px; }
        .logo { text-align: center; margin-bottom: 10px; }
        .logo img { width: 120px; height: auto; }
        .sidebar-menu { margin-top: 40px; }
        .sidebar-menu a { display: block; padding: 10px 15px; border-radius: 20px; color: #000; text-decoration: none; margin-bottom: 10px; font-size: 14px; }
        .sidebar-menu a.active, .sidebar-menu a:hover { background: #ffffff; }
        .content { padding: 20px 30px; width: 100%; transition: all 0.3s ease; }
        .topbar { background: #ffffff; padding: 12px 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 20px; display: flex; align-items: center; }
        .search-wrapper { position: absolute; left: 50%; transform: translateX(-50%); width: 420px; }
        .search-input { border-radius: 20px; padding-left: 40px; }
        .search-icon { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa; }
        .btn-add { border-radius: 20px; }
        .card-custom { border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); border: none; }
        table th { background: #e0e0e0 !important; }
        .avatar { width: 35px; height: 35px; background: #ddd; border-radius: 50%; }
    </style>
</head>
<body>
<div class="d-flex">