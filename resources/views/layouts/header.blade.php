<nav class="main-header navbar navbar-expand bg-danger navbar-light border-bottom">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav nav-link">
                <li class="dropdown user user-menu">
                    <a href="#" data-toggle="dropdown">
                        <span class="mr-1">{{ ucwords(Auth::user()->staff->name ?? Auth::user()->name) }}</span>
                        <img src="{{ asset(Auth::user()->staff->photo ?? 'img/user.jpg') }}" class="img-circle elevation-2" style="width: 30px; height: 30px;margin-top: -8px;margin-right: -5px;border-radius: 100%;">
                    </a>
                    <ul class="dropdown-menu pb-0" style="min-width:250px;">
                        <li class="user-header text-center">
                            <br>
                            
                            <img src="{{ asset(Auth::user()->staff->photo ?? 'img/user.jpg') }}" class="img-size-50 img-circle elevation-2" style="width: 50px; height: 50px;">
                            <p>
                                <br>
                                {{ ucwords(Auth::user()->role->name) }}
                                <br>
                                <small>{{ strtolower(Auth::user()->email) }}</small>
                            </p>
                        </li>
                        <li class="bg-light">
                            <div class="card-body p-0 table-responsive">
                                <table border="0" class="table table-hover nowrap">
                                    <tr data-href="{{ route('profile') }}" id="link">
                                        <td><i class="fas fa-user mr-2"></i> Profile</td> 
                                    </tr>
                                    <tr data-href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <td><i class="fas fa-sign-out-alt mr-2"></i> Logout</td> 
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </ul>
</nav>