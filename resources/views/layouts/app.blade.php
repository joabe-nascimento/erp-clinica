<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Clínico</title>
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
            transition: transform 0.3s ease-in-out;
            position: fixed;
            height: 100vh;
        }

        .sidebar-link {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar-link:hover {
            background-color: #495057;
        }

        .submenu-link {
            color: #adb5bd;
            text-decoration: none;
            padding: 5px 40px;
            display: block;
            transition: color 0.3s ease;
        }

        .submenu-link:hover {
            color: white;
        }

        .sidebar h4 {
            border-bottom: 1px solid #495057;
            margin: 0;
            padding: 15px;
        }

        /* Sidebar responsiva */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .toggle-sidebar {
                display: block;
                background-color: #343a40;
                color: white;
                padding: 10px 20px;
                cursor: pointer;
                position: fixed;
                z-index: 999;
                top: 0;
                left: 0;
            }
        }

        .content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }

            .content.sidebar-active {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Botão para abrir a sidebar em telas pequenas -->
    <div class="toggle-sidebar d-md-none" onclick="toggleSidebar()">
        ☰ Menu
    </div>

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Conteúdo Principal -->
    <div class="content" id="mainContent">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para abrir/fechar a sidebar em telas pequenas
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('#mainContent');
            sidebar.classList.toggle('active');
            content.classList.toggle('sidebar-active');
        }
    </script>
</body>
</html>
