<?php
require_once 'HashInterface.php';
class Hashing implements HashInterface
{
    public static function hashPassword(string $value): string
    {
        return password_hash($value, PASSWORD_DEFAULT); //made static because we don't need anything from the class instance
    }

    public static function isPasswordValid(string $value, string $hashedValue): bool
    {
        return password_verify($value, $hashedValue);
    }
}