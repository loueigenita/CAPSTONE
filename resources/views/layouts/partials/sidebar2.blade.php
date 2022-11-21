<div class=" sidebar">

    <div class="logo">
        <img src="../frontend/images/logo.png" class="brand-image img-circle elevation-2"
                            height="15%" width="15%">
        <span class="simple-text">
           MDC's Cafeteria
        </span>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="active-link">
                <a href="{{ route('slider.index') }}">
                    <i class="material-icons">slideshow</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/category*') ? 'active': '' }}">
                <a href="{{ route('category.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/item*') ? 'active': '' }}">
                <a href="{{ route('item.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Items</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/reservation*') ? 'active': '' }}">
                <a href="{{ route('reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservations</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/reservation*') ? 'active': '' }}">
                <a href="{{ url('/reshome') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Users Reservation</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
                <a href="{{ route('contact.index') }}">
                    <i class="material-icons">message</i>
                    <p>Contact Message</p>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="material-icons">arrow_circle_left</i>
                    <p>Main Dashboard</p>
                </a>
            </li>

        </ul>
    </div>
</div>
<style>
.image-circle {
    border-radius: 50%;
}

.elevation-4 {
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22) !important;
}

.brand-image {
    float: left;
    margin-left: .8rem;
    margin-right: .5rem;
    margin-top: 3px;

}
</style>