<?php
interface HashInterface
{
    public function hashPassword(string $value): string;
    public function isPasswordValid(string $value, string $hashedValue): bool;
}