<?php

namespace App\Helpers;

class LanguageHelper
{
    /**
     * Get current language
     */
    public static function getCurrentLanguage(): string
    {
        return request()->cookie('lang', 'en');
    }

    /**
     * Check if current language is English
     */
    public static function isEnglish(): bool
    {
        return self::getCurrentLanguage() === 'en';
    }

    /**
     * Check if current language is Farsi
     */
    public static function isFarsi(): bool
    {
        return self::getCurrentLanguage() === 'fa';
    }

    /**
     * Get text based on current language
     */
    public static function getText(string $english, string $farsi): string
    {
        return self::isEnglish() ? $english : $farsi;
    }

    /**
     * Get direction based on current language
     */
    public static function getDirection(): string
    {
        return self::isEnglish() ? 'ltr' : 'rtl';
    }

    /**
     * Get text alignment based on current language
     */
    public static function getTextAlign(): string
    {
        return self::isEnglish() ? 'text-left' : 'text-right';
    }

    /**
     * Get opposite language
     */
    public static function getOppositeLanguage(): string
    {
        return self::isEnglish() ? 'fa' : 'en';
    }

    /**
     * Get language name
     */
    public static function getLanguageName(): string
    {
        return self::isEnglish() ? 'English' : 'فارسی';
    }
}
