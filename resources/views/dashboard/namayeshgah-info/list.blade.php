@extends('layouts.app')

@section('content')
    <div class="row table-responsive ">
        <table class="table table-striped" id="namayeshgah-info">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('username') }}</th>
                    <th>{{ __('mobile') }}</th>
                    <th>{{ __('start_date') }}</th>
                    <th>{{ __('end_date') }}</th>
                    <th>{{ __('created_at') }}</th>
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
                    return data.name
                }},
                {data: 'user', render: function(data){
                    return data.email
                }},
                {data: 'start_date'},
                {data: 'end_date'},
                {data: 'created_at'}
            ]
        )

        table.on('dblclick', 'tr', function(){
            var data = table.row( this ).data();
            show_edit_modal(data.id);
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
    </script>
    
@endsection