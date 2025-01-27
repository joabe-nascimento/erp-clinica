<div class="sidebar d-flex flex-column">
    <h4 class="text-center">ERP Clínico</h4>

    <!-- Link Simples -->
    <a href="{{ route('pacientes.index') }}" class="sidebar-link">
        <i class="bi bi-people-fill"></i> Pacientes
    </a>
    <a href="{{ route('pacientes.create') }}" class="sidebar-link">
        <i class="bi bi-plus-circle-fill"></i> Adicionar Paciente
    </a>

    <!-- Gestão Financeira com Submenus -->
    <a class="sidebar-link dropdown-toggle" data-bs-toggle="collapse" href="#financeiroMenu" 
       role="button" aria-expanded="false" aria-controls="financeiroMenu">
       <i class="bi bi-wallet-fill"></i> Gestão Financeira
    </a>
    <div class="collapse" id="financeiroMenu">
        <a href="#" class="submenu-link">Contas a Pagar</a>
        <a href="#" class="submenu-link">Contas a Receber</a>
        <a href="#" class="submenu-link">Faturas</a>
    </div>

    <!-- Relatórios com Submenus -->
    <a class="sidebar-link dropdown-toggle" data-bs-toggle="collapse" href="#relatoriosMenu" 
       role="button" aria-expanded="false" aria-controls="relatoriosMenu">
       <i class="bi bi-graph-up-arrow"></i> Relatórios
    </a>
    <div class="collapse" id="relatoriosMenu">
        <a href="#" class="submenu-link">Relatório Financeiro</a>
        <a href="#" class="submenu-link">Relatório de Atendimentos</a>
    </div>

    <!-- Usuários -->
    <a href="#" class="sidebar-link">
        <i class="bi bi-person-circle"></i> Usuários
    </a>
</div>
