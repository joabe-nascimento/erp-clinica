<div class="sidebar d-flex flex-column">
    <h4 class="text-center py-3 border-bottom">ERP Clínico</h4>
    <!-- Links Simples -->
    <a href="{{ route('pacientes.index') }}" class="sidebar-link">Pacientes</a>
    <a href="{{ route('pacientes.create') }}" class="sidebar-link">Adicionar Paciente</a>

    <!-- Gestão Financeira com Submenus -->
    <a class="sidebar-link dropdown-toggle" data-bs-toggle="collapse" href="#financeiroMenu" role="button" aria-expanded="false" aria-controls="financeiroMenu">
        Gestão Financeira
    </a>
    <div class="collapse ps-3" id="financeiroMenu">
        <a href="#" class="submenu-link">Contas a Pagar</a>
        <a href="#" class="submenu-link">Contas a Receber</a>
        <a href="#" class="submenu-link">Faturas</a>
    </div>

    <!-- Relatórios com Submenus -->
    <a class="sidebar-link dropdown-toggle" data-bs-toggle="collapse" href="#relatoriosMenu" role="button" aria-expanded="false" aria-controls="relatoriosMenu">
        Relatórios
    </a>
    <div class="collapse ps-3" id="relatoriosMenu">
        <a href="#" class="submenu-link">Relatório Financeiro</a>
        <a href="#" class="submenu-link">Relatório de Atendimentos</a>
    </div>

    <!-- Usuários -->
    <a href="#" class="sidebar-link">Usuários</a>
</div>
