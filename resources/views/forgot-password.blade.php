<form class="card mt-5 p-5 md:p-10" action="{{route('forgot.password.post')}}" method="POST" id="forgot">
    @csrf
    <div class="mb-5">
        <label class="label block mb-2" for="email">Email</label>
        <input id="email" type="text" class="form-control" placeholder="example@example.com" name="email">
    </div>
    @error('email')
    <div class="alert alert_outlined alert_primary mt-5 mb-5">
        {{ $message }}
        <button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
    </div>
    @enderror
    <div class="flex">
        <button type="submit" class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase">Send Reset
            Link</button>
    </div>
</form>
