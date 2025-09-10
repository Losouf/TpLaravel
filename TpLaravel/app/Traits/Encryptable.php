<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

trait Encryptable
{
    protected array $encryptable = [];

    public function setAttribute($key, $value)
    {
        if ($value !== null && in_array($key, $this->encryptable, true)) {
            $value = Crypt::encryptString($value);
        }
        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if ($value !== null && in_array($key, $this->encryptable, true)) {
            try {
                return Crypt::decryptString($value);
            } catch (DecryptException $e) {
                return $value;
            }
        }

        return $value;
    }
}
