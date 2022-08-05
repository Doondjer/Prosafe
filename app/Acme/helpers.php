<?php

if( ! function_exists('constructPrice')){

    /**
     * Get formated and localised price with currency
     *
     * @param int $price
     * @param string $currency
     * @return string
     */
    function constructPrice($price, $currency)
    {
        $fmt = new \NumberFormatter(app()->getLocale(), \NumberFormatter::CURRENCY);
        return numfmt_format_currency($fmt, $price, $currency);
    }
}
