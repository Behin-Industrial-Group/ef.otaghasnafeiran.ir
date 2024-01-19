@extends('layouts.app')

@section('content')
    <div class="row m-3">
        <div class="card col-sm-12 p-3">
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
                    <div id="namayeshgah"></div>

                    <div class="card-body">
                        <button class="btn btn-info" onclick="go_to_add_form()">افزودن نمایشگاه</button>
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
                        n.append(`<button class='btn btn-danger'></button>`)
                    })
                }
            )
        }
        function go_to_add_form(){
            window.location.replace("{{ route('namayeshgah.form.add') }}");
        }
    </script>
@endsection
