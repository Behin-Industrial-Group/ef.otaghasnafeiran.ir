@extends('layouts.app')

@section('content')
    <div class="row m-3">
        <div class="col-sm-12 p-3">
            <div class="header text-center ">
                <h3>
                </h3>
            </div>
            <div class="body">
                <div class="card card-primary">
                    <div class="card-header text-center ">
                        <h3 class="card-title">
                            درگاه ثبت نام نمایشگاه های عرضه مستقیم کالا عید تا عید
                        </h3>
                    </div>

                    <div class="card-body">
                        <div id="namayeshgah">
                            <button class="btn btn-primary" onclick="go_to_add_form()">افزودن نمایشگاه</button>
                        </div>
                        <div class="row">
                            <img src="public/eid.jpg?{{config('app.version')}}" class="row" alt="" width="100%">
                        </div>
                        

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        initial_view()
        get_mine()
        function get_mine(){
            send_ajax_get_request(
                "{{route('namayeshgah.getMine')}}",
                function(res){
                    console.log(res);
                    var n = $('#namayeshgah')
                    res.forEach(function(item){
                        url = "{{ route('namayeshgah.form.edit', ['id' => 'id']) }}";
                        url = url.replace('id', item.id)
                        n.append(`<a href='${url}' class='btn btn-danger'>ویرایش نمایشگاه <span dir='ltr'>${item.start_date}</span></button><br>`)
                    })
                }
            )
        }
        function go_to_add_form(){
            window.location.replace("{{ route('namayeshgah.form.add') }}");
        }
    </script>
@endsection
