<?php

return [
    'title' => 'ХЮГГЕ` dent',
    'navigation_and_sections' => [
        'home' => 'Головна',
        'about_us' => 'Про нас',
        'results' => 'Результаты работы',
        'for_patients' => 'Пацієнтам',
        'how_can_we_help_you' => 'Чим ми можемо Вам допомогти?',
        'our_team' => 'Наша команда'
    ],
    'slider' => [
        'buttons' => [
            'make_an_appointment' => 'Записатись на прийом',
            'contact_us' => "Зв'язатися з нами"
        ],
        'modals' => [
            'appointment_form' => [
                'header' => 'Запис на прийом',
                'fields' => [
                    'fio' => 'П.І.Б.',
                    'phone' => 'Номер телефону',
                    'message' => 'Повідомлення'
                ],
                'buttons' => [
                    'cancel' => 'Скасувати',
                    'make_an_appointment' => 'Записатись'
                ],
                'validation_messages' => [
                    'required' => 'Це поле має бути заповнене.',
                    'phone_number_format' => 'Невірний формат номера телефону.'
                ]
            ],
            'appointment_success' => [
                'header' => 'Запис на прийом',
                'text' => 'Вашу заявку прийнято!',
                'button' => 'Закрити'
            ],
            'message_form' => [
                'header' => 'Повідомлення',
                'fields' => [
                    'fio' => 'П.І.Б.',
                    'email' => 'E-mail',
                    'theme' => 'Тема',
                    'message' => 'Повідомлення'
                ],
                'buttons' => [
                    'cancel' => 'Скасувати',
                    'send_message' => 'Надіслати'
                ],
                'validation_messages' => [
                    'required' => 'Це поле має бути заповнене.',
                    'email' => 'Невірний формат адреси пошти.'
                ]
            ],
            'message_success' => [
                'header' => 'Повідомлення',
                'text' => 'Ваше повідомлення надіслано!',
                'button' => 'Закрити'
            ]
        ]
    ],
];
