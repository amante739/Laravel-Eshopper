<!-- Begin Li's Blog Sidebar Area -->
<div class="col-lg-3 order-lg-1 order-2">
    <div class="li-blog-sidebar-wrapper">
        <div class="li-blog-sidebar">
            <div class="list-group-item list-group-item-action list-group-item-light text-center">
                @if (empty($user_data->avatar))
                <img style="height: 150px;width:150px;" id="usr_img" src="{{ asset('admin/dist/img/img_preview.png') }}"
                    alt="your image" />
                @else
                <img style="border-radius: 50%;height:130px;max-width:130px;"
                    src="{{ asset('storage/'.$user_data->avatar) }}" alt="User">
                @endif

            </div>

            <div class="mt-4">
                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ url()->current() == route('account.index') ? 'active': '' }}" href="{{ route('account.index') }}">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ url()->current() == url('my-order') ? 'active': '' }}" href="{{ url('my-order') }}">Order History</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ url()->current() == url('change-password') ? 'active': '' }}" href="{{ url('change-password') }}">Change Password</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Li's Blog Sidebar Area End Here -->
