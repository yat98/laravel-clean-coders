<?php

namespace App\Services;

use App\Interfaces\DownloadableReport;

class UsersReport implements DownloadableReport
{
  public function getName() :string
  {
    return 'Users report';
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