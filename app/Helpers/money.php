<?php

if(!function_exists('format_rupiah')){
  function format_rupiah($amount): string  
  {
    return "Rp.{$amount}";
  }
}