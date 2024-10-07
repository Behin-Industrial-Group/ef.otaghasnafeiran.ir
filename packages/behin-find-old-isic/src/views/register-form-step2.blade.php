@extends('isicView::layouts.guest')


@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

            <!-- Form -->
            <form class="" action="{{ route('isic.step2') }}" method="POST" id="registeration-form" dir="rtl">
                @csrf
                <!-- Comment ID -->
                <div class="mb-3">
                    <input type="hidden" name="comment_id" class="form-control" id="comment_id"
                        value="{{ $comment->id }}">
                </div>


                @if ($row)
                    <p class="alert alert-warning" dir="rtl">
                        کد آیسیک شما به شماره: {{ $row->old_isic_code }} با عنوان: {{ $row->old_isic_title }} به کد زیر
                        تغییر
                        کرد.
                    </p>
                    <!-- New Isic Code -->
                    <div class="mb-3">
                        <label for="new_isic_code" class="form-label">{{ trans('new isic code') }}</label>
                        <input type="number" value="{{ $row->code . $row->_1 }}" class="form-control" id="new_isic_code"
                            readonly>
                    </div>

                    <!-- New Isic title -->
                    <div class="mb-3">
                        <label for="new_isic_title" class="form-label">{{ trans('new isic title') }}</label>
                        <input value="{{ $row->level5 }}" class="form-control" id="new_isic_title" readonly>
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
                @else
                    <p class="alert alert-danger" dir="rtl">
                        کد آیسیک شما یافت نشد.
                    </p>
                @endif


                <!-- Comment -->
                <div class="mb-3">
                    <label for="comment" class="form-label">{{ trans('comment') }}</label>
                    <textarea name="comment" rows="9" class="form-control" id="comment"></textarea>
                </div>


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="">{{ trans('leave a comment') }}</button>
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
