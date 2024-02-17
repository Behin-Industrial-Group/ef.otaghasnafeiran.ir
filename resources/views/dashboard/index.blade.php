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

                        <div class="card-body p-1 row" dir="auto">
                            <div class="col-sm-6" dir="auto">
                                {{ __('Number of Added Namayeshgah') }}: <span id="all"></span>
                            </div>
                            <div class="col-sm-6">
                                {{ __('Number of Added Namayeshgah With Info') }}: <span id="info"></span>
                            </div>
                            <div class="col-sm-6">
                                {{-- <a class="" target="_" href="http://pmaker.altfuel.ir:575/otagh_nayeshgah_report.pdf" >دانلود گزارش</a> --}}
                                <a class="btn btn-info"
                                    href="{{ route('download.fromPublicFolder', ['name' => 'otagh_nayeshgah_report.pdf']) }}"
                                    target="_blank">
                                    {{ __('Download Report') }}
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->access('Add Namayeshgah Form'))
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

                            <div class="row">
                                <div id="namayeshgah" class="text-center col-sm-6">
                                    <button class="btn btn-default" onclick="go_to_add_form()"
                                        style="background: #557C55; color:white">افزودن نمایشگاه</button>
                                    <hr>
                                </div>
                                <div class="col-sm-6">
                                    <img src="public/eid3.png?{{ config('app.version') }}" alt="" width="100%">
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
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

        function delete_namayeshgah(id) {
            fd = new FormData();
            fd.append('id', id);
            send_ajax_formdata_request_with_confirm(
                "{{ route('namayeshgah.delete') }}",
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

        @if (auth()->user()->access('گزارش درگاه ثبت نام نمایشگاه عرضه مستقیم کالا'))
            get_report()

            function get_report() {
                send_ajax_get_request(
                    "{{ route('namayeshgahInfo.report.summary') }}",
                    function(res) {
                        console.log(res);
                        $('#all').html(res.all)
                        $('#info').html(res.info)
                        // var label = [];
                        // var numberOfRegister = [];
                        // var numberOfCompelete = [];
                        // res.data.forEach(function(item) {
                        //     label.push(item.province)
                        //     numberOfRegister.push(item.count)
                        //     numberOfCompelete.push(item.count - 1)
                        // })
                        // var areaChartData = {
                        //     labels: label,
                        //     datasets: [{
                        //             label: '{{ __('Compeleted') }}',
                        //             backgroundColor: 'rgba(60,141,188,0.9)',
                        //             borderColor: 'rgba(60,141,188,0.8)',
                        //             pointRadius: false,
                        //             pointColor: '#3b8bba',
                        //             pointStrokeColor: 'rgba(60,141,188,1)',
                        //             pointHighlightFill: '#fff',
                        //             pointHighlightStroke: 'rgba(60,141,188,1)',
                        //             data: numberOfCompelete
                        //         },
                        //         {
                        //             label: '{{ __('All') }}',
                        //             backgroundColor: 'rgba(210, 214, 222, 1)',
                        //             borderColor: 'rgba(210, 214, 222, 1)',
                        //             pointRadius: false,
                        //             pointColor: 'rgba(210, 214, 222, 1)',
                        //             pointStrokeColor: '#c1c7d1',
                        //             pointHighlightFill: '#fff',
                        //             pointHighlightStroke: 'rgba(220,220,220,1)',
                        //             data: numberOfRegister
                        //         },
                        //     ]
                        // }

                        // var barChartCanvas = $('#barChart').get(0).getContext('2d')
                        // var barChartData = $.extend(true, {}, areaChartData)
                        // var temp0 = areaChartData.datasets[0]
                        // var temp1 = areaChartData.datasets[1]
                        // barChartData.datasets[0] = temp1
                        // barChartData.datasets[1] = temp0

                        // var barChartOptions = {
                        //     responsive: true,
                        //     maintainAspectRatio: false,
                        //     datasetFill: false
                        // }
                        // new Chart(barChartCanvas, {
                        //     type: 'bar',
                        //     data: barChartData,
                        //     options: barChartOptions
                        // })
                    }
                )
            }
        @endif
    </script>
    {{-- <script>
        $(function() {





            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script> --}}
@endsection
