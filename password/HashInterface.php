<?php
interface HashInterface
{
    public static function hashPassword(string $value): string;
    public static function isPasswordValid(string $value, string $hashedValue): bool;
}