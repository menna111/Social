<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item {{is_active('home')}}">
            <a class="nav-link" href="{{route('adminHome')}}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item {{is_active('users')}}  ">
            <a class="nav-link" href="{{route('users')}}">
                <i class="material-icons">person</i>
                <p>Users</p>
            </a>
        </li>


        <li class="nav-item {{is_active('categories')}} ">
            <a class="nav-link" href="{{route('categories')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Categories</p>
            </a>
        </li>

        <li class="nav-item {{is_active('skills')}}  ">
            <a class="nav-link" href="{{route('skills')}}">
                <i class="material-icons">content_paste</i>
                <p>Skills</p>
            </a>
        </li>

        <li class="nav-item {{is_active('tags')}}  ">
            <a class="nav-link" href="{{route('tags')}}">
                <i class="material-icons">content_paste</i>
                <p>Tags</p>
            </a>
        </li>

        <li class="nav-item {{is_active('pages')}}  ">
            <a class="nav-link" href="{{route('pages')}}">
                <i class="material-icons">content_paste</i>
                <p>Pages</p>
            </a>
        </li>
        <!-- your sidebar here -->
    </ul>
</div>
