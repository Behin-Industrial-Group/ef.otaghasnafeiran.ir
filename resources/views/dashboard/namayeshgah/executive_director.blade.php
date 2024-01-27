<form action="javascript:void(0)" id="modal_form">
    <input type="hidden" name="id" id="" value="{{ $id ?? '' }}">
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">{{ __('executive director fullname') }}:</label>
        <input type="text" name="excutive_director_fullname" value="{{ $data['excutive_director_fullname'] ?? '' }}"
            class="form-control" id="exampleInputPassword1" placeholder="{{ __('executive director fullname') }}">
    </div>
    <div class="form-group col-sm-8">
        <label for="exampleInputPassword1">{{ __('executive director mobile') }}:</label>
        <input type="text" name="excutive_director_mobile" value="{{ $data['excutive_director_mobile'] ?? '' }}" dir="ltr"
            class="form-control" id="exampleInputPassword1" placeholder="{{ __('executive director mobile') }}">
    </div>
</form>
<button class="btn btn-primary" onclick="submit('modal_form')">ثبت</button>
