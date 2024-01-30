<div class="row">
    <div class="col-sm-6">
        <h4>{{ _('User Info') }}</h4><hr>
        <form action="javascript:void()" id="user-form">
            @csrf
            @foreach ($user as $key => $value)
                <label for="">{{ __($key) }}</label>
                <input type="text" name="{{ $key }}" id="" value="{{ $value }}"
                    class="form-control">
            @endforeach

        </form>
        <button class="btn btn-success" onclick="edit_user()">submit</button>
    </div>
    <div class="col-sm-6">
        <h4>{{ _('Profile') }}</h4><hr>
        <form action="javascript:void()" id="info-form">
            @csrf
            {{-- @foreach ($user_info as $key => $value)
                <label for="">{{ __($key) }}</label>
                <input type="text" name="{{ $key }}" id="" value="{{ $value }}"
                    class="form-control">
            @endforeach --}}
        </form>
        <button class="btn btn-success" onclick="edit_profile()">submit</button>
    </div>



</div>
<script>
    function edit_user() {
        send_ajax_request(
            "{{ route('user.edit') }}",
            $('#user-form').serialize(),
            function(data) {
                console.log(data);
            }
        )
    }

    function edit_profile() {
        send_ajax_request(
            "{{ route('user.editInfo') }}",
            $('#info-form').serialize(),
            function(data) {
                console.log(data);
            }
        )
    }
</script>
