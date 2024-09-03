<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('patient.dashboard') }}">Discovery Diet & Heath</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('patient.dashboard') }}">DDH</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Painel de Controle</li>
        <li class="dropdown active">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Painel</span></a>
          <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ route('patient.dashboard') }}">Home</a></li>
            <li class=><a class="nav-link" href="{{ route('patient.profile') }}">Meu Perfil</a></li>
          </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Nutricional</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
              <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
          </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Relatórios</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Exames</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('patient.exam.create') }}">Ver exames</a></li>
              <li><a class="nav-link" href="{{ route('patient.exam.index') }}">Carregar exame</a></li>
            </ul>
          </li>


      </aside>
  </div>

