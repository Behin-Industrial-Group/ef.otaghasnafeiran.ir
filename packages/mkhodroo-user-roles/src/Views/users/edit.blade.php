<div class="row">
    <div class="col-sm-6">
        <h4>{{ _('User Info') }}</h4><hr>
        <form action="javascript:void()" id="method-form">
            @csrf
            @foreach ($user as $key => $value)
                <label for="">{{ __($key) }}</label>
                <input type="text" name="{{ $key }}" id="" value="{{ $value }}"
                    class="form-control">
            @endforeach

        </form>
        <button class="btn btn-success" onclick="submit()">submit</button>
    </div>
    <div class="col-sm-6">
        <h4>{{ _('Profile') }}</h4><hr>
        <form action="javascript:void()" id="method-form">
            @csrf
            @foreach ($user_info as $key => $value)
                <label for="">{{ __($key) }}</label>
                <input type="text" name="{{ $key }}" id="" value="{{ $value }}"
                    class="form-control">
            @endforeach
        </form>
        <button class="btn btn-success" onclick="submit()">submit</button>
    </div>



</div>
<script>
    function submit() {
        send_ajax_request(
            "{{ route('role.edit') }}",
            $('#method-form').serialize(),
            function(data) {
                console.log(data);
            }
        )
    }
</script>
