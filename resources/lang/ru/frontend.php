<?php

return [
    'title' => 'ХЮГГЕ` dent',
    'navigation_and_sections' => [
        'home' => 'Главная',
        'about_us' => 'О нас',
        'results' => 'Результаты работы',
        'for_patients' => 'Пациентам',
        'how_can_we_help_you' => 'Чем мы можем Вам помочь?',
        'our_team' => 'Наша команда'
    ],
    'slider' => [
        'buttons' => [
            'make_an_appointment' => 'Записаться на приём',
            'contact_us' => 'Связаться с нами'
        ],
        'modals' => [
            'appointment_form' => [
                'header' => 'Запись на приём',
                'fields' => [
                    'fio' => 'Ф.И.О.',
                    'phone' => 'Номер телефона',
                    'message' => 'Сообщение'
                ],
                'buttons' => [
                    'cancel' => 'Отмена',
                    'make_an_appointment' => 'Записаться'
                ],
                'validation_messages' => [
                    'required' => 'Это поле должно быть заполнено.',
                    'phone_number_format' => 'Неверный формат номера телефона.'
                ],
                'appointment_success' => [
                    'header' => 'Запись на приём',
                    'text' => 'Ваша заявка принята!',
                    'button' => 'Закрить'
                ]
            ],
            'message_form' => [
                'header' => 'Сообщение',
                'fields' => [
                    'fio' => 'Ф.И.О.',
                    'email' => 'E-mail',
                    'theme' => 'Тема',
                    'message' => 'Сообщение'
                ],
                'buttons' => [
                    'cancel' => 'Отменить',
                    'send_message' => 'Отправить'
                ],
                'validation_messages' => [
                    'required' => 'Это поле должно быть заполнено.',
                    'email' => 'Неверный формат адреса почты.'
                ]
            ],
            'message_success' => [
                'header' => 'Сообщение',
                'text' => 'Ваше Сообщение отправлено!',
                'button' => 'Закрыть'
            ]

        ]
    ],
];
