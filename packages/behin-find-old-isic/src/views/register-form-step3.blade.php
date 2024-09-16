@extends('isicView::layouts.guest')

@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

            <!-- Form -->
            <form class="" action="javascript:void(0)" id="registeration-form" dir="rtl">
                <!-- Unique ID -->
                <div class="mb-3">
                    <input type="hidden" name="unique_id" class="form-control" id="unique_id" value="{{ $unique_id }}">
                </div>


                <!-- Mobile -->
                <div class="mb-3">
                    <label for="mobile" class="form-label">{{ trans('mobile') }}</label>
                    <input type="text" name="mobile" class="form-control" id="mobile">
                </div>
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">{{ trans('fullname') }}</label>
                    <input type="text" name="fullname" class="form-control" id="fullname">
                </div>
                <!-- Comment -->
                <div class="mb-3">
                    <label for="comment" class="form-label">{{ trans('comment') }}</label>
                    <textarea name="comment" rows="9" class="form-control" id="comment"></textarea>
                </div>


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="submit_form()">{{ trans('submit') }}</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('isic.step3') }}",
                fd,
                function(response) {
                    console.log(response);

                    $('#registeration-form').html(response)
                }
            )
        }
    </script>
@endsection
