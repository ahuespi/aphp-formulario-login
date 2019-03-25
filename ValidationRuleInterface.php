<?php

interface ValidationRuleInterface
{
    public function setValue($value);
    public function isValid(): bool;
    public function getMessage(): string;
}