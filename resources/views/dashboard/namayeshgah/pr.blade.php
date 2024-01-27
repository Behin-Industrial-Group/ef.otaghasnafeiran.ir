<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? '' }}">
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">{{ __('pr fullname') }}:</label>
        <input type="text" name="pr_fullname" value="{{ $data['pr_fullname'] ?? '' }}" class="form-control"
            id="exampleInputPassword1" placeholder="{{ __('pr fullname') }}">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">{{ __('pr mobile') }}:</label>
        <input type="text" name="pr_mobile" value="{{ $data['pr_mobile'] ?? '' }}" class="form-control" dir="ltr"
            id="exampleInputPassword1" placeholder="{{ __('pr mobile') }}">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">شماره تماس روابط عمومی نمایشگاه:</label>
        <input type="text" name="pr_phone" value="{{ $data['pr_phone'] ?? '' }}" class="form-control" dir="ltr"
            id="exampleInputPassword1" placeholder="شماره تماس روابط عمومی">
    </div>
</form>
<button class="btn btn-primary" onclick="submit('modal_form')">ثبت</button>
