@if ($errors->has('verifications'))
        <h4 class="alert alert-danger">{{$errors->first('verifications')}}</h4>
@endif

@if (session("success"))
    <h4 class="alert alert-success">{{session("success")}}</h4>
@endif