<?php

namespace Solutionplus\Payable\Contacts;

interface PaymentCallbackContract
{
    public function handleCallback(): string;
}