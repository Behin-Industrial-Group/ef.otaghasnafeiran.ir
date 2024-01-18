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


                    <form>
                        <div class="card-body">
                            <fieldset class="row col-sm-12">
                                <legend>مجری</legend>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputEmail1">نام مجری: </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">نام خانوادگی مجری: </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">کدملی مجری: </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputPassword1">تلفن همراه مجری: </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                            </fieldset>

                            <fieldset class="row col-sm-12">
                                <legend>غرفه ها</legend>
                                <fieldset>
                                    <legend>درجه 1</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 2</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 3</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>درجه 4</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="تعداد">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="متراژ غرفه">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="قیمت به ازای هر متر مربع">
                                    </div>
                                </fieldset>
                            </fieldset>

                            <div class="form-group">
                                <label for="exampleInputFile">فایل اکسل قیمت کالا و خدمات</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">بارگزاری</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="exampleInputPassword1">شماره تماس روابط عمومی نمایشگاه:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="شماره تماس روابط عمومی">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">آدرس دقیق محل برگزاری نمایشگاه:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="آدرس محل برگزاری نمایشگاه">
                            </div>
                            
                            

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <form action="javascript:void(0)" id="form" class="form-control">

                </form>
            </div>
        </div>
    </div>
@endsection
