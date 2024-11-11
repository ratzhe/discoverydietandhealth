<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">Discovery Diet & Heath</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin.dashboard') }}">DDH</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Painel de Controle</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Painel</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a></li>
            <li><a class="nav-link" href="{{ route('admin.profile') }}">Meu Perfil</a></li>
            <li><a class="nav-link" href="{{ route('admin.showRegisterForm') }}">Novos Usuários</a></li>
            <li><a class="nav-link" href="{{ route('admin.seeusers') }}">Ver Usuários</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Nutricional</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.anamnese.dashboard') }}">Anamneses</a></li>
            <li><a class="nav-link" href="{{ route('admin.antropometria.dashboard') }}">Antropometria</a></li>
            <li><a class="nav-link" href="{{ route('admin.mealplan.dashboard') }}">Plano Alimentar</a></li>
          </ul>
        </li>
      </aside>
  </div>

