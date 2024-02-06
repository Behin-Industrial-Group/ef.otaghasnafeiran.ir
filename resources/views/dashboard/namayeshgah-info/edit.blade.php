<div>
    <table class="table table-striped">
        <h5>اطلاعات زمان و مکان برگزاری</h5>
        <tr>
            <td>{{ __('address') }}</td>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <td>{{ __('start_date') }}</td>
            <td>{{ $data['start_date'] }}</td>
        </tr>
        <tr>
            <td>{{ __('end_date') }}</td>
            <td>{{ $data['end_date'] }}</td>
        </tr>
    </table>
    <hr>
    @if (auth()->user()->access('نمایش اطلاعات مسئول اجرایی'))
        <table class="table table-striped">
            <h5>اطلاعات مسئول اجرایی</h5>
            <tr>
                <td>{{ __('excutive_director_fullname') }}</td>
                <td>{{ $data['excutive_director_fullname'] }}</td>
            </tr>
            <tr>
                <td>{{ __('excutive_director_mobile') }}</td>
                <td>{{ $data['excutive_director_mobile'] }}</td>
            </tr>
        </table>
        <hr>
    @endif
    @if (auth()->user()->access('نمایش اطلاعات مجری'))
        <table class="table table-striped">
            <h5>اطلاعات مجری</h5>
            <tr>
                <td>{{ __('performancer_name') }}</td>
                <td>{{ $data['performancer_name'] }}</td>
            </tr>
            <tr>
                <td>{{ __('performancer_lname') }}</td>
                <td>{{ $data['performancer_lname'] }}</td>
            </tr>
            <tr>
                <td>{{ __('performancer_nid') }}</td>
                <td>{{ $data['performancer_nid'] }}</td>
            </tr>
            <tr>
                <td>{{ __('performancer_mobile') }}</td>
                <td>{{ $data['performancer_mobile'] }}</td>
            </tr>
            @if ($data['performancer_deal'])
                <tr>
                    <td>{{ __('performancer_deal') }}</td>
                    <td><a href="{{ $data['performancer_deal'] }}">{{__('download')}}</a></td>
                </tr>
            @endif
        </table>
        <hr>
    @endif
    @if (auth()->user()->access('نمایش اطلاعات روابط عمومی'))
        <table class="table table-striped">
            <h5>اطلاعات روابط عمومی</h5>
            <tr>
                <td>{{ __('pr_fullname') }}</td>
                <td>{{ $data['pr_fullname'] }}</td>
            </tr>
            <tr>
                <td>{{ __('pr_mobile') }}</td>
                <td>{{ $data['pr_mobile'] }}</td>
            </tr>
            <tr>
                <td>{{ __('pr_phone') }}</td>
                <td>{{ $data['pr_phone'] }}</td>
            </tr>
        </table>
        <hr>
    @endif
    @if (auth()->user()->access('نمایش اطلاعات مالک زمین'))
        <table class="table table-striped">
            <h5>اطلاعات مالک</h5>
            <tr>
                <td>{{ __('land_owner_fullname') }}</td>
                <td>{{ $data['land_owner_fullname'] }}</td>
            </tr>
        </table>
        <hr>
    @endif



    @if (auth()->user()->access('نمایش اطلاعات غرفه ها'))
        <table class="table table-striped">
            <h5>اطلاعات غرفه ها</h5>
            <tr>
                <td>{{ __('number_of_booth1') }}</td>
                <td>{{ $data['number_of_booth1'] }}</td>
            </tr>
            <tr>
                <td>{{ __('meterage_of_booth1') }}</td>
                <td>{{ $data['meterage_of_booth1'] }}</td>
            </tr>
            <tr>
                <td>{{ __('price_of_booth1_per_meter') }}</td>
                <td>{{ $data['price_of_booth1_per_meter'] }}</td>
            </tr>
            <tr>
                <td>{{ __('number_of_booth2') }}</td>
                <td>{{ $data['number_of_booth2'] }}</td>
            </tr>
            <tr>
                <td>{{ __('meterage_of_booth2') }}</td>
                <td>{{ $data['meterage_of_booth2'] }}</td>
            </tr>
            <tr>
                <td>{{ __('price_of_booth2_per_meter') }}</td>
                <td>{{ $data['price_of_booth2_per_meter'] }}</td>
            </tr>
            <tr>
                <td>{{ __('number_of_booth3') }}</td>
                <td>{{ $data['number_of_booth3'] }}</td>
            </tr>
            <tr>
                <td>{{ __('meterage_of_booth3') }}</td>
                <td>{{ $data['meterage_of_booth3'] }}</td>
            </tr>
            <tr>
                <td>{{ __('price_of_booth3_per_meter') }}</td>
                <td>{{ $data['price_of_booth3_per_meter'] }}</td>
            </tr>
            <tr>
                <td>{{ __('number_of_booth4') }}</td>
                <td>{{ $data['number_of_booth4'] }}</td>
            </tr>
            <tr>
                <td>{{ __('meterage_of_booth4') }}</td>
                <td>{{ $data['meterage_of_booth4'] }}</td>
            </tr>
            <tr>
                <td>{{ __('price_of_booth4_per_meter') }}</td>
                <td>{{ $data['price_of_booth4_per_meter'] }}</td>
            </tr>
        </table>
    @endif
    @if (auth()->user()->access('نمایش اطلاعات فایل قیمت ها'))
        <table class="table table-striped">
            <h5>فایل ها</h5>
            
            @if ($data['price_file'])
                <tr>
                    <td>{{ __('price_file') }}</td>
                    <td><a href="{{ $data['price_file'] }}">{{__('download')}}</a></td>
                </tr>
            @endif
            @if ($data['place_checklist_file'])
                <tr>
                    <td>{{ __('place_checklist_file') }}</td>
                    <td><a href="{{ $data['place_checklist_file'] }}">{{__('download')}}</a></td>
                </tr>
            @endif
            @if ($data['booth_checklist_file'])
                <tr>
                    <td>{{ __('booth_checklist_file') }}</td>
                    <td><a href="{{ $data['booth_checklist_file'] }}">{{__('download')}}</a></td>
                </tr>
            @endif
            @if ($data['performance_checklist_file'])
                <tr>
                    <td>{{ __('performance_checklist_file') }}</td>
                    <td><a href="{{ $data['performance_checklist_file'] }}">{{__('download')}}</a></td>
                </tr>
            @endif
        </table>
        <hr>
    @endif

    {{-- @foreach ($data as $key => $value)
    
            <tr>
                <td>{{ __($key) }}</td>
                <td>{{__($value)}}</td>
            </tr>
        
@endforeach --}}
    </table>
</div>
