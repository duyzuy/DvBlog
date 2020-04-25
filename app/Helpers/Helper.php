<?php

/*
* custom helper class
*
*/
namespace App\Helpers;


use Illuminate\Support\Carbon;

class Helper
{

    public static function diffForHumans($date)
    {

        Carbon::setLocale('vi_VN');

        return Carbon::parse($date)->format('l jS \\of F Y h:i:s A');
    }
    
    public static function vnTime()
    {
        $boringLanguage = 'vi';

        $translator = \Carbon\Translator::get($boringLanguage);
        
        $translator->setTranslations([
            'day'  => ':count ngay truoc|:count ngay truoc',
            'year' =>  ':count nam truoc|:count nam truoc',
            'sun' => 'CN',
            'mon' => 'T2',
            'tue' => 'T3',
            'wed' => 'T4',
            'thu' => 'T5',
            'fri' => 'T6',
            'sat' => 'T7',
            'sunday' => 'Chủ nhật',
            'monday' => ':count Thứ hai | :count Thu 2',
            'tuesday' => 'Thứ ba',
            'wednesday' => 'Thứ tư',
            'thursday' => 'Thứ năm',
            'friday' => 'Thứ sáu',
            'saturday' => 'Thứ bảy',
            'january' => 'Tháng Một',
            'february' => 'Tháng Hai',
            'march' => 'Tháng Ba',
            'april' => 'Tháng Tư',
            'may' => 'Tháng Năm',
            'june' => 'Tháng Sáu',
            'july' => 'Tháng Bảy',
            'august' => 'Tháng Tám',
            'september' => 'Tháng Chín',
            'october' => 'Tháng Mười',
            'november' => 'Tháng M. một',
            'december' => 'Tháng M. hai',
            'jan' => 'T01',
            'feb' => 'T02',
            'mar' => 'T03',
            'apr' => 'T04',
            'may2' => 'T05',
            'jun' => 'T06',
            'jul' => 'T07',
            'aug' => 'T08',
            'sep' => 'T09',
            'oct' => 'T10',
            'nov' => 'T11',
            'dec' => 'T12',
        ]);
        // as this language starts with "en_" it will inherit from the locale "en"

        $date1 = Carbon::create(2020, 3, 23, 0, 0, 0);


        return $date1->locale($boringLanguage)->format('M j, Y h:ia'); // 3 boring days before
        
        $translator = [
        
            'sun' => 'CN',
            'mon' => 'T2',
            'tue' => 'T3',
            'wed' => 'T4',
            'thu' => 'T5',
            'fri' => 'T6',
            'sat' => 'T7',
            'sunday' => 'Chủ nhật',
            'monday' => ':count Thứ hai | :count Thu 2',
            'tuesday' => 'Thứ ba',
            'wednesday' => 'Thứ tư',
            'thursday' => 'Thứ năm',
            'friday' => 'Thứ sáu',
            'saturday' => 'Thứ bảy',
            'january' => 'Tháng Một',
            'february' => 'Tháng Hai',
            'march' => 'Tháng Ba',
            'april' => 'Tháng Tư',
            'may' => 'Tháng Năm',
            'june' => 'Tháng Sáu',
            'july' => 'Tháng Bảy',
            'august' => 'Tháng Tám',
            'september' => 'Tháng Chín',
            'october' => 'Tháng Mười',
            'november' => 'Tháng M. một',
            'december' => 'Tháng M. hai',
            'jan' => 'T01',
            'feb' => 'T02',
            'mar' => 'T03',
            'apr' => 'T04',
            'may2' => 'T05',
            'jun' => 'T06',
            'jul' => 'T07',
            'aug' => 'T08',
            'sep' => 'T09',
            'oct' => 'T10',
            'nov' => 'T11',
            'dec' => 'T12',
        
        ];
       
    }

    public static function customTranslate(){
        $str = '';
        $date = getdate();
        foreach($date as $val => $key){
            switch($val){
                case 'seconds':
                     $str .= 'giay' ;
                break;

                case 'minutes':
                    $str .= 'phut' ;
               break;

               case 'hours':
                $str .= 'gio' ;
            break;
            }
        }
        return $str;

    }
    

   

   
}