<?php

namespace App\DataTransferObject;

use GuzzleHttp\Psr7\Request;
use Spatie\DataTransferObject\DataTransferObject;

class StoreUserDTO extends DataTransferObject
{
    public string $name;

    public string $email;

    public string $password;
}