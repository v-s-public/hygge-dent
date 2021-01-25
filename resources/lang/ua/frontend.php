<?php

return [
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
            ]
        ]
    ],
];
