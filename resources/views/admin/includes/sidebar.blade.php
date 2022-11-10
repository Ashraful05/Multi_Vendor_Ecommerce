<div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
    </ul>
    <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                        <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                    </div>
                </form>
            </div>
            <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Team review meeting at 3.00 PM
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Prepare for presentation
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Resolve all the low priority tickets due today
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" checked>
                                Schedule meeting for next week
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" checked>
                                Project review
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary mr-2"></i>
                    <span>Feb 11 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary mr-2"></i>
                    <span>Feb 7 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
                <li class="list active">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                    <div class="info">
                        <p>Thomas Douglas</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                    <div class="info">
                        <div class="wrapper d-flex">
                            <p>Catherine</p>
                        </div>
                        <p>Away</p>
                    </div>
                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                    <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                    <div class="info">
                        <p>Daniel Russell</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                    <div class="info">
                        <p>James Richardson</p>
                        <p>Away</p>
                    </div>
                    <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                    <div class="info">
                        <p>Madeline Kennedy</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="{{ asset('/admin-assets') }}/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                    <div class="info">
                        <p>Sarah Graves</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">47 min</small>
                </li>
            </ul>
        </div>
        <!-- chat tab ends -->
    </div>
</div>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if(Session::get('page')=='dashboard') style="background: #4B49AC !important; color: #fff !important;" @endif class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->type=='vendor')
            <li class="nav-item">
                <a  @if(Session::get('page')=='update_personal_details' || Session::get('page')=='update_business_details' || Session::get('page')=='update_bank_details') style="background: #4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Vendor Details</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendors">
                    <ul class="nav flex-column sub-menu" style="background: #4B49AC !important; color: #fff !important;">
                        <li class="nav-item"> <a @if(Session::get('page')=='update_personal_details') style="background: #4B49AC !important; color: #fff; !important;" @else style="background: #fff; !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('admin/update/vendor/details/personal') }}">Personal Details</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='update_business_details') style="background: #4B49AC !important; color: #fff; !important;" @else style="background: #fff; !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('admin/update/vendor/details/business') }}">Business Details</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='update_bank_details') style="background: #4B49AC !important; color: #fff; !important;" @else style="background: #fff; !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('admin/update/vendor/details/bank') }}">Bank Details</a></li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a @if(Session::get('page')=='update_password' || Session::get('page')=='update_admin_details') style="background: #4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu" style="background: #fff;!important;">
                        <li class="nav-item"> <a @if(Session::get('page')=='update_password') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ route('update.admin.password') }}">Update Password</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='update_admin_details') style="background: #4B49AC !important; color: #fff !important;"@else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ route('update.admin.details') }}">Update Details</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if(Session::get('page')=='view_admins' || Session::get('page')=='view_subadmins' || Session::get('page')=='view_vendors' || Session::get('page')=='view_all') style="background: #4B49AC !important; color: #fff !important;" @endif  class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Admin Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admins">
                    <ul class="nav flex-column sub-menu" style="background: #fff;!important;">
                        <li class="nav-item"> <a @if(Session::get('page')=='view_admins') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important; color: #4B49AC;!important; " @endif class="nav-link" href="{{ url('/admin/admins/admin') }}">Admins</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='view_subadmins') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('/admin/admins/subadmin') }}">Sub Admins</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='view_vendors') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('/admin/admins/vendor') }}">Vendors</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='view_all') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('/admin/admins') }}">All</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if(Session::get('page')=='sections' || Session::get('page')=='categories' || Session::get('page')=='products') style="background: #4B49AC !important;color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Catalogue Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important;color: #4B49AC !important;">
                        <li class="nav-item"> <a @if(Session::get('page')=='sections') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('admin/sections') }}">Sections</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='categories') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('admin/categories') }}">Categories</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='brands') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('admin/brands') }}">Brands</a></li>
                        <li class="nav-item"> <a @if(Session::get('page')=='products') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important; " @endif class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if(Session::get('page')=='' || Session::get('page')=='') style="background: #4B49AC !important;color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">User Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a  @if(Session::get('page')=='') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important;" @endif class="nav-link" href="#">Users</a></li>
                        <li class="nav-item"> <a   @if(Session::get('page')=='') style="background: #4B49AC !important; color: #fff !important;" @else style="background: #fff;!important;color:#4B49AC;!important;" @endif class="nav-link" href="#">Subscribers</a></li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
