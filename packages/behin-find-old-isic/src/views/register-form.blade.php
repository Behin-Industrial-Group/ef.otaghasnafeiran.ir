@extends('isicView::layouts.guest')

@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

            <!-- Form -->
            <form class="" action="javascript:void(0)" id="registeration-form" dir="rtl">
                <!-- Old Isic Code -->
                <div class="mb-3">
                    <label for="old_isic_code" class="form-label">{{ trans('old isic code') }}</label>
                    <input type="text" name="old_isic_code" class="form-control" id="old_isic_code"
                        placeholder="{{ trans('Enter old code isic') }}">
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="submit_form()">بعدی</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('isic.step1') }}",
                fd,
                function(response) {
                    if (response.status == 200) {
                        window.location = response.url
                    }
                }
            )
        }
    </script>
@endsection
