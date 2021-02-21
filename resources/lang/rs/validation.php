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

    'accepted' => 'Polje :attribute mora biti prihvaćeno.',
    'active_url' => 'Polje :attribute nije validan link.',
    'after' => 'Polje :attribute mora biti datum posle :date.',
    'after_or_equal' => 'Polje :attribute mora biti kasnije od :date.',
    'alpha' => 'Polje :attribute može sadržati samo slova.',
    'alpha_dash' => 'Polje :attribute može sadržati slova, brojeve, crtice i donje crtice.',
    'alpha_num' => 'Polje :attribute može sadržati samo slova i brojeve.',
    'array' => 'Polje :attribute mora biti niz.',
    'before' => 'Polje :attribute mora biti datum pre :date.',
    'before_or_equal' => 'Polje :attribute mora biti jednak ili pre :date.',
    'between' => [
        'numeric' => 'Polje :attribute mora biti između :min i :max.',
        'file' => 'Polje :attribute mora biti između :min i :max kilobajta.',
        'string' => 'Polje :attribute mora biti između :min i :max karaktera.',
        'array' => 'Polje :attribute mora biti između :min i :max item-a.',
    ],
    'boolean' => 'Polje :attribute mora biti tačno ili netačno.',
    'confirmed' => 'Polje :attribute se ne slaže.',
    'date' => 'Polje :attribute nije validan datum.',
    'date_equals' => 'Polje :attribute mora biti datum jednak :date.',
    'date_format' => 'Polje :attribute nije u formatu :format.',
    'different' => 'Polje :attribute i :other se moraju razlikovati.',
    'digits' => 'Polje :attribute mora biti :digits broj.',
    'digits_between' => 'Polje :attribute mora biti između :min i :max digits.',
    'dimensions' => 'Polje :attribute nema validne dimenzije.',
    'distinct' => 'Polje :attribute ima dupliranu vrednost.',
    'email' => 'Polje :attribute mora biti validna mejl adresa.',
    'ends_with' => 'Polje :attribute se mora završiti sa: :values.',
    'exists' => 'Polje selected :attribute je nevalidno.',
    'file' => 'Polje :attribute mora biti fajl.',
    'filled' => 'Polje :attribute ne može biti prazno.',
    'gt' => [
        'numeric' => 'Polje :attribute mora biti veće od :value.',
        'file' => 'Polje :attribute mora biti veće od :value kilobajta.',
        'string' => 'Polje :attribute mora biti veće od :value karaktera.',
        'array' => 'Polje :attribute mora imati više od :value item-a.',
    ],
    'gte' => [
        'numeric' => 'Polje :attribute mora biti veće ili jednako od :value.',
        'file' => 'Polje :attribute mora biti veće ili jednako od :value kilobajta.',
        'string' => 'Polje :attribute mora biti veće ili jednako od :value karaktera.',
        'array' => 'Polje :attribute mora imati :value item-a ili više.',
    ],
    'image' => 'Polje :attribute mora biti slika.',
    'in' => 'Polje :attribute nije validno.',
    'in_array' => 'Polje :attribute ne postoji u :other.',
    'integer' => 'Polje :attribute mora biti broj.',
    'ip' => 'Polje :attribute mora biti validna IP adresa.',
    'ipv4' => 'Polje :attribute mora biti validna IPv4 adresa.',
    'ipv6' => 'Polje :attribute mora biti validna IPv6 adresa.',
    'json' => 'Polje :attribute mora biti validan JSON string.',
    'lt' => [
        'numeric' => 'Polje :attribute mora biti manje od :value.',
        'file' => 'Polje :attribute mora biti manje od :value kilobajta.',
        'string' => 'Polje :attribute mora biti manje od :value karaktera.',
        'array' => 'Polje :attribute mora biti manje od :value item-a.',
    ],
    'lte' => [
        'numeric' => 'Polje :attribute mora biti manje ili jednako :value.',
        'file' => 'Polje :attribute mora biti manje ili jednako :value kilobajta.',
        'string' => 'Polje :attribute mora biti manje ili jednako :value karaktera.',
        'array' => 'Polje :attribute mora biti manje ili jednako :value item-a.',
    ],
    'max' => [
        'numeric' => 'Polje :attribute ne može biti veće od :max.',
        'file' => 'Polje :attribute ne može biti veće od :max kilobajta.',
        'string' => 'Polje :attribute ne može biti veće od :max karaktera.',
        'array' => 'Polje :attribute ne može biti veće od :max item-a.',
    ],
    'mimes' => 'Polje :attribute mora biti fajl tipa: :values.',
    'mimetypes' => 'Polje :attribute mora biti fajl tipa: :values.',
    'min' => [
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
        'file' => 'Polje :attribute mora biti najmanje :min kilobajta.',
        'string' => 'Polje :attribute mora biti najmanje :min karaktera.',
        'array' => 'Polje :attribute mora biti najmanje :min item-a.',
    ],
    'multiple_of' => 'Polje :attribute mora biti množilac od :value',
    'not_in' => 'Selektovano polje :attribute nije validno.',
    'not_regex' => 'Polje :attribute nije u validnom formatu.',
    'numeric' => 'Polje :attribute mora biti broj.',
    'password' => 'Polje password nije validna.',
    'present' => 'Polje :attribute mora biti popunjeno.',
    'regex' => 'Polje :attribute nije u validnom formatu.',
    'required' => 'Polje :attribute je obavezno.',
    'required_if' => 'Polje :attribute je obavezno kada :other je :value.',
    'required_unless' => 'Polje :attribute je obavezno dok :other je u :values.',
    'required_with' => 'Polje :attribute je obavezno kada :values je popunjeni.',
    'required_with_all' => 'Polje :attribute je obavezno kada :values su popunjeni.',
    'required_without' => 'Polje :attribute je obavezno kada :values nisu popunjeni.',
    'required_without_all' => 'Polje :attribute je obavezno kada nijedan od :values nije popunjen.',
    'same' => 'Polje :attribute i :other se moraju slagati.',
    'size' => [
        'numeric' => 'Polje :attribute mora biti dužine :size.',
        'file' => 'Polje :attribute mora biti dužine :size kilobajta.',
        'string' => 'Polje :attribute mora biti dužine :size karaktera.',
        'array' => 'Polje :attribute mora sadržati :size item-a.',
    ],
    'starts_with' => 'Polje :attribute mora početi sa jednim od: :values.',
    'string' => 'Polje :attribute mora biti string.',
    'timezone' => 'Polje :attribute mora biti u validnoj zoni.',
    'unique' => 'Polje :attribute je već zauzeto.',
    'uploaded' => 'Polje :attribute se ne može upload-ovati.',
    'url' => 'Polje :attribute nije u validnom formatu.',
    'uuid' => 'Polje :attribute mora biti validan id.',

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

    'attributes' => [
        'code' => 'šifra',
        'token' => 'token',
        'email' => 'mejl',
        'password' => 'šifra',
        'name' => 'naziv',
        'description' => 'opis',
        'manufacturer' => 'proizvođač',
        'category' => 'kategorija',
        'subcatеgory' => 'podkategorija',
        'sizes' => 'dimenzije',
        'prices' => 'cene',
        'discounted_prices' => 'akcijske cene',
        'images' => 'slike',
        'colors' => 'boje',
        'available' => 'na stanju',
        'sale' => 'akcija',
        'first_name' => 'ime',
        'last_name' => 'prezime',
        'phone' => 'telefon',
        'address' => 'adresa',
        'city' => 'grad',
        'zip_code' => 'poštanski broj',
        'subject' => 'naslov',
        'message' => 'poruka',
    ],

];
