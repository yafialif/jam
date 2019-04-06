<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use \GeniusTS\PrayerTimes\Prayer;
use \GeniusTS\PrayerTimes\Coordinates;
//use O2System\Kernel\Cli\Writers\Format;
use \GeniusTS\PrayerTimes\Methods\World;
class PrayTimeController extends Controller
{
    //
    public function oneday($lat, $long){
        $onday = $this->praytime_oneday($lat, $long);
        return $onday;
    }
    public function onemonth($lat, $long){
        $onmonth = $this->praytime_onemonth($lat, $long);
        return $onmonth;
    }
    private function praytime_oneday($lat, $long){
        $prayer = new Prayer();
        $prayer->setCoordinates($long,$lat);
        //Changing times adjustments.
        $prayer->setAdjustments(-5, -3, 5, 2, 4, -16);
        //Changing the mathhad of calculation Asr prayer.
        $prayer->setMathhab(Prayer::MATHHAB_STANDARD);
        //Changing the high latitude rule.
        $prayer->setHighLatitudeRule(Prayer::HIGH_LATITUDE_MIDDLE_OF_NIGHT);
        // Return an \GeniusTS\PrayerTimes\Times instance
        $date = date('Y-m-d');
        $times = $prayer->times($date);
        $times->setTimeZone(+7);
        $onday = array();
        $time_fajr = $times->fajr->format('H:i');
        $time_sunrise = $times->sunrise->format('H:i');
        //Start Syuruq
        $time1_unix = strtotime(date('Y-m-d').' '.$time_sunrise.':00');
        $time2_unix = strtotime(date('Y-m-d').' '.'00:15');
        $syuruq = date('H:i', ($time1_unix + $time2_unix));
        //End Syuruq
        $time_duhr = $times->duhr->format('H:i');
        $time_asr = $times->asr->format('H:i');
        $time_maghrib = $times->maghrib->format('H:i');
        $time_isha = $times->isha->format('H:i');
        //Waktu Tengah Malam
        $fajar = strtotime(date('Y-m-d').' '.$time_fajr.':00');
        $maghrib = strtotime(date('Y-m-d').' '.$time_maghrib.':00');
        $wtm = date('H:i', $maghrib+(($fajar - $maghrib)/2));
        //waktu 1/3 malam
        $time3_unix = strtotime(date( '03:40:00'));
        $wsepertiga = date('H:i', ($fajar - $time3_unix));

        $onday['fajr']=$time_fajr;
        $onday['sunrise']=$time_sunrise;
        $onday['syuruq']=$syuruq;
        $onday['duhr']=$time_duhr;
        $onday['asr']=$time_asr;
        $onday['maghrib']=$time_maghrib;
        $onday['isha']=$time_isha;
        $onday['wtm']=$wtm;
        $onday['wsm']=$wsepertiga;


        return response()->json($onday, 200);
    }

    private function praytime_onemonth($lat, $long){
        // get day one month
        $tahun = date('Y'); //Mengambil tahun saat ini
        $bulan = date('m'); //Mengambil bulan saat ini
        $totalhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $onemonth = array();
        for( $i=1;  $i <= $totalhari; $i++ ){
            $prayer = new Prayer();
            $prayer->setCoordinates($long,$lat);
            //Changing times adjustments.
            $prayer->setAdjustments(-6, -3, 4, -1, 2, -18);
            // Return an \GeniusTS\PrayerTimes\Times instance
            $tanggal = date('Y-m-').sprintf("%02s",$i);
            $times = $prayer->times($tanggal);
            $times->setTimeZone(+7);

            $time_fajr = $times->fajr->format('H:i');
            $time_sunrise = $times->sunrise->format('H:i');
            //Start Syuruq
            $time1_unix = strtotime(date('Y-m-d').' '.$time_sunrise.':00');
            $time2_unix = strtotime(date('Y-m-d').' '.'00:15');
            $syuruq = date('H:i', ($time1_unix + $time2_unix));
            //End Syuruq
            $time_duhr = $times->duhr->format('H:i');
            $time_asr = $times->asr->format('H:i');
            $time_maghrib = $times->maghrib->format('H:i');
            $time_isha = $times->isha->format('H:i');
            //Waktu Tengah Malam
            $fajar = strtotime(date('Y-m-d').' '.$time_fajr.':00');
            $maghrib = strtotime(date('Y-m-d').' '.$time_maghrib.':00');
            $wtm = date('H:i', $maghrib+(($fajar - $maghrib)/2));
            //waktu 1/3 malam
            $time3_unix = strtotime(date( '03:40:00'));
            $wsepertiga = date('H:i', ($fajar - $time3_unix));
            //Add Array onemonth
            $onemonth[$tanggal]=array(
            'fajr'=>$time_fajr,
            'sunrise'=>$time_sunrise,
            'syuruq'=>$syuruq,
            'duhr'=>$time_duhr,
            'asr'=>$time_asr,
            'maghrib'=>$time_maghrib,
            'isha'=>$time_isha,
            'wtm'=>$wtm,
            'wsm'=>$wsepertiga,


            );

        }

        return response()->json($onemonth, 200);


    }
}
