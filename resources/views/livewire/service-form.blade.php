<div>
     <div class="form-group mb-3">
        <label for="transaction_type">{{ __('Transaction Type') }}</label>
        <select aria-label="select1" class="form-select rounded-0 @error('transaction_type') is-invalid @enderror @if(!$errors->has('payment_type') && $transaction_type) is-valid @endif" wire:model="transaction_type" wire:target='store' wire:loading.attr='readonly' wire:loading.class='opacity-50'>
            <option selected>Select</option>
            <option value="Credit Card">{{ __('Credit Card') }}</option>
            <option value="Debit Card">{{ __('Debit Card') }}</option>
            </select>
        @error('transaction_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="bank_list">{{ __('Bank List') }}</label>
        <select aria-label="select2" class="form-select rounded-0 @error('bank_list') is-invalid @enderror @if(!$errors->has('bank_list') && $bank_list) is-valid @endif" wire:model="bank_list" wire:target='store' wire:loading.attr='readonly' wire:loading.class='opacity-50'>
            <option selected>{{ __('Select') }}</option>
            <option value="Credit Card">{{ __('Credit Card') }}</option>
            <option value="Debit Card">{{ __('Debit Card') }}Debit Card</option>
            </select>
        @error('bank_list')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="remarks">{{ __('Remarks') }}</label>
        <textarea class="form-control rounded-0 @error('remarks') is-invalid @enderror @if(!$errors->has('remarks') && $remarks) is-valid @endif" wire:model="remarks" wire:target='store' wire:loading.attr='readonly' wire:loading.class='opacity-50' placeholder="" id="exampleFormControlTextarea1" rows="3"></textarea>
        @error('remarks')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    <div class="form-group mb-3">
        <label for="amount">{{ __('Amount') }}</label>
        <input type="text" class="form-control rounded-0 @error('amount') is-invalid @enderror @if(!$errors->has('amount') && $amount) is-valid @endif" wire:model="amount" wire:target='store' wire:loading.attr='readonly' wire:loading.class='opacity-50' placeholder="" />
        @error('amount')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12">
        <button  wire:loading.attr="disabled" class="btn btn-success rounded-2 float-end text-light px-4 mt-2 w-50" wire:click="store" type="button">
            <div wire:loading.remove>
                {{ __('Save') }}
            </div>
            <div wire:loading>
                {{ __('Processing...') }}
            </div>
        </button>
    </div>
</div>


