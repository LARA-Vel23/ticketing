<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\CountryService;

class CountryController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new CountryService);
    }

    public function index(): View
    {
        return view('pages.admin.country.index');
    }

    public function create(): View
    {
        return view('pages.admin.country.create');
    }

    public function store(StoreCountryRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Country Created Successfully!');
    }

    public function edit(Country $country): View
    {
        return view('pages.admin.country.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $this->service->update($request->validated(), $country);
        return redirect()->back()->withSuccess('Country Updated Successfully!');
    }
}
