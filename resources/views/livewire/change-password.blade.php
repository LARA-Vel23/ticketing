<div class="card border-0 mb-0">
    <div class="card-header border-0">
        <div class="poppins-bold" style="font-size: 20px;">{{ __('Change Password') }}</div>
        <p class="poppins m-0 text-muted font-size-sm" style="font-size: 13px;">{{ __('Secure & protect your account') }}</p>
    </div>
    <div class="card-body py-4 py-md-5 py-lg-5">
        <x-form-session />
        <div class="d-flex flex-column gap-0 align-items-start flex-lg-row gap-lg-5 align-items-lg-center mb-3">
            <label for="" class="fw-bold" style="font-size: 14px; max-width: 100px; width: 100%;">{{ __('Password') }}</label>
            <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" wire:target="updatePassword" wire:loading.attr="readonly" wire:loading.class="opacity-50" wire:model="currentPassword">
        </div>
        <div class="d-flex flex-column gap-0 align-items-start flex-lg-row gap-lg-5 align-items-lg-center mb-3">
            <label for="" class="fw-bold" style="font-size: 14px; max-width: 100px; width: 100%;">{{ __('New Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" wire:target="updatePassword" wire:loading.attr="readonly" wire:loading.class="opacity-50" wire:model="password">
        </div>
        <div class="d-flex flex-column gap-0 align-items-start flex-lg-row gap-lg-5 align-items-lg-center mb-3">
            <label for="" class="fw-bold" style="font-size: 14px; max-width: 100px; width: 100%;">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" wire:target="updatePassword" wire:loading.attr="readonly" wire:loading.class="opacity-50" wire:model="password_confirmation">
        </div>
        <button type="button" class="btn btn-success text-light float-end m-0" wire:click="updatePassword" wire:loading.attr="disabled">
            <div wire:loading.remove>
                {{ __('Save Changes') }}
            </div>
            <div wire:loading>
                {{ __('Loading...') }}
            </div>
        </button>
    </div>
</div>
