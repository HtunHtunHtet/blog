<?php

namespace App\Services;

class ConvertKitNewsletter implements NewsLetter
{
    public function subscribe(string $email, string $list = null)
    {
        // subscribe the user with ConvertKit-specif Api rquest
    }
}
