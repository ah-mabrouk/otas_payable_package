<?php

namespace Solutionplus\Payable\Helpers;

use Solutionplus\MicroService\Helpers\MsHttp;

class Payable
{
    public array $headers = [];

    public function __construct()
    {
    }

    public function withHeaders(array $headers = []): self
    {
        $this->headers = \array_merge(request()->header(), $headers);
        return $this;
    }

    public function createPaymentRequest(array $payableData)
    {
        return MsHttp::post(
            microserviceName: 'payment',
            uri: 'payment-requests',
            data: $payableData,
            additionalHeaders: $this->headers
        );
    }

    public function validatedPayableData()
    {
        return [
            'company_reference_number' => 'sometimes|string',
            'gateway' => 'sometimes|string|exists:gateways,name',
            'currency' => 'required|string|exists:currencies,iso_code',
            'amount' => 'required|numeric|min:1|max:9999999999',
            'due_date' => 'required|date_format:Y-m-d H:i:s|after:' . now(),
            'payable_reference_number' => 'sometimes|string|min:10|max:25',

            'name' => 'required|string|min:3|max:225',
            'email' => 'required|email',
            'phone' => 'required|min:1|digits_between:9,15',
            'country_code' => 'required_with:phone|min:3|max:5',
            'street' => 'required|string|min:3|max:100',
            'city' => 'required|string|min:1|max:100',
            'state' => 'required|string|min:1|max:100',
            'country' => 'required|string|min:1|max:100',
            'zip' => 'required|numeric|digits:5',
        ];
    }
}
