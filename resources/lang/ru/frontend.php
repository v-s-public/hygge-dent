<?php

return [
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
