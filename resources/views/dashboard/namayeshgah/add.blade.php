@extends('layouts.app')

@section('content')
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


                    <form action="javascript:void(0)" id="form">
                        @isset($id)
                            <input type="hidden" name="id" id="id" value="{{ $id }}">
                        @endisset
                        <div class="card-body">
                            <div class="form-group col-sm-4">
                                <label for="exampleInputPassword1">عنوان نمایشگاه:</label>
                                <select name="title" id="" class="form-control">
                                    @foreach (config('namayeshgah.title_types') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-12 text-center ">
                                        <label class="card-title" style="margin: auto !important">اطلاعات مسئولین
                                            نمایشگاه</label>

                                        <div class="p-1">
                                            <button class="btn btn-default col-sm-12 info-btn" id="executive_director"
                                                onclick="open_modal('executive_director')">{{ __('executive director info') }}</button>
                                        </div>
                                        <div class="p-1">
                                            <button class="btn btn-default col-sm-12 info-btn"
                                                onclick="open_modal('pr')">{{ __('pr info') }}</button>
                                        </div>
                                        <div class="p-1">
                                            <button class="btn btn-default col-sm-12 info-btn"
                                                onclick="open_modal('performancer_info')">{{ __('performancer info') }}</button>
                                        </div>
                                        <div class="p-1">
                                            <button class="btn btn-default col-sm-12 info-btn"
                                                onclick="open_modal('land_owner_info')">{{ __('land owner info') }}</button>
                                        </div>
                                        <div class="p-1">
                                            <button class="btn btn-default col-sm-12 info-btn"
                                                onclick="open_modal('time_and_palce_info')">{{ __('time and place info') }}</button>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="row text-center ">
                                        <label class="card-title" style="margin: auto !important">غرفه ها</label>
                                        <div class="col-sm-12">
                                            <div class="p-1">
                                                <button class="btn btn-default col-sm-12"
                                                    onclick="open_modal('1th_booth_info')">{{ __('1th booth info') }}</button>
                                            </div>
                                            <div class="p-1">
                                                <button class="btn btn-default col-sm-12"
                                                    onclick="open_modal('2th_booth_info')">{{ __('2th booth info') }}</button>
                                            </div>
                                            <div class="p-1">
                                                <button class="btn btn-default col-sm-12"
                                                    onclick="open_modal('3th_booth_info')">{{ __('3th booth info') }}</button>
                                            </div>
                                            <div class="p-1">
                                                <button class="btn btn-default col-sm-12"
                                                    onclick="open_modal('4th_booth_info')">{{ __('4th booth info') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <hr>


                            <div class="form-group">
                                <label for="exampleInputFile">فایل اکسل قیمت کالا و خدمات</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        @isset($data['price_file'])
                                            <button class="btn btn-default">
                                                <a href="{{ $data['price_file'] }}" target="_blank">دانلود</a>
                                            </button>
                                            <button class="fa fa-trash btn btn-danger"
                                                onclick="delete_file({{ $data['id'] }}, 'price_file')"></button>
                                        @else
                                            <input type="file" name="price_file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        @endisset
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی شرایط مکانی نمایشگاه</label>
                                <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست تایید شرایط مکانی.pdf']) }}"
                                    target="_blank">
                                    (دانلود فایل نمونه)
                                </a>
                                <div class="input-group">
                                    <div class="custom-file">
                                        @isset($data['place_checklist_file'])
                                            <button class="btn btn-default">
                                                <a href="{{ $data['place_checklist_file'] }}" target="_blank">دانلود</a>
                                            </button>
                                            <button class="fa fa-trash btn btn-danger"
                                                onclick="delete_file({{ $data['id'] }}, 'place_checklist_file')"></button>
                                        @else
                                            <input type="file" name="place_checklist_file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        @endisset
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی غرفه در زمان فروش در نمایشگاه</label>
                                <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست ارزیابی غرفه در زمان فروش در نمایشگاه.pdf']) }}"
                                    target="_blank">
                                    (دانلود فایل نمونه)
                                </a>
                                <div class="input-group">
                                    <div class="custom-file">
                                        @isset($data['booth_checklist_file'])
                                            <button class="btn btn-default">
                                                <a href="{{ $data['booth_checklist_file'] }}" target="_blank">دانلود</a>
                                            </button>
                                            <button class="fa fa-trash btn btn-danger"
                                                onclick="delete_file({{ $data['id'] }}, 'booth_checklist_file')"></button>
                                        @else
                                            <input type="file" name="booth_checklist_file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        @endisset
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی مجری برگزاری نمایشگاه در زمان برگزاری
                                    نمایشگاه</label>
                                    <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست ارزیابی مجری برگزاری نمایشگاه در زمان برگزاری نمایشگاه.pdf']) }}"
                                        target="_blank">
                                        (دانلود فایل نمونه)
                                    </a>
                                <div class="input-group">
                                    <div class="custom-file">
                                        @isset($data['performance_checklist_file'])
                                            <button class="btn btn-default">
                                                <a href="{{ $data['performance_checklist_file'] }}"
                                                    target="_blank">دانلود</a>
                                            </button>
                                            <button class="fa fa-trash btn btn-danger"
                                                onclick="delete_file({{ $data['id'] }}, 'performance_checklist_file')"></button>
                                        @else
                                            <input type="file" name="performance_checklist_file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        @endisset
                                    </div>
                                    
                                </div>
                            </div>


                        </div>


                    </form>
                    <div class="card-footer">
                        <button class="btn btn-primary" onclick="submit('form')" style="background: #557C55">ثبت</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        initial_view()
        @isset($id)
            url = "{{ route('namayeshgah.getById', ['id', 'id']) }}";
            url = url.replace('id', "{{ $id }}");
            send_ajax_get_request(
                url,
                function(res) {
                    console.log(res);
                    $('input[type="text"]').each(function(item) {
                        $(this).val(res[$(this).attr('name')]);
                    })
                    $('textarea').each(function(item) {
                        $(this).html(res[$(this).attr('name')]);
                    })
                    $('select').each(function(item) {
                        $(this).val(res[$(this).attr('name')]);
                    })
                }
            )
        @endisset


        function submit(form_id = 'form') {

            var form = $('#' + form_id)[0];
            fd = new FormData(form);
            send_ajax_formdata_request(
                "{{ route('namayeshgah.add') }}",
                fd,
                function(res) {
                    show_message("اطلاعات با موفقیت ثبت شد")
                    id = res;
                    console.log(form_id);
                    if (form_id == "form") {
                        url = "{{ route('namayeshgah.form.edit', ['id' => 'id']) }}"
                        url = url.replace('id', id);
                        location.replace(url)
                        console.log(res);
                    }

                }
            )
        }

        function open_modal(view_name) {
            fd = new FormData();
            fd.append('id', '{{ $id ?? '' }}')
            fd.append('view', view_name)
            send_ajax_formdata_request(
                "{{ route('namayeshgah.form.modal') }}",
                fd,
                function(res) {
                    console.log(res);
                    open_admin_modal_with_data(res)
                }
            )
        }


        function delete_file(id, column_name) {
            fd = new FormData();
            fd.append('id', id);
            fd.append('column_name', column_name);
            send_ajax_formdata_request(
                "{{ route('namayeshgah.deleteFile') }}",
                fd,
                function(res) {
                    console.log(res);
                    location.reload()
                    show_message(res)
                }
            )
        }
    </script>
@endsection
