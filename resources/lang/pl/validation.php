<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Pole :attribute musi byc zaakceptowane.',
    'active_url' => 'Pole :attribute nie jest poprawnym linkiem.',
    'after' => 'Pole :attribute musi być po :date.',
    'after_or_equal' => 'Pole :attribute musi być po lub równa :date.',
    'alpha' => 'Pole :attribute może się składać tylko z liter.',
    'alpha_dash' => 'Pole :attribute może się składać tylko z liter, liczb, myślników i podkreślników.',
    'alpha_num' => 'Pole :attribute może się składać tylko z liter i liczb.',
    'array' => 'Pole :attribute musić być tablicą.',
    'before' => 'Pole :attribute musi być przed :date.',
    'before_or_equal' => 'The :attribute musi być przed lub równa :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi być pomiędzy :min a :max.',
        'file' => 'Pole :attribute musi mieć pomiędzy :min a :max kilobajtów.',
        'string' => 'Pole :attribute musi mieć pomiędzy :min a :max znaków.',
        'array' => 'Pole :attribute musi mieć pomiędzy :min a :max rzeczy.',
    ],
    'boolean' => 'Pole :attribute musi zawierać prawdę lub fałsz.',
    'confirmed' => 'Potwierdzenie pola :attribute nie zgadza się.',
    'date' => 'Pole :attribute nie jest poprawną datą.',
    'date_equals' => 'Pole :attribute musi być równe dacie :date.',
    'date_format' => 'Pole :attribute nie pasuje do formatu :format.',
    'different' => 'Pole :attribute i :other muszą być różne.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć pomiędzy :min a :max cyfr.',
    'dimensions' => 'Pole :attribute ma niepoprawne wymiary.',
    'distinct' => 'Pole :attribute posiada dwie takie same wartości.',
    'email' => 'Pole :attribute musi być poprawnym adresem email.',
    'ends_with' => 'Pole :attribute musi się kończyć: :values.',
    'exists' => 'Wybrane pole :attribute jest niepoprawne.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi posiadać wartość.',
    'gt' => [
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'file' => 'Pole :attribute musi być większe niż :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć więcej niż :value znaków.',
        'array' => 'Pole :attribute musi mieć więcej niż :value rzeczy.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'file' => 'Pole :attribute musi być większe lub równe :value kilobajtów.',
        'string' => 'Pole :attribute mieć :value lub więcej znaków.',
        'array' => 'Pole :attribute musi mieć :value lub więcej rzeczy.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrane pole :attribute jest niepoprawne.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => 'Pole :attribute musi być liczbą.',
    'ip' => 'Pole :attribute musi być poprawnym adresem IP.',
    'ipv4' => 'Pole :attribute musi być poprawnym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być poprawnym adresem IPv6.',
    'json' => 'Pole :attribute musi być w poprawnym formacie JSON.',
    'lt' => [
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'file' => 'Pole :attribute musi być mniejsze niż :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć mniej niż :value znaków.',
        'array' => 'Pole :attribute musi mieć mniej niż :value rzeczy.',
    ],
    'lte' => [
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value kilobajtów.',
        'string' => 'Pole :attribute mieć :value lub mniej znaków.',
        'array' => 'Pole :attribute musi mieć :value lub mniej rzeczy.',
    ],
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file' => 'Pole :attribute nie może mieć więcej niż :max kilobajtów.',
        'string' => 'Pole :attribute nie może mieć więcej niż :max znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :max rzeczy.',
    ],
    'mimes' => 'Pole :attribute musi być typu: :values.',
    'mimetypes' => 'Pole :attribute musi być typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi mieć co najmniej :min.',
        'file' => 'Pole :attribute musi mieć co najmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć co najmniej :min rzeczy.',
    ],
    'multiple_of' => 'Pole :attribute musi być wielokrotnością :value.',
    'not_in' => 'Wybrane pole :attribute jest niepoprawne.',
    'not_regex' => 'Format pola :attribute jest niepoprawny.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'password' => 'Hasło niepoprawne.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Format pola :attribute jest niepoprawny.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane jeśli :other jest :value.',
    'required_unless' => 'Pole :attribute jest wymagane chyba, że :other jest: :values.',
    'required_with' => 'Pole :attribute jest wymagane jeśli jest: :values.',
    'required_with_all' => 'Pole :attribute jest wymagane jeśli są: :values.',
    'required_without' => 'Pole :attribute jest wymagane jeśli nie ma :values.',
    'required_without_all' => 'Pole :attribute jest wymagane jeśli nie ma żadnego z tych: :values.',
    'same' => 'Pole :attribute i :other musza być takie same.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file' => 'Pole :attribute musi być rozmiaru :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi mieć :size rzeczy.',
    ],
    'starts_with' => 'The :attribute musi zaczynać się od: :values.',
    'string' => 'Pole :attribute musi być napisem.',
    'timezone' => 'Pole :attribute musi być poprawną strefą.',
    'unique' => 'Pole :attribute jest już zajęte.',
    'uploaded' => 'Pole :attribute nie zostało wysłane.',
    'url' => 'Pole :attribute ma niepoprawny format.',
    'uuid' => 'Pole :attribute musi być poprawnym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
