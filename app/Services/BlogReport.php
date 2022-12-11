<?php

namespace App\Services;

use App\Interfaces\DownloadableReport;

class BlogReport implements DownloadableReport
{
  public function getName() :string
  {
    return 'Blog report';
  }

  public function getHeaders() :array
  {
    return [];
  }

  public function getData() :array
  {
    return ['The data for the report is here.'];
  }
}