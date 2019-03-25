<?php

class IsNotEmptyRule implements ValidationRuleInterface
{
    private $value;
    
    public function setValue($value)
    {
        if (is_string($value)) {
            $this->value = trim($value);
        }

        if (is_array($value)) {
            $this->value = $value;
        }

        return $this;
    }

    public function isValid(): bool
    {
        return ! empty($this->value);
    }
    public function getMessage(): string 
    {
        return 'Este campo debe ser completado';
    }
}
