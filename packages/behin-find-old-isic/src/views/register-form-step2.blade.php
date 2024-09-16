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
                    <input type="hidden" name="unique_id" class="form-control" id="unique_id"
                        value="{{ $row->unique_id }}">
                </div>


                <!-- Old Isic Code -->
                <div class="mb-3">
                    <label for="old_isic_code" class="form-label">{{ trans('old isic code') }}</label>
                    <input type="text" value="{{ $row->old_isic_code }}" class="form-control" id="old_isic_code"
                        readonly>
                </div>

                <!-- Old Isic Title -->
                <div class="mb-3">
                    <label for="old_isic_title" class="form-label">{{ trans('old isic title') }}</label>
                    <input type="text" value="{{ $row->old_isic_title }}" class="form-control" id="old_isic_title"
                        readonly>
                </div>

                <!-- New Isic Code -->
                <div class="mb-3">
                    <label for="new_isic_code" class="form-label">{{ trans('new isic code') }}</label>
                    <input type="number" value="{{ $row->code . $row->_1 }}" class="form-control" id="new_isic_code"
                        readonly>
                </div>


                @for ($i = 1; $i < 6; $i++)
                    @php
                        $var = 'level' . $i;
                    @endphp
                    <!-- Level {{ $i }} -->

                    <div class="mb-3 ">
                        <label for="level{{ $i }}" class="form-label">{{ trans('level ' . $i) }}</label>
                        <p class="form-control">{{ $row->$var }}</p>
                    </div>
                @endfor


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="submit_form()">{{ trans('leave a comment') }}</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('isic.step2') }}",
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
