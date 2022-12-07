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
                    <li class="nav-item" @if ($pageSlug == 'invoices') class="active " @endif>
                        <a href="{{ route('invoices.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Invoices</p>
                        </a>
                    </li>


                    {{-- RESERVATION AREA --}}

                    <li class="nav-item" @if ($pageSlug == 'item') class="active " @endif>
                        <a href="{{ route('item.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Food Items</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'category') class="active " @endif>
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Food Categories</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'slider') class="active " @endif>
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Food Sliders</p>
                        </a>
                    </li>
                    <li class="nav-item" @if ($pageSlug == 'reservation') class="active " @endif>
                        <a href="{{ route('reservation.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Food Reservations</p>
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <li class="nav-item" @if ($pageSlug == 'clients') class="active " @endif>
                <a href="{{ route('clients.index') }}" class="nav-link">
                    <i class="fas fa-users nav-icon text-red"></i>
                    <p>Customer</p>
                </a>
            </li>
            <li class="nav-item" @if ($pageSlug == 'reshome') class="active " @endif>
                <a href="{{ url('/reshome') }}" class="nav-link">
                    <i class="fas fa-scroll fa-solid text-red"></i>
                    <p>User Reservation</p>
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
                    <li class="nav-item" @if ($pageSlug == 'contact') class="active " @endif>
                        <a href="{{ route('contact.index') }}" class="nav-link">
                            <i class="far fa-circle fa-solid"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
</aside>

