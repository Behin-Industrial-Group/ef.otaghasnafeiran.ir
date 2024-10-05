@extends('isicView::layouts.guest')

@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

            <!-- Form -->
            <form class="" action="{{ route('isic.step1') }}" method="POST" id="registeration-form" dir="rtl">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">{{ trans('fullname') }}</label>
                    <input type="text" name="fullname" class="form-control" id="fullname">
                </div>
                <!-- Mobile -->
                <div class="mb-3">
                    <label for="mobile" class="form-label">{{ trans('mobile') }}</label>
                    <input type="text" name="mobile" class="form-control" id="mobile">
                </div>

                <!-- Union Name -->
                <div class="mb-3">
                    <label for="union_name" class="form-label">{{ trans('union_name') }}</label>
                    <input type="text" name="union_name" class="form-control" id="union_name">
                </div>

                <!-- City Name -->
                <div class="mb-3">
                    <label for="city" class="form-label">{{ trans('ptovince & city') }}</label>
                    <input type="text" name="city" class="form-control" id="city">
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">{{ trans('type') }}</label>
                    <select type="text" name="type" class="form-control" id="type">
                        <option value="تولیدی">تولیدی</option>
                        <option value="خدمات فنی">خدمات فنی</option>
                        <option value="توزیعی">توزیعی</option>
                        <option value="خدماتی">خدماتی</option>
                    </select>
                </div>

                <!-- Old Isic Code -->
                <div class="mb-3">
                    <label for="old_isic_code" class="form-label">{{ trans('old isic code') }}</label>
                    <input type="text" name="old_isic_code" value="" class="form-control" id="old_isic_code">
                </div>

                {{-- <!-- Comment -->
                <div class="mb-3">
                    <label for="comment" class="form-label">{{ trans('comment') }}</label>
                    <textarea name="comment" rows="9" class="form-control" id="comment"></textarea>
                </div> --}}

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{ trans('submit') }}</button>
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
                    console.log(response);

                    $('#registeration-form').html(response)
                }
            )
        }
    </script>
@endsection
