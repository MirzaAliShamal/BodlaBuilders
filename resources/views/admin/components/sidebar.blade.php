<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}" target="_blank" class="simple-text logo-mini"><img src="{{ asset('logo.png') }}" width="30px" alt=""></a>
        <a href="{{ route('admin.dashboard') }}" target="_blank" class="simple-text logo-normal">
            <h4 class="font-weight-bold">Bodla Builders</h4>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('default.png') }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>Super Admin <b class="caret"></b></span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @can('browse_dashboard')
                <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>
            @endcan
            @can('browse_project')
                <li class="nav-item @routeis('admin.project.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.project.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Projects </p>
                    </a>
                </li>
            @endcan
            @can('browse_project_types')
                <li class="nav-item @routeis('admin.project_type.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.project_type.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Project Types </p>
                    </a>
                </li>
            @endcan
            @can('browse_project_subtypes')
                <li class="nav-item @routeis('admin.project_subtype.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.project_subtype.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Project Sub Types </p>
                    </a>
                </li>
            @endcan
            @can('browse_floor')
                <li class="nav-item @routeis('admin.floor.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.floor.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Floors </p>
                    </a>
                </li>
            @endcan
            @can('browse_properties')
                <li class="nav-item @routeis('admin.property.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.property.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Properties </p>
                    </a>
                </li>
            @endcan
            @can('browse_dha')
                <li class="nav-item @routeis('admin.dha.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.dha.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> DHA </p>
                    </a>
                </li>
            @endcan
            @can('browse_pvt_team')
                <li class="nav-item @routeis('admin.pvt.team.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.pvt.team.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Bodla PVT Team </p>
                    </a>
                </li>
            @endcan
            @can('browse_jobs')
                <li class="nav-item @routeis('admin.jobs.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.jobs.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Jobs </p>
                    </a>
                </li>
            @endcan
            @can('browse_job_applications')
                <li class="nav-item @routeis('admin.application.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.application.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Job Applications </p>
                    </a>
                </li>
            @endcan
            @can('browse_roles')
                <li class="nav-item @routeis('admin.role.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.role.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Roles </p>
                    </a>
                </li>
            @endcan
            @can('browse_roles/permissions')
                <li class="nav-item @routeis('admin.permissions.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.permissions.manage') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Manage Role/Permission </p>
                    </a>
                </li>
            @endcan
            @can('browse_users')
                <li class="nav-item @routeis('admin.user.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.user.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Users </p>
                    </a>
                </li>
            @endcan
            @can('browse_developers_team')
                <li class="nav-item @routeis('admin.developer.team.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.developer.team.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Bodla Developers Team </p>
                    </a>
                </li>
            @endcan
            @can('browse_news')
                <li class="nav-item @routeis('admin.news.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.news.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> News </p>
                    </a>
                </li>
            @endcan
            @can('browse_blogs')
                <li class="nav-item @routeis('admin.blog.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.blog.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Blogs </p>
                    </a>
                </li>
            @endcan
            @can('browse_vlogs')
                <li class="nav-item @routeis('admin.vlog.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.vlog.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Vlogs </p>
                    </a>
                </li>
            @endcan
            @can('browse_gallery')
                <li class="nav-item @routeis('admin.gallery.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.gallery.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Gallery </p>
                    </a>
                </li>
            @endcan
            @can('browse_maps')
                <li class="nav-item @routeis('admin.map.*') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.map.list') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Maps </p>
                    </a>
                </li>
            @endcan
            @can('browse_contact_queries')
                <li class="nav-item @routeis('admin.contact.queries') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.contact.queries') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Contact Queries </p>
                    </a>
                </li>
            @endcan
            @can('browse_registered_users')
                <li class="nav-item @routeis('admin.registered.users') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.registered.users') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Registered Users </p>
                    </a>
                </li>
            @endcan

            {{-- Logout --}}
            <li class="nav-item">
                <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                    <i class="material-icons">logout</i>
                    <p> Logout </p>
                </a>
            </li>
        </ul>
    </div>
</div>
