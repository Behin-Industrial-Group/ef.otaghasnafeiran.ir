@extends('isicView::layouts.guest')

@section('content')
    <!-- Container to center the content with a top margin -->
    <div class="form-container" style="display: block !important; margin: auto; max-width: 400px">

        <!-- Form Box -->
        <div class="form-box bg-light p-4 shadow rounded" style="max-width: 500px;">
            @include('isicView::partial.form-header')

            <!-- Form -->
            <p dir="rtl" class="alert alert-warning" style="text-align: justify; font-family: 'Vazir">
                با سلام و احترام،

<br>

به استحضار می‌رساند در راستای اجرای طرح جامع بازنگری و به‌روزرسانی کدهای ملی آیسیک، بر اساس ساختارهای بین‌المللی و متناسب‌سازی آن‌ها با شرایط و مقتضیات کسب و کار در ایران، تغییرات جدید به تأیید ادارات و مقامات ذی‌ربط رسیده است. بر این اساس، ساختار جدید کدهای آیسیک با لحاظ الگوهای بین‌المللی در ۵ سطح طراحی شده است؛ به نحوی که سطوح ۱ تا ۳ به‌طور کامل با استانداردهای بین‌المللی همسو و سطوح ۴ و ۵ متناسب با نیازهای ملی تنظیم شده‌اند.

<br>

از شما همراهان گرامی درخواست می‌شود با ورود کد آیسیک فعلی خود، تغییرات انجام‌شده را بررسی نموده و در صورت مشاهده هرگونه مغایرت یا وجود پیشنهادات، در بخش نظرات و پیشنهادات اعلام فرمایید. مشارکت و همکاری شما عزیزان نقش به‌سزایی در بهبود فرآیندها و ارتقاء سطح خدمت‌رسانی خواهد داشت.
<br>


پیشاپیش از توجه و همکاری شما سپاسگزاریم.

<br>

با احترام
<br>
[اتاق اصناف ایران]
            </p>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" onclick="submit_form()">بعدی</button>
            </div>
        </div>
    </div>


    <script>
        function submit_form() {
            var fd = new FormData($('#registeration-form')[0])
            send_ajax_formdata_request(
                "{{ route('isic.step0') }}",
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
