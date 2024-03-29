<?php
declare(strict_types=1);

if (!function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string $haystack Haystack to find in.
     * @param array<string>|string $needles Needle to search from haystack.
     * @return bool
     */
    function starts_with(string $haystack, string|array $needles): bool
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param string  $subject Subject to search from.
     * @param string  $search Search string from subject.
     * @return string
     */
    function str_after(string $subject, string $search): string
    {
        if (!$search || !$subject) {
            return $subject;
        }

        $exploded = explode($search, $subject, 2);

        return array_reverse($exploded)[0];
    }
}
