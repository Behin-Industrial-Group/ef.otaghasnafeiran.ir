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
                    @if (auth()->user()->access('نمایش اطلاعات مجری'))
                        <th>{{ __('performancer_name') }}</th>
                        <th>{{ __('performancer_lname') }}</th>
                        <th>{{ __('performancer_nid') }}</th>
                        <th>{{ __('performancer_mobile') }}</th>
                        <th>{{ __('performancer_deal') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات مسئول اجرایی'))
                        <th>{{ __('excutive_director_fullname') }}</th>
                        <th>{{ __('excutive_director_mobile') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات روابط عمومی'))
                        <th>{{ __('pr_fullname') }}</th>
                        <th>{{ __('pr_mobile') }}</th>
                        <th>{{ __('pr_phone') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات مالک زمین'))
                        <th>{{ __('land_owner_fullname') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات غرفه ها'))
                        <th>{{ __('number_of_booth1') }}</th>
                        <th>{{ __('meterage_of_booth1') }}</th>
                        <th>{{ __('price_of_booth1_per_meter') }}</th>
                        <th>{{ __('number_of_booth2') }}</th>
                        <th>{{ __('meterage_of_booth2') }}</th>
                        <th>{{ __('price_of_booth2_per_meter') }}</th>
                        <th>{{ __('number_of_booth3') }}</th>
                        <th>{{ __('meterage_of_booth3') }}</th>
                        <th>{{ __('price_of_booth3_per_meter') }}</th>
                        <th>{{ __('number_of_booth4') }}</th>
                        <th>{{ __('meterage_of_booth4') }}</th>
                        <th>{{ __('price_of_booth4_per_meter') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات فایل قیمت ها'))
                        <th>{{ __('price_file') }}</th>
                    @endif
                    @if (auth()->user()->access('نمایش اطلاعات فایل چک لیست های ارزیابی'))
                        <th>{{ __('place_checklist_file') }}</th>
                        <th>{{ __('booth_checklist_file') }}</th>
                        <th>{{ __('performance_checklist_file') }}</th>
                    @endif
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
            "{{ route('namayeshgahInfo.list') }}",
            [{
                    data: 'id'
                },
                {
                    data: 'user',
                    render: function(data) {
                        return data.province
                    }
                },
                {
                    data: 'user',
                    render: function(data) {
                        return data.name
                    }
                },
                {
                    data: 'user',
                    render: function(data) {
                        return data.email
                    }
                },
                {
                    data: 'start_date'
                },
                {
                    data: 'end_date'
                },
                @if (auth()->user()->access('نمایش اطلاعات مجری'))
                    {
                        data: 'performancer_name'
                    }, {
                        data: 'performancer_lname'
                    }, {
                        data: 'performancer_nid'
                    }, {
                        data: 'performancer_mobile'
                    }, {
                        data: 'performancer_deal',
                        render: function(data) {
                            if (data) {
                                return `<a href='${data}'>دانلود</a>`
                            } else {
                                return 'ندارد'
                            }
                        }
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات مسئول اجرایی'))
                    {
                        data: 'excutive_director_fullname'
                    }, {
                        data: 'excutive_director_mobile'
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات روابط عمومی'))
                    {
                        data: 'pr_fullname'
                    }, {
                        data: 'pr_mobile'
                    }, {
                        data: 'pr_phone'
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات مالک زمین'))
                    {
                        data: 'land_owner_fullname'
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات غرفه ها'))
                    {
                        data: 'number_of_booth1'
                    }, {
                        data: 'meterage_of_booth1'
                    }, {
                        data: 'price_of_booth1_per_meter'
                    }, {
                        data: 'number_of_booth2'
                    }, {
                        data: 'meterage_of_booth2'
                    }, {
                        data: 'price_of_booth2_per_meter'
                    }, {
                        data: 'number_of_booth3'
                    }, {
                        data: 'meterage_of_booth3'
                    }, {
                        data: 'price_of_booth3_per_meter'
                    }, {
                        data: 'number_of_booth4'
                    }, {
                        data: 'meterage_of_booth4'
                    }, {
                        data: 'price_of_booth4_per_meter'
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات فایل قیمت ها'))
                    {
                        data: 'price_file',
                        render: function(data) {
                            if (data) {
                                return `<a href='${data}'>دانلود</a>`
                            } else {
                                return 'ندارد'
                            }
                        }
                    },
                @endif
                @if (auth()->user()->access('نمایش اطلاعات فایل چک لیست های ارزیابی'))
                    {
                        data: 'place_checklist_file',
                        render: function(data) {
                            if (data) {
                                return `<a href='${data}'>دانلود</a>`
                            } else {
                                return 'ندارد'
                            }
                        }
                    },
                    {
                        data: 'booth_checklist_file',
                        render: function(data) {
                            if (data) {
                                return `<a href='${data}'>دانلود</a>`
                            } else {
                                return 'ندارد'
                            }
                        }
                    },
                    {
                        data: 'performance_checklist_file',
                        render: function(data) {
                            if (data) {
                                return `<a href='${data}'>دانلود</a>`
                            } else {
                                return 'ندارد'
                            }
                        }
                    },
                @endif

                {
                    data: 'created_at',
                    render: function(data) {
                        datetime = new Date(data);
                        date = datetime.toLocaleDateString('fa-IR');
                        time = datetime.toLocaleTimeString('fa-IR');
                        return '<span dir="auto" style="float: left">' + date + ' ' + time + '</span>';
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        @if (auth()->user()->access('حذف نمایشگاه ثبت شده توسط ادمین'))
                            return `<a onclick='delete_namayeshgah(${data})'><i class='fa fa-trash'></i></a>`;
                        @else
                            return '';
                        @endif
                    }
                }
            ]
        )

        table.on('dblclick', 'tr', function() {
            var data = table.row(this).data();
            show_edit_modal(data.id);
        })

        table.on('mouseover', 'tr', function() {
            $(this).css('cursor', 'pointer')
            $(this).attr('title', '{{ __('dblclick to show details') }}')
        })

        function show_edit_modal(id) {
            url = "{{ route('namayeshgahInfo.form.edit', ['id' => 'id']) }}";
            url = url.replace('id', id);
            console.log(url);
            send_ajax_get_request(
                url,
                function(res) {
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
