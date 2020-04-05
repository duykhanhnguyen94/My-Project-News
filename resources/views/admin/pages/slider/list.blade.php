
 @php
    use App\Helpers\Template as Template;
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Slider Info</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
            @if(count($items) > 0)
            @foreach($items as $key => $val)
            @php
            // dd($val);
                $index       = $key + 1;
                $id          = $val['id'];
                $name        = $val['name'];
                $description = $val['description'];
                $status      = $val['status'];
                $created     = $val['created'];
                $created_by  = $val['created_by'];
                $modified_by = $val['modified_by'];
                $modified    = $val['modified'];
                $link        = $val['link']; 
                $thumb       = $val['thumb']; 
                $created  = Template::showItemsHistory($created_by, $created);
                $modified = Template::showItemsHistory($modified_by, $modified);
                $thumb    = Template::showItemsThumb($thumb, $name);
                $status   = Template::showButtonStatus($id, $controllerName, $status);
                $button   = Template::showButtonAction($id, $controllerName);
            @endphp
            <tr class="odd pointer">
                <td>{{$index}}</td>
                <td width="40%">
                    <p><strong>Name:</strong>{{ $name }}</p>
                    <p><strong>Description:</strong>{{ $description }}</p>
                    <p><strong>Link:</strong>{{ $link }}</p>
                    <p>
                        {!! $thumb !!}
                        {{-- <img src="http://proj_news.xyz/images/slider/LWi6hINpXz.jpeg" alt="Ưu đãi học phí" class="zvn-thumb"> --}}
                    </p>
                </td>
                <td>
                    {!! $status !!}
                    {{-- <a href="http://proj_news.xyz/admin123/slider/change-status-active/3" type="button" class="btn btn-round btn-success">active</a> --}}
                </td>
                <td>
                    {!! $created !!}
                </td>
                <td>
                    {!! $modified !!}
                </td>
                <td class="last">
                    {!! $button !!}
                    {{-- <div class="zvn-box-btn-filter">
                        <a href="http://proj_news.xyz/admin123/slider/form/3" type="button" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="http://proj_news.xyz/admin123/slider/delete/3" type="button" class="btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div> --}}
                </td>
            </tr>
            @endforeach
            @else
                @include('admin.templates.list_empty', ['colspan' => 6])
            @endif
            </tbody>
        </table>
    </div>
</div>