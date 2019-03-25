<?php

class IsEmailRule extends IsNotEmptyRule implements ValidationRuleInterface
{
    private $value;

    public function setValue($value) 
    {
        $this->value = $value;
        return $this;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function isValid(): bool 
    {
        return filter_var($this->value, FILTER_VALIDATE_EMAIL);
    }

    public function getMessage(): string 
    {
        return 'El formato del email no es valido';
    }
}