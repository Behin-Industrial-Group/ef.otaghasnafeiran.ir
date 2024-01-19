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


                    <form action="javascript:void(0)" id="form">
                        <div class="card-body">
                            <div class="form-group col-sm-4">
                                <label for="exampleInputPassword1">شماره تماس روابط عمومی نمایشگاه:</label>
                                <input type="text" name="pr_phone" class="form-control" id="exampleInputPassword1"
                                    placeholder="شماره تماس روابط عمومی">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">آدرس دقیق محل برگزاری نمایشگاه:</label>
                                <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                                    placeholder="آدرس محل برگزاری نمایشگاه">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleInputPassword1">زمان برگزاری نمایشگاه</label>
                                <div class="row col-sm-12">
                                    از:<input type="text" name="start_date" class="form-control col-sm-4 persian-date"
                                        id="exampleInputPassword1">
                                    تا:<input type="text" name="end_date" class="form-control col-sm-4 persian-date"
                                        id="exampleInputPassword1">
                                </div>

                            </div>


                            <fieldset class="row col-sm-12">
                                <legend>غرفه ها</legend>
                                <fieldset>
                                    <legend>درجه 1</legend>
                                    <div class="form-group">
                                        <input type="text" name="number_of_booth1" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="meterage_of_booth1" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price_of_booth1_per_meter" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 2</legend>
                                    <div class="form-group">
                                        <input type="text" name="number_of_booth2" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="meterage_of_booth2" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price_of_booth2_per_meter" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 3</legend>
                                    <div class="form-group">
                                        <input type="text" name="number_of_booth3" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="meterage_of_booth3" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price_of_booth3_per_meter" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 4</legend>
                                    <div class="form-group">
                                        <input type="text" name="number_of_booth4" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="meterage_of_booth4" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price_of_booth4_per_meter" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                            </fieldset>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل اکسل قیمت کالا و خدمات</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="price_file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی شرایط مکانی نمایشگاه</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="place_checklist_file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                    <div class="input-group-append">
                                        <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست تایید شرایط مکانی.pdf']) }}"
                                            target="_blank" class="input-group-text">
                                            دانلود چک لیست
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی غرفه در زمان فروش در نمایشگاه</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="booth_checklist_file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                    <div class="input-group-append">
                                        <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست ارزیابی غرفه در زمان فروش در نمایشگاه.pdf']) }}"
                                            target="_blank" class="input-group-text">
                                            دانلود چک لیست
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل چک لیست ارزیابی مجری برگزاری نمایشگاه در زمان برگزاری
                                    نمایشگاه</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="performance_checklist_file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                    <div class="input-group-append">
                                        <a href="{{ route('download.fromPublicFolder', ['name' => 'چک لیست ارزیابی مجری برگزاری نمایشگاه در زمان برگزاری نمایشگاه.pdf']) }}"
                                            target="_blank" class="input-group-text">
                                            دانلود چک لیست
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <fieldset class="row col-sm-12">
                                <legend>مجری <button class="btn btn-default">دانلود نمونه قرارداد با مجری</button></legend>
                                
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputEmail1">نام مجری: </label>
                                    <input type="text" name="performancer_name" class="form-control" id="exampleInputEmail1"
                                        placeholder="نام مجری">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">نام خانوادگی مجری: </label>
                                    <input type="text" name="performancer_lname" class="form-control" id="exampleInputPassword1"
                                        placeholder="نام خانوادگی مجری">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">کدملی مجری: </label>
                                    <input type="text" name="performancer_nid" class="form-control" id="exampleInputPassword1"
                                        placeholder="کدملی مجری">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">تلفن همراه مجری: </label>
                                    <input type="text" name="performancer_mobile" class="form-control" id="exampleInputPassword1"
                                        placeholder="تلفن همراه مجری">
                                </div>
                            </fieldset>


                        </div>

                        
                    </form>
                    <div class="card-footer">
                        <button class="btn btn-primary" onclick="submit()">ثبت</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        initial_view()

        function submit() {
            var form = $('#form')[0];
            fd = new FormData(form);
            send_ajax_formdata_request(
                "{{ route('namayeshgah.add') }}",
                fd,
                function(res){
                    console.log(res);
                }
            )
        }
    </script>
@endsection
