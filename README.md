# Solutionplus/Payable

solutionplus/payable is a Laravel package for dealing with specific case of payments, it doesn't suit all needs.

## Table of Content
[Installation](#Installation)

[Usage](#Usage)

[License](#License)

## Installation

You can install the package using composer

```bash
# cli commands

composer require solutionplus/payable
```

## usage

There is some predefined methods to perform the needed actions:

```php
    # create payment request object from payment microservice:
    # `$payableData` should be ['key' => 'value'] pair array which represent inputs in request
    $payable = new Payable($companyReferenceNumber);
    $response = $payable->withHeaders(['X-example' => 'header-value'])->createPaymentRequest($payableData);
```

// `$payableData` validation rules are as the following:
```php
    [
        'gateway' => 'required|string|exists:gateways,name',
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
```

#### Note:
> UNDER CONSTRUCTION.

## License

Solutionplus/payable package is limited and proprietary software belongs to Solutionplus.net company.
