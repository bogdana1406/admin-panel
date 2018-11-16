<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>

    <ul>
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Stock</span> <span class="label label-important">9</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-brand') }}">Add Brand</a></li>
                <li><a href="{{ url('/admin/view-brands') }}">View Brands</a></li>
                <li><a href="{{ url('/admin/add-engine') }}">Add Engine</a></li>
                <li><a href="{{ url('/admin/view-engines') }}">View Engines</a></li>
                <li><a href="{{ url('/admin/add-car') }}">Add Car</a></li>
                <li><a href="{{ url('/admin/view-cars') }}">View Cars</a></li>
                <li><a href="{{ url('/admin/upload-car-images-form') }}">Upload Images Form</a></li>
                <li><a href="{{ url('/admin/view-images-table') }}">Show Cars Images</a></li>
                <li><a href="{{ url('/admin/search-cars') }}">Cars Filter</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Widget</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-review') }}">Add Reviews</a></li>
                <li><a href="{{ url('/admin/view-reviews') }}">View All Review</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>General Settings</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-settings-page') }}">Add Home Page</a></li>
                <li><a href="{{ url('/admin/view-settings-page') }}">View Home Page</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Pages</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-home-page') }}">Add Home Page</a></li>
                <li><a href="{{ url('/admin/view-home-page') }}">View Home Page</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->