<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ServiceForm extends Component
{
    use LivewireAlert;

    public string $transaction_type;
    public string $bank_list;
    public string $remarks;
    public string $amount;

    public function render(): View
    {
        return view('livewire.service-form');
    }
    public function store(): void
    {
        $this->validate([
            'transaction_type' => ['required', 'min:3', 'max:145'],
            'bank_list' => ['required', 'min:3', 'max:145'],
            'remarks' => ['required', 'min:3', 'max:191'],
            'amount' => ['required', 'min:3', 'max:191'],

        ]);

        DB::beginTransaction();

        try{
            $payment = new Service;
            $payment->transaction_type = $this->transaction_type;
            $payment->bank_list = $this->bank_list;
            $payment->remarks = $this->remarks;
            $payment->amount = $this->amount;
            $payment->save();

            $this->reset();

            DB::commit();

            $this->alert('success', 'Custom Message', [
                'toast' => false,
                'position' => 'center',
                'allowOutsideClick' => false,
                'backdrop' => true,
                'timerProgressBar' => true,
                'timer' =>  1000,
                'title' => 'Service has been saved successfully!',
                'onProgressFinished' => 'redirectToOrderPage',
            ]);

        }catch(\Exception $error){
            DB::rollBack();
            $this->alert('error', 'Custom Message', [
                'toast' => false,
                'position' => 'center',
                'title' => 'Error',
                'timer' => 10000,
                'timerProgressBar' => true,
                'text' => $error->getMessage(),
            ]);
        }
    }
}
