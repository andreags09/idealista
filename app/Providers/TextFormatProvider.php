<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TextFormatProvider extends ServiceProvider
{
    public static function format($text): string
    {
        $lowercase = strtolower($text);
        $accents = ['á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü', 'Ñ'];
        $withoutAccents = ['a', 'e', 'i', 'o', 'u', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'U', 'N'];

        return strtr($lowercase, array_combine($accents, $withoutAccents));
    }
}
