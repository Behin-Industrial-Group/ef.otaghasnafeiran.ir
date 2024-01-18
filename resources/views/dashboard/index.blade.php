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
        function go_to_add_form(){
            alert(0)
            window.location.replace("{{ route('namayeshgah.form.add') }}");
        }
    </script>
@endsection
