<div>
    <table class="table table-striped">
@foreach ($data as $key=> $value)
    
            <tr>
                <td>{{ __($key) }}</td>
                <td>{{__($value)}}</td>
            </tr>
        
@endforeach
</table>
</div>