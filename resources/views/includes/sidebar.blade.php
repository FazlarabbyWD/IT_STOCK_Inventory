<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src={{ asset('assets/images/logo-icon.png') }} class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{!! route('home') !!}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-list-ol"></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li> <a href="{!! route('Products Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                </li>
                <li> <a href="{!! route('Products') !!}"><i class="bx bx-right-arrow-alt"></i>List Product</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book"></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>
            <ul>
                <li> <a href="{!! route('Contacts Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Contact</a>
                </li>
                <li> <a href="{!! route('Contacts') !!}"><i class="bx bx-right-arrow-alt"></i>List Contact</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> <a href="{!! route('Categories Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
                <li> <a href="{!! route('Categories') !!}"><i class="bx bx-right-arrow-alt"></i>List Category</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bookmarks"></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
            <ul>
                <li> <a href="{!! route('Brands Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                </li>
                <li> <a href="{!! route('Brands') !!}"><i class="bx bx-right-arrow-alt"></i>List Brand</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-tag"></i>
                </div>
                <div class="menu-title">Companies</div>
            </a>
            <ul>
                <li> <a href="{!! route('Companies Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Company</a>
                </li>
                <li> <a href="{!! route('Companies') !!}"><i class="bx bx-right-arrow-alt"></i>List Company</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-filter"></i>
                </div>
                <div class="menu-title">Specification Types</div>
            </a>
            <ul>
                <li> <a href="{!! route('SpecificationTypes Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add Specification</a>
                </li>
                <li> <a href="{!! route('SpecificationTypes') !!}"><i class="bx bx-right-arrow-alt"></i>List Specification</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="{!! route('Users Create') !!}"><i class="bx bx-right-arrow-alt"></i>Add User</a>
                </li>
                <li> <a href="{!! route('Users') !!}"><i class="bx bx-right-arrow-alt"></i>List User</a>
                </li>
            </ul>
        </li>


        <!--end navigation-->
    </div>
