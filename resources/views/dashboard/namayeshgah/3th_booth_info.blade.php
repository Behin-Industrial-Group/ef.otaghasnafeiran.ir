<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? '' }}">
    <div class="form-group">
        <input type="text" name="number_of_booth3" class="form-control"
            id="exampleInputEmail1" placeholder="تعداد">
    </div>
    <div class="form-group">
        <input type="text" name="meterage_of_booth3" class="form-control"
            id="exampleInputEmail1" placeholder="متراژ غرفه">
    </div>
    <div class="form-group">
        <input type="text" name="price_of_booth3_per_meter" class="form-control" dir="auto"
            id="exampleInputEmail1" placeholder="قیمت به ازای هر متر مربع (ریال)">
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
