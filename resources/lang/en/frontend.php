<?php

return [
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
            ]
        ]
    ],
];
