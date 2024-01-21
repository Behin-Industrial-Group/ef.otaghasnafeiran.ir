<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? ''}}">
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">آدرس دقیق محل برگزاری نمایشگاه:</label>
        <textarea type="text" name="address" class="form-control" id="exampleInputPassword1"
            placeholder="آدرس محل برگزاری نمایشگاه">{{ $data['address'] ?? ''}}</textarea>
    </div>
    <div class="form-group col-sm-12">
        <label for="exampleInputPassword1">زمان برگزاری نمایشگاه</label>
        <div class="row col-sm-12">
            از:<input type="text" name="start_date" value="{{ $data['start_date'] ?? ''}}" class="form-control col-sm-4 persian-date"
                id="exampleInputPassword1">
            تا:<input type="text" name="end_date" value="{{ $data['end_date'] ?? ''}}" class="form-control col-sm-4 persian-date"
                id="exampleInputPassword1">
        </div>

    </div>
</form>
<button class="btn btn-primary" onclick="submit('modal_form')">ثبت</button>
<script>
    initial_view()
</script>
