<?php

$user_information = [
    [
        "unique_id" => 001 ,
        "name"      => "Ali",
        "age"       => 19,
        "phone_num" => '03331234567',
    ],
    [
        "unique_id" => 002 ,
        "name"      => "Hassan",
        "age"       => 19,
        "phone_num" => '03007894561'
    ],
    [
        "unique_id" => 003 ,
        "name"      => "Ammar",
        "age"       => 20,
        "phone_num" => '03325561238'
    ],
    [
        "unique_id" => 004 ,
        "name"      => "Mustafa",
        "age"       => 20,
        "phone_num" => '21331237895'
    ],
    [
        "unique_id" => 005 ,
        "name"      => "Murtaza",
        "age"       => 20,
        "phone_num" => '02034568219'
    ]
];

$user_credentials = [
    //user_info is the child array
    [
        "unique_id"           => 001 ,
        "email"               => 'ali@example.com',
        "password"            => 'abc123',
        "user_information_id" => 001
    ],
    [
        "unique_id"           => 002 ,
        "email"               => 'hassan@example.com',
        "password"            => 'a1b2c3',
        "user_information_id" => 002
    ],
    [
        "unique_id"           => 003 ,
        "email"               => 'ammar@example.com',
        "password"            => 'xyz123',
        "user_information_id" => 003
    ],
    [
        "unique_id"           => 004 ,
        "email"               => 'mustafa@example.com',
        "password"            => '123abc',
        "user_information_id" => 004
    ],
    [
        "unique_id"           => 005 ,
        "email"               => 'murtaza@example.com',
        "password"            => 'abcxyz',
        "user_information_id" => 005
    ]
   
];