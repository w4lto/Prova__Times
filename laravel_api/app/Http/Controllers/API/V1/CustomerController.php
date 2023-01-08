<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Symfony\Component\HttpFoundation\Request;
use App\Filters\V1\CustomersFilter;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $filterItens = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeInvoices = $request->query('includeInvoices');

        $customers = Customer::where($filterItens);

        if ($includeInvoices){
            $customers = $customers->with('invoices');
        }
        
        
        
        
        

        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $includeInvoices = request()->query('includeInvoices');

        if ($includeInvoices)
        {
            return new CustomerResource($customer->loadMissing('invoices'));
        }

        return new CustomerResource($customer);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

/*
This is a feature that i thinked about because we are dealing with an API that need to handle a lot of data with deverse parameters
there's a few things that are missing for the bulk really works but this is the main idea.

function bulkStore(Request $request){

}


Route::post('invoices\bulk', ['uses' => 'InvoiceController@bulkStore']);


//Validation for each object from my bulk array, 
    
    // '*.customer_id'=>['required', 'extra'];

    /* 'extra' is any kind of extra key that we need to consider, as date_format, type of value (integer, numeric, etc)
    or an rule.*/ 

// customer_id can be (and need to) changed to any parameter that we want, as amount off itens sold, date of billing etc. 

/*
function prepareForValidation(){
    $data = [];

    foreach ($this-> toArray as $obj) {
        $obj['customer_id'] = $obj['customerId'] ?? null; //Do that for every parameter that we have 

        $data[] = $obj;
    }

    $this->merge($data);
}

*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
