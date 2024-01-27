<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? '' }}">
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">{{ __('land owner fullname') }}:</label>
        <input type="text" name="land_owner_fullname" class="form-control"
            id="exampleInputPassword1" placeholder="{{ __('land owner fullname') }}">
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
