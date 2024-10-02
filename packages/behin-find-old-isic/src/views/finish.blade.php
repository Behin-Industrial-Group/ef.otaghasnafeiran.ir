@extends('isicView::layouts.guest')


@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

<p class="alert alert-success" dir="rtl">
    از شما سپاسگزاریم که وقت ارزشمند خود را در اختیار ما گذاشتید و با ارائه نظرات و پیشنهادات سازنده، ما را در بهبود و ارتقاء سطح خدمت‌رسانی یاری می‌نمایید. حضور و همراهی شما در این مسیر، سرمایه‌ای گرانبها برای ما خواهد بود.
<br>
با احترام
<br>
[اتاق اصناف ایران]

</p>
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
