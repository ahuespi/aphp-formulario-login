<?php

class IsSecuredPassword implements ValidationRuleInterface
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
        $regex = '/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/i';

        return (bool) preg_match_all($regex, $this->value);
    }

    public function getMessage(): string 
    {
        return 'La password no es valida';
    }
}
