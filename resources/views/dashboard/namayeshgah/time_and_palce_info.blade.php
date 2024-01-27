<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? ''}}">
    <div class="form-group col-sm-12">
        <label for="exampleInputPassword1">استان و شهرستان</label>
        <select name="city_id" class="select2" id="city">
            <script>
                send_ajax_get_request(
                    "{{route('city.all')}}",
                    function(res){
                        var s = $('#city');
                        res.forEach(function(item){
                            s.append(new Option(item.province + ' ' + item.city, item.id))
                        })
                    }
                )
            </script>
        </select>
    </div>
    <div class="form-group col-sm-12">
        <label for="exampleInputPassword1">آدرس دقیق محل برگزاری نمایشگاه:</label>
        <textarea type="text" name="address" class="form-control" id="exampleInputPassword1"
            placeholder="آدرس محل برگزاری نمایشگاه">{{ $data['address'] ?? ''}}</textarea>
    </div>
    <div class="form-group col-sm-12">
        <label for="exampleInputPassword1">زمان برگزاری نمایشگاه</label>
        <div class="row col-sm-12">
            از:<input type="text" name="start_date"class="form-control col-sm-4 persian-date" dir="auto"
                id="exampleInputPassword1">
            تا:<input type="text" name="end_date"class="form-control col-sm-4 persian-date" dir="auto"
                id="exampleInputPassword1">
        </div>

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
                    $(this).val(`${res[$(this).attr('name')]}`);
                    $(this).trigger('change');
                })
            }
        )
    @endisset
    initial_view()
</script>
