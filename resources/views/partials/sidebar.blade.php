<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'data-point' ? '' : 'collapsed' }}" href="/costumize">
                <i class="bi bi-sliders2"></i><span>Customize</span>
            </a>
        </li><!-- End Customize Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'classify' ? '' : 'collapsed' }}" href="/classify">
                <i class="bi bi-bar-chart"></i><span>Classify</span>
            </a>
        </li><!-- End Classify Nav -->

    </ul>

</aside>
