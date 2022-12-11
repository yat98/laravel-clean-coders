<?php

namespace App\Services;

use App\Interfaces\DownloadableReport;

class ReportDownloadService{
  public function downloadReportPDF(DownloadableReport $report)
  {
    $name = $report->getName();

    // Download file here...
  }
}