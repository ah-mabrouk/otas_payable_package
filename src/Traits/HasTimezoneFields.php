<?php

namespace Solutionplus\Payable\Traits;

use Solutionplus\Payable\Helpers\Tz;

Trait HasTimezoneFields
{
    public function getCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'] != null ? Tz::createFromServer($this->attributes['created_at']) : $value;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] != null ? Tz::createFromServer($this->attributes['updated_at']) : $value;
    }
}
