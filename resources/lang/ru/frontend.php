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
            ]
        ]
    ],
];
