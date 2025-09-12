<?php

namespace Lxl921118\TestPackage\test;

class Test
{

    /**
     * 產生隨機字串
     *
     * @param int $length 字串長度，預設為 10
     *
     * @return string
     */
    public function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /***
     * 西元日期轉民國日期
     * 
     * @param string $date 西元日期，格式為 YYYY-MM-DD
     * 
     * @return string 民國日期，格式為 ROC YYYY-MM-DD
     * 
     */
    public function convertToROCDate(string $date): string
    {
        $year = (int) substr($date, 0, 4);
        $month = (int) substr($date, 5, 2);
        $day = (int) substr($date, 8, 2);

        // 將西元年轉換為民國年
        $rocYear = $year - 1911;

        return sprintf("ROC %03d-%02d-%02d", $rocYear, $month, $day);
    }

    /**
     * 民國日期轉西元日期
     */
    public function convertToADDate(string $date): string
    {
        $rocYear = (int) substr($date, 4, 3);
        $month = (int) substr($date, 8, 2);
        $day = (int) substr($date, 11, 2);

        // 將民國年轉換為西元年
        $adYear = $rocYear + 1911;

        return sprintf("%04d-%02d-%02d", $adYear, $month, $day);
    }
}
