
@php
    use App\Helpers\Template as Template;
    $xhtmlButtonFilter = Template::showButtonFilter($countItemsStatus, $controllerName, $params['filter']['status']); 
    $xhtmlAreaSearch   = Template::showAreaSearch($controllerName); 
    // echo '************** this is a test **************';
    // dd($params);
@endphp

@extends('admin.main')

@section('content')
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Danh sách User</h3>
    </div>
    <div class="zvn-add-new pull-right">
        <a href="/form" class="btn btn-success"><i
                class="fa fa-plus-circle"></i> Thêm mới</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Danh sách 123321'])
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6">
                        {!! $xhtmlButtonFilter !!}
                        {{-- <a href="?filter_status=all" type="button"
                        class="btn btn-primary">
                        All <span class="badge bg-white">4</span>
                    </a>
                        <a href="?filter_status=active"
                        type="button" class="btn btn-success">
                        Active <span class="badge bg-white">2</span>
                    </a>
                        <a href="?filter_status=inactive"
                        type="button" class="btn btn-success">
                        Inactive <span class="badge bg-white">2</span>
                    </a> --}}
                </div>
                <div class="col-md-6">
                    {!! $xhtmlAreaSearch !!}
                        {{-- <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button"
                                        class="btn btn-default dropdown-toggle btn-active-field"
                                        data-toggle="dropdown" aria-expanded="false">
                                    Search by All <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="#"
                                           class="select-field" data-field="all">Search by All</a></li>
                                    <li><a href="#"
                                           class="select-field" data-field="id">Search by ID</a></li>
                                    <li><a href="#"
                                           class="select-field" data-field="username">Search by Username</a>
                                    </li>
                                    <li><a href="#"
                                           class="select-field" data-field="fullname">Search by Fullname</a>
                                    </li>
                                    <li><a href="#"
                                           class="select-field" data-field="email">Search by Email</a></li>
                                </ul>
                            </div>
                            <input type="text" class="form-control" name="search_value" value="">
                            <span class="input-group-btn">
                        <button id="btn-clear" type="button" class="btn btn-success"
                                style="margin-right: 0px">Xóa tìm kiếm</button>
                        <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                        </span>
                            <input type="hidden" name="search_field" value="all">
                        </div> --}}
                    </div>
                    {{-- <div class="col-md-2">
                        <select name="select_filter" class="form-control"
                                data-field="level">
                            <option value="default" selected="selected">Select Level</option>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--box-lists-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Danh sách 333'])
            @include('admin.pages.slider.list')
            
        </div>
    </div>
</div>
<!--end-box-lists-->
<!--box-pagination-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Phân trang 123321'])

            @include('admin.templates.pagination')
        </div>
    </div>
</div>
<!--end-box-pagination-->
@endsection