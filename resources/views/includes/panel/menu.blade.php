<!-- Heading -->
<h6 class="navbar-heading text-muted">Gestión</h6>
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="./index.html">
              <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/servicios')}}">
              <i class="fas fa-pills text-orange"></i> Servicios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/nosotros">
              <i class="fas fa-transgender-alt text-orange"></i> Nosotros
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/pacientes">
              <i class="far fa-user-circle text-orange"></i> Pacientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
              <i class="fas fa-sign-in-alt"></i> Cerrar sesión
            </a>
            <form action="{{ route('logout') }}" method="POST" stye="display: none;" id="formLogout">
              @csrf
            </form>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-books text-default"></i> Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño
            </a>
          </li>
        </ul>
