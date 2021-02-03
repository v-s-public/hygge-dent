<?php

return [
    'title' => 'HYGGE` dent',
    'navigation_and_sections' => [
        'home' => 'Home',
        'about_us' => 'About us',
        'results' => 'Results',
        'for_patients' => 'For patients',
        'how_can_we_help_you' => 'How can we help you?',
        'our_team' => 'Our team'
    ],
    'slider' => [
        'buttons' => [
            'make_an_appointment' => 'Make an appointment',
            'contact_us' => 'Contact us'
        ],
        'modals' => [
            'appointment_form' => [
                'header' => 'Appointment',
                'fields' => [
                    'fio' => 'First name, second name',
                    'phone' => 'Phone',
                    'message' => 'Message'
                ],
                'buttons' => [
                    'cancel' => 'Cancel',
                    'make_an_appointment' => 'Make an appointment'
                ],
                'validation_messages' => [
                    'required' => 'Required field.',
                    'phone_number_format' => 'Wrong phone format.'
                ]
            ],
            'appointment_success' => [
                'header' => 'Appointment',
                'text' => 'Your appointment request was received!',
                'button' => 'Close'
            ],
            'message_form' => [
                'header' => 'Message',
                'fields' => [
                    'fio' => 'First name, last name',
                    'email' => 'E-mail',
                    'theme' => 'Тheme',
                    'message' => 'Message'
                ],
                'buttons' => [
                    'cancel' => 'Cancel',
                    'send_message' => 'Send'
                ],
                'validation_messages' => [
                    'required' => 'Required field.',
                    'email' => 'Wrong email format.'
                ]
            ],
            'message_success' => [
                'header' => 'Message',
                'text' => 'Your message has been sent!',
                'button' => 'Close'
            ]
        ]
    ],
];
