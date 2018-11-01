<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Brands</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-brand') }}">Add Brand</a></li>
                <li><a href="{{ url('/admin/view-brands') }}">View Brands</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Enginess</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-engine') }}">Add Engine</a></li>
                <li><a href="{{ url('/admin/view-engines') }}">View Engines</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Cars</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="{{ url('/admin/add-car') }}">Add Car</a></li>
                <li><a href="{{ url('/admin/view-cars') }}">View Cars</a></li>
                <li><a href="{{ url('/admin/search-cars') }}">Cars Filter</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Cars Images</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/view-images-table') }}">Show Cars Images</a></li>
                <li><a href="{{ url('/admin/upload-car-images-form') }}">Upload Images Form</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->