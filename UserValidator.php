<?php

class UserValidator extends Validator
{
    public function validate()
    {
        foreach ($this->rules as $key => $value) {
            foreach ($value as $validator) {

                // instancia de la regla de validacion
                $instance = new $this->rulesValidators[$validator];
                // Nombre del metodo getter del objeto
                $getter = "get" . ucfirst($key);
                
                // Tomo el valor de la propiedad invocando el getter
                $v = $this->obj->{$getter}();
                
                //Le paso al validador el valor a validar
                $instance->setValue($v); 

                if (!$instance->isValid()) {
                    $this->addError($key, $instance->getMessage());
                }

            }
        }
    }
}

