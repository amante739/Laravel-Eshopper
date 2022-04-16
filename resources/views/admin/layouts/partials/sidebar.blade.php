<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Overview
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
                Roles
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Roles
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                User
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All User
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-bars"></i>
            <p>
                Category
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Categories
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('subcategory.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Sub Categories
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fab fa-bandcamp"></i>
            <p>
                Brand
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Brand
                    </p>
                </a>
            </li>
        </ul>
    </li>
    

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tags"></i>
            <p>
                Tags
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('tag.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Tag
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-check-square"></i>
            <p>
                Attribute
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('attribute.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Attribute
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>
                Product
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Product
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-plus-circle"></i>
            <p>
                Orders
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Order
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
            Settings
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Basic Information
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('banners.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Banner
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-paperclip"></i>
            <p>
                Pages
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('faq.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Faq
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('term.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Terms & Conditions
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('policy.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Privacy and Policy
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <!-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file"></i>
            <p>
                Contents
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Page Manager
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                Menu
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Menu Placement
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="fas fa-location-arrow"></i>
            <p>
                Location Directory
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        States
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        County
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Cities
                    </p>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="fas fa-location-arrow"></i>
            <p>
                US Info
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        States
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        County
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Cities
                    </p>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
                Property
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Properties
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Trashed Properties
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                Property Attribute
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Attributes
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
                Review
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Reviews
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Settings</p>
        </a>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                Synonym
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Synonym
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="fas fa-flag nav-icon"></i>
            <p>Flag Review</p>
        </a>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                Title Tag
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Title
                    </p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                Claim Property
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        All Claims
                    </p>
                </a>
            </li>
        </ul>
    </li> -->
    
</ul>

<!-- <script>
    var url = window.location;
    const allLinks = document.querySelectorAll('.nav-item a');
    const currentLink = [...allLinks].filter(e => {
        return e.href == url;
    });

    currentLink[0].classList.add("active")
    currentLink[0].closest(".nav-treeview").style.display = "block";
    currentLink[0].closest(".has-treeview").classList.add("active");
</script> -->