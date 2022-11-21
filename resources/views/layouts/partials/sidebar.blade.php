<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary bg-dark elevation-4">

    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MDC INVENTORY</span>
    </a>

    <div class="sidebar">
        <nav class="mt-5">
            <ul class="treeview-menu nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt text-red"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-th-large text-red"></i>
                    <p>
                        Inventory
                        <i class="right fas fa-angle-left text-red"></i>
                    </p>
                </a>
                <ul class="nav-treeview" @if ($pageSlug == 'istats') class="active " @endif>
                    <li class="nav-item">
                        <a href="{{ route('inventory.stats') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Statistics</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'products') class="active " @endif>
                        <a href="{{ route('products.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'categories') class="active " @endif>
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'receipts') class="active " @endif>
                        <a href="{{ route('receipts.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Receipts</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'invoices') class="active " @endif>
                        <a href="{{ route('invoices.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Invoices</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('transactions.stats') }}" class="nav-link active">
                    <i class="nav-icon fas fa-chart-pie text-red"></i>
                    <p>
                        Transactions
                    </p>
                    <i class="right fas fa-angle-left text-red"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item" @if ($pageSlug == 'transactions') class="active " @endif>
                        <a href="{{ route('transactions.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>All</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'istats') class="active " @endif>
                        <a href="{{ route('transactions.stats') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Statistics</p>
                        </a>
                    </li>

                    <li class="nav-item" @if ($pageSlug == 'sales') class="active " @endif>
                        <a href="{{ route('sales.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Sales</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'expense') class="active " @endif>
                        <a href="{{ route('transactions.type', ['type' => 'expense']) }}"
                            class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Expenses</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'income') class="active " @endif>
                        <a href="{{ route('transactions.type', ['type' => 'income']) }}"
                            class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Income</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'transfer') class="active " @endif>
                        <a href="{{ route('transfer.index') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Transfers</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'transactions') class="active " @endif>
                        <a href="{{ route('transactions.type', ['type' => 'payment']) }}"
                            class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Payments</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" @if ($pageSlug == 'clients') class="active " @endif>
                <a href="{{ route('clients.index') }}" class="nav-link">
                    <i class="fas fa-user nav-icon text-red"></i>
                    <p>Customer</p>
                </a>
            </li>
            <li class="nav-item" @if ($pageSlug == 'providers') class="active " @endif>
                <a href="{{ route('providers.index') }}" class="nav-link">
                    <i class="fas fa-book nav-icon text-red"></i>
                    <p>Providers</p>
                </a>
            </li>
            <li class="nav-item" @if ($pageSlug == 'methods') class="active " @endif>
                <a href="{{ route('methods.index') }}" class="nav-link">
                    <i class="fas fa-wallet nav-icon text-red"></i>
                    <p>Methods and Accounts</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs text-red"></i>
                    <p>Settings</p>
                    <i class="right fas fa-angle-left text-red"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'users-list') class="active " @endif>
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle "></i>
                            <p>Manage Users</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-scroll text-red"></i>
                    <p>Reservation Dashboard</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
</aside>

