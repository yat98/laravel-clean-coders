<?php

namespace App\Interfaces;

interface DownloadableReport
{
  public function getName(): string;

  public function getHeaders(): array;

  public function getData(): array;
}