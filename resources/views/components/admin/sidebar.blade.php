<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="#">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.langs.*')) active @endif" href="{{ route('admin.langs.index') }}">
                  <span data-feather="file"></span>
                  Languages
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.modes.*')) active @endif" href="{{ route('admin.modes.index') }}">
                  <span data-feather="shopping-cart"></span>
                  Modes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.themes.*')) active @endif" href="{{ route('admin.themes.index') }}">
                  <span data-feather="users"></span>
                  Themes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.words.*')) active @endif" href="{{ route('admin.words.index') }}">
                  <span data-feather="bar-chart-2"></span>
                  Words
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.patterns.*')) active @endif" href="{{ route('admin.patterns.index') }}">
                  <span data-feather="layers"></span>
                  Patterns
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.tasks.*')) active @endif" href="{{ route('admin.tasks.index') }}">
                  <span data-feather="layers"></span>
                  Tasks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Users
                </a>
              </li>
            </ul>


          </div>
</nav>