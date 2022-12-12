<?php

namespace App\Interfaces;

interface NewsletterSubscriptionInterface
{
  public function handle(string $email): void;
}