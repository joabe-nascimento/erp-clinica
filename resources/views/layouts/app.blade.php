<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ERP Clínico')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Layout base */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            overflow-y: auto;
            position: fixed;
            height: 100vh;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.active {
            transform: translateX(-250px);
        }

        .sidebar-link, .submenu-link {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .sidebar-link:hover, .submenu-link:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }
        }

        /* Botão hamburguer */
        .toggle-sidebar {
            position: fixed;
            top: 10px;
            right: 50px;
            z-index: 1100;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Botão para abrir a sidebar -->
    <div class="toggle-sidebar btn btn-dark d-md-none" onclick="toggleSidebar()">☰</div>

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Conteúdo Principal -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para abrir/fechar a sidebar
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
