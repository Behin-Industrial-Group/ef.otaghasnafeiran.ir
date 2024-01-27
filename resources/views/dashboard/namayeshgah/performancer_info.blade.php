<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? '' }}">
    {{-- <button class="btn btn-default">دانلود نمونه قرارداد با مجری</button> --}}
    <h3>
        این بخش پس از تکمیل اطلاعات نمایشگاه و در تاریخ 12 بهمن فعال خواهد شد
    </h3>
    <div class="form-group col-sm-8">
        <label for="exampleInputEmail1">نام مجری: </label>
        <input type="text" name="performancer_name" class="form-control"
            id="exampleInputEmail1" placeholder="نام مجری">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">نام خانوادگی مجری: </label>
        <input type="text" name="performancer_lname" class="form-control"
            id="exampleInputPassword1" placeholder="نام خانوادگی مجری">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">کدملی مجری: </label>
        <input type="text" name="performancer_nid" class="form-control" dir="ltr"
            id="exampleInputPassword1" placeholder="کدملی مجری">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">تلفن همراه مجری: </label>
        <input type="text" name="performancer_mobile" class="form-control" dir="ltr"
            id="exampleInputPassword1" placeholder="تلفن همراه مجری">
    </div>
</form>
<button class="btn btn-primary" onclick="submit('modal_form')">ثبت</button>
<script>
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
</script>
