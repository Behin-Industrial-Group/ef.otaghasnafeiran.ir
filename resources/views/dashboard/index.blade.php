@extends('layouts.app')

@section('content')
    @if (auth()->user()->access('گزارش درگاه ثبت نام نمایشگاه عرضه مستقیم کالا'))
        <div class="row">
            <div class="col-sm-12">
                <div class="header text-center ">
                    <h3>
                    </h3>
                </div>
                <div class="body">
                    <div class="card card-primary">
                        <div class="card-header text-center " style="background: #557C55">
                            <h3 class="card-title">
                                گزارش درگاه ثبت نام نمایشگاه عرضه مستقیم کالا
                            </h3>
                        </div>

                        <div class="card-body p-0 row" dir="auto">
                            <div class="col-sm-6" dir="auto">
                                {{ __('Number of Added Namayeshgah') }}: <span id="all"></span>
                            </div>
                            <div class="col-sm-6">
                                {{ __('Number of Added Namayeshgah With Info') }}: <span id="info"></span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->access("Add Namayeshgah Form"))
        
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="header text-center ">
                <h3>
                </h3>
            </div>
            <div class="body">
                <div class="card card-primary">
                    <div class="card-header text-center " style="background: #557C55">
                        <h3 class="card-title">
                            درگاه ثبت نام نمایشگاه های عرضه مستقیم کالا عید تا عید
                        </h3>
                    </div>

                    <div class="card-body p-0">

                        <div class="">
                            <img src="public/eid.png?{{ config('app.version') }}" alt="" width="100%">
                        </div>
                        <hr>

                        <div id="namayeshgah" class="text-center">
                            <button class="btn btn-default" onclick="go_to_add_form()"
                                style="background: #557C55; color:white">افزودن نمایشگاه</button>
                            <hr>
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

        function get_mine() {
            send_ajax_get_request(
                "{{ route('namayeshgah.getMine') }}",
                function(res) {
                    console.log(res);
                    var n = $('#namayeshgah')
                    res.forEach(function(item) {
                        url = "{{ route('namayeshgah.form.edit', ['id' => 'id']) }}";
                        url = url.replace('id', item.id)
                        n.append(
                            `<a href='${url}' class='btn btn-default col-sm-5 m-1' style="background: #A6CF98; color:white">ویرایش نمایشگاه <span dir='ltr'>${item.start_date}</span></button>
                                <a onclick='delete_namayeshgah(${item.id})'><i class='fa fa-trash'></i></a>
                                <br>`
                        )
                    })
                }
            )
        }

        function go_to_add_form() {
            window.location.replace("{{ route('namayeshgah.form.add') }}");
        }

        function delete_namayeshgah(id){
            fd = new FormData();
            fd.append('id', id);
            send_ajax_formdata_request_with_confirm(
                "{{ route('namayeshgah.delete') }}",
                fd,
                function(res){
                    show_message(res);
                    location.reload()
                },
                function(res){
                    show_error(res);
                },
                "{{ __('Are You Sure To Delete This Record?') }}"
            )
        }

        @if (auth()->user()->access('گزارش درگاه ثبت نام نمایشگاه عرضه مستقیم کالا'))
            get_report()

            function get_report() {
                send_ajax_get_request(
                    "{{ route('namayeshgahInfo.report.summary') }}",
                    function(res) {
                        console.log(res);
                        $('#all').html(res.all)
                        $('#info').html(res.info)
                    }
                )
            }
        @endif
    </script>
@endsection
