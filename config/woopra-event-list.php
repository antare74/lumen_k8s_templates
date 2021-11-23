<?php

return [
    [
        'platform' => 'importir.com',
        'event' => [
            [
                'event_name' => 'product_view',
                'event_data' => [
                    'product_id',
                    'product_name',
                    'product_link',
                    'category',
                    'sub_category',
                    'product_price',
                    'image',
                    'flag'
                ]
            ],
            [
                'event_name' => 'refund_transaction',
                'event_data' => [
                    'refund_number',
                    'created_by',
                    'invoice_no',
                    'transaction_type',
                    'amount',
                    'reason_refund'
                ]
            ],
            [
                'event_name' => 'product_add_to_cart',
                'event_data' => [
                    'product_name',
                    'product_id',
                    'product_link',
                    'product_category_en',
                    'product_category_ori',
                    'product_price',
                    'product_quantity',
                    'amounts'
                ]
            ],
            [
                'event_name' => 'membership_payment',
                'event_data' => [
                    'total_paid',
                    'paid_at',
                    'currency',
                    'package'
                ]
            ],
            [
                'event_name' => 'product_search',
                'event_data' => [
                    'keyword',
                    'total_search',
                    'membership_package'
                ]
            ],
            [
                'event_name' => 'product_checkout',
                'event_data' => [
                    'product_name',
                    'product_id',
                    'product_link',
                    'product_category_en',
                    'product_category_ori',
                    'product_price',
                    'product_quantity',
                    'grand_total',
                    'promo_code'
                ]
            ],
            [
                'event_name' => 'identify_user_login',
                'event_data' => [
                    'email',
                    'member_package',
                    'country_code',
                    'city'
                ]
            ],
            [
                'event_name' => 'membership_register',
                'event_data' => [
                    'amount',
                    'currency',
                    'package',
                ]
            ],
            [
                'event_name' => 'product_paid',
                'event_data' => [
                    'product_name',
                    'product_id',
                    'product_link',
                    'product_category_ori',
                    'product_category_en',
                    'product_price',
                    'product_quantity',
                    'product_quantity',
                    'order_id',
                    'bill_id',
                    'paid_amount',
                    'currency'
                ]
            ],
            [
                'event_name' => 'payment',
                'event_data' => [
                    'amount',
                    'currency'
                ]
            ],
            [
                'event_name' => 'subscription_update',
                'event_data' => [
                    'old_acv',
                    'new_acv',
                    'delta'
                ]
            ],

        ]
    ]
];
