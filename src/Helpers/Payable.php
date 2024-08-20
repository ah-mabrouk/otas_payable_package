<?php

namespace Solutionplus\Payable\Helpers;

use Solutionplus\MicroService\Helpers\MsHttp;

class Payable
{
    public string $uri;
    public array $headers = [];

    public function __construct(string $companyReferenceNumber)
    {
        $this->uri = "companies/{$companyReferenceNumber}/payment-requests";
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
            uri: $this->uri,
            data: $payableData,
            additionalHeaders: $this->headers
        );
    }

    public function validatedPayableData()
    {
        return [
            'gateway' => 'sometimes|string|exists:gateways,name',
            'currency' => 'required|string|exists:currencies,iso_code',
            'amount' => 'required|numeric|min:1|max:9999999999',
            'due_date' => 'required|date_format:Y-m-d H:i:s|after:' . now(),
            'payable_reference_number' => 'sometimes|string|min:10|max:25',

            'name' => 'required|string|min:3|max:225',
            'email' => 'required|email',
            'phone' => 'required|min:1|digits_between:9,15',
            'country_code' => 'required_with:phone|min:3|max:5',
            'street' => 'required|string|min:3|max:20',
            'city' => 'required|string|min:3|max:20',
            'state' => 'required|string|min:3|max:20',
            'country' => 'required|string|min:3|max:20',
            'zip' => 'required|numeric|digits:5',
        ];
    }
}
