@extends('layouts.app')

@section('content')
    <div class="row table-responsive ">
        <table class="table table-striped" id="namayeshgah-info">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('province') }}</th>
                    <th>{{ __('username') }}</th>
                    <th>{{ __('mobile') }}</th>
                    <th>{{ __('start_date') }}</th>
                    <th>{{ __('end_date') }}</th>
                    <th>{{ __('performancer_name') }}</th>
                    <th>{{ __('performancer_lname') }}</th>
                    <th>{{ __('performancer_nid') }}</th>
                    <th>{{ __('performancer_mobile') }}</th>
                    <th>{{ __('created_at') }}</th>
                    <th>{{ __('action') }}</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')

    <script>
        var table = create_datatable(
            'namayeshgah-info',
            "{{route('namayeshgahInfo.list')}}",
            [
                {data: 'id'},
                {data: 'user', render: function(data){
                    return data.province
                }},
                {data: 'user', render: function(data){
                    return data.name
                }},
                {data: 'user', render: function(data){
                    return data.email
                }},
                {data: 'start_date'},
                {data: 'end_date'},
                {data: 'performancer_name'},
                {data: 'performancer_lname'},
                {data: 'performancer_nid'},
                {data: 'performancer_mobile'},
                {data: 'created_at', render:function(data){
                    datetime = new Date(data);
                    date = datetime.toLocaleDateString('fa-IR');
                    time = datetime.toLocaleTimeString('fa-IR');
                    return '<span dir="auto" style="float: left">' + date + ' ' + time + '</span>';
                }},
                {data: 'id', render: function(data){
                    @if(auth()->user()->access('حذف نمایشگاه ثبت شده توسط ادمین'))
                    return `<a onclick='delete_namayeshgah(${data})'><i class='fa fa-trash'></i></a>`;
                    @else
                    return '';
                    @endif
                }}
            ]
        )

        table.on('dblclick', 'tr', function(){
            var data = table.row( this ).data();
            show_edit_modal(data.id);
        })

        table.on('mouseover', 'tr', function(){
            $(this).css('cursor', 'pointer')
            $(this).attr('title', '{{__("dblclick to show details")}}')
        })

        function show_edit_modal(id){
            url = "{{ route('namayeshgahInfo.form.edit', ['id'=> 'id']) }}";
            url = url.replace('id', id);
            console.log(url);
            send_ajax_get_request(
                url,
                function(res){
                    open_admin_modal_with_data(res)
                }
            )
        }
        function delete_namayeshgah(id) {
            fd = new FormData();
            fd.append('id', id);
            send_ajax_formdata_request_with_confirm(
                "{{ route('namayeshgah.deleteForAdmin') }}",
                fd,
                function(res) {
                    show_message(res);
                    location.reload()
                },
                function(res) {
                    show_error(res);
                },
                "{{ __('Are You Sure To Delete This Record?') }}"
            )
        }
    </script>
    
@endsection