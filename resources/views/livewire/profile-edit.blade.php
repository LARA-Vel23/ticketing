<div class="card border-0">
    <div class="card-header border-0">
        <div class="poppins-bold" style="font-size: 20px;">{{ __('My Profile') }}</div>
        <p class="poppins m-0 text-muted font-size-sm" style="font-size: 13px;">{{ __('Manage your account') }}</p>
    </div>
    <form class="card-body py-4 py-md-5 py-lg-5" wire:submit="updateProfile">
        <x-form-session />
        <div class="d-flex flex-column gap-0 align-items-start flex-lg-row gap-lg-5 align-items-lg-center mb-3">
            <label for="name" class="fw-bold" style="max-width: 100px; width: 100%;">{{ __('Full Name') }}</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:target='updateProfile' wire:loading.attr='readonly' wire:loading.class='opacity-50' wire:model='name'>
        </div>
        <div class="d-flex flex-column gap-0 align-items-start flex-lg-row gap-lg-5 align-items-lg-center mb-3">
            <label for="email" class="fw-bold" style="max-width: 100px; width: 100%;">{{ __('Email') }}</label>
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" wire:target="updateProfile" wire:loading.attr="readonly" wire:loading.class="opacity-50" wire:model="email">
        </div>
        <button type="submit" class="btn btn-success text-light float-end mt-4" wire:loading.attr="disabled">
            <div wire:loading.remove>
                {{ __('Update') }}
            </div>
            <div wire:loading>
                {{ __('Updating...') }}
            </div>
        </button>
    </form>
</div>
