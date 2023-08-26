<?php

use App\Models\BookingHistory;
use App\Models\Bundle;
use App\Models\Course;
use App\Models\Currency;
use App\Models\ForumPostComment;
use App\Models\Instructor;
use App\Models\InstructorConsultationDayStatus;
use App\Models\Language;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\RankingLevel;
use App\Models\Review;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\ZoomSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


function showToastrMessage($type, $message)
{
  switch ($type) {
    case 'success':
      return toastr()->success($message, '', ["positionClass" => "toast-top-right"]);
      break;
    case 'warning':
      return toastr()->warning($message, '', ["positionClass" => "toast-top-right"]);
      break;
    case 'error':
      return toastr()->error($message, '', ["positionClass" => "toast-top-right"]);
      break;
    default:
      return toastr()->success($message, '', ["positionClass" => "toast-top-right"]);
  }
}

function clearAuthCookieData()
{
  if (isset($_COOKIE['auth'])) {
    unset($_COOKIE['auth']);
    // setcookie('auth', '', time() - 3600, '/'); // empty value and old timestamp
    setcookie('auth', '', 1, '/');
  }
}









function get_option($option_key)
{
  $system_settings = config('settings');

  if ($option_key && isset($system_settings[$option_key])) {
    return $system_settings[$option_key];
  } else {
    return '';
  }
}




function get_number_format($amount)
{
  return number_format($amount, 2);
}





function getImageFile($file)
{
  return asset($file);
}


