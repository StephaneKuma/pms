<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('salesman.dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="{{ route('salesman.dashboard') }}" class="nav-link {{ Request::is('salesman/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ _('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('salesman.pos') }}" class="nav-link {{ Request::is('salesman/pos') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ _('POS') }}
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview {{ Request::is('salesman/drug/forms*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('salesman/drug/forms*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        {{ _('Drug Forms') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('salesman.drugs.forms.create') }}" class="nav-link {{ Request::is('salesman/drug/forms/create') ? 'active' : '' }}">
                        <p>Add Drug Form</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.drugs.forms.index') }}" class="nav-link {{ Request::is('salesman/drug/forms') ? 'active' : '' }}">
                        <p>Manage Drug Forms</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('salesman/drugs*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('salesman/drugs*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-medkit"></i>
                    <p>
                        {{ _('Drugs') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('salesman.drugs.create') }}" class="nav-link {{ Request::is('salesman/drugs/create') ? 'active' : '' }}">
                        <p>Add Drug</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.drugs.index') }}" class="nav-link {{ Request::is('salesman/drugs') ? 'active' : '' }}">
                        <p>Manage Drugs</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('salesman/customers*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('salesman/customers*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        Customers
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('salesman.customers.create') }}" class="nav-link {{ Request::is('salesman/customers/create') ? 'active' : '' }}">
                            <p>Add Customer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.customers.index') }}" class="nav-link {{ Request::is('salesman/customers') ? 'active' : '' }}">
                            <p>Manage Customers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.customers.regular') }}" class="nav-link {{ Request::is('salesman/customers/regular') ? 'active' : '' }}">
                            <p>Regular Customers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.customers.wholesale') }}" class="nav-link {{ Request::is('salesman/customers/wholesale') ? 'active' : '' }}">
                            <p>Wholesale Customers</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('salesman/suppliers*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('salesman/suppliers*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-handshake-o"></i>
                    <p>
                        Suppliers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('salesman.suppliers.create') }}" class="nav-link{{ Request::is('salesman/suppliers/create') ? 'active' : '' }}">
                            <p>Add Supplier</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.suppliers.index') }}" class="nav-link{{ Request::is('salesman/suppliers') ? 'active' : '' }}">
                            <p>Manage Suppliers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salesman.suppliers.balance') }}" class="nav-link{{ Request::is('salesman/suppliers/balance') ? 'active' : '' }}">
                            <p>Suppliers Balance</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('salesman/reports*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('salesman/reports*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Reports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('salesman.reports.today') }}" class="nav-link {{ Request::is('salesman/reports/today') ? 'active' : '' }}">
                            <p>Today Reports</p>
                        </a>
                    </li>
                </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
