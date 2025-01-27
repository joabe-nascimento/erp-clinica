<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ERP Clínico')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (opcional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Layout base */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden; /* Evita rolagem horizontal indesejada */
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
            z-index: 1050; /* Fica acima do conteúdo principal */
            box-shadow: 2px 0 5px rgba(0,0,0,0.15);
        }

        .sidebar.active {
            transform: translateX(-250px);
        }

        .sidebar h4 {
            margin: 0;
            padding: 15px;
            border-bottom: 1px solid #495057;
        }

        .sidebar-link, .submenu-link {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }
        .sidebar-link:hover, .submenu-link:hover {
            background-color: #495057;
        }

        /* Indicador de item ativo (opcional) */
        .sidebar-link.active {
            background-color: #495057;
        }

        /* SUBMENU */
        .submenu-link {
            padding-left: 40px; /* Indenta para destacar submenu */
        }

        /* CONTEÚDO PRINCIPAL */
        .content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* BOTÃO HAMBURGUER */
        .toggle-sidebar {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1101;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* OVERLAY (para telas pequenas) */
        .overlay {
            display: none;
            position: fixed;
            top: 0; 
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1049; /* logo abaixo da sidebar */
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .overlay.show {
            display: block;
            opacity: 1;
        }

        /* RESPONSIVIDADE */
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
    </style>
</head>
<body>
    <!-- Botão para abrir/fechar a sidebar -->
    <button class="toggle-sidebar btn btn-dark d-md-none" onclick="toggleSidebar()">
        <i class="bi bi-list"></i> Menu
    </button>

    <!-- Overlay (telas pequenas) -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

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
            const overlay = document.getElementById('overlay');

            // Se a sidebar estiver ativa, remove a classe e esconde overlay
            // Se estiver fechada, adiciona a classe e mostra overlay
            sidebar.classList.toggle('active');
            overlay.classList.toggle('show');
        }
    </script>
</body>
</html>
