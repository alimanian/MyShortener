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

    'accepted' => ':attribute باید پذیرفته شده باشد.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'آدرس :attribute معتبر نیست',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha' => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash' => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num' => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array' => ':attribute باید آرایه باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean' => 'فیلد :attribute فقط می‌تواند صحیح و یا غلط باشد',
    'confirmed' => ':attribute با فیلد تکرار مطابقت ندارد.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_equals' => ':attribute با تاریخ :date مطابقت ندارد.',
    'date_format' => ':attribute با الگوی :format مطاقبت ندارد.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct' => 'فیلد :attribute تکراری است.',
    'email' => ':attribute باید یک ایمیل معتبر باشد.',
    'ends_with' => ':attribute باید با یکی از مقادیر :values تمام شود.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => ':attribute وارد شده، معتبر نیست.',
    'file' => ':attribute باید یک فایل باشد',
    'filled' => 'فیلد :attribute الزامی است',
    'gt' => [
        'numeric' => ':attribute باید بزرگتر از :value باشد',
        'file' => ':attribute باید بزرگتر از :value کیلوبایت باشد',
        'string' => ':attribute باید بزرگتر از :value کاراکتر باشد',
        'array' => ':attribute باید بزرگتر از :value آیتم باشد',
    ],
    'gte' => [
        'numeric' => ':attribute باید بزرگتر یا مساوی از :value باشد',
        'file' => ':attribute باید بزرگتر یا مساوی از :value کیلوبایت باشد',
        'string' => ':attribute باید بزرگتر یا مساوی از :value کاراکتر باشد',
        'array' => ':attribute باید بزرگتر یا مساوی از :value آیتم باشد',
    ],
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute وارد شده، معتبر نیست.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => ':attribute باید عدد صحیح باشد.',
    'ip' => ':attribute باید IP معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6' => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'json' => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'lt' => [
        'numeric' => ':attribute باید کوچکتر از :value باشد',
        'file' => ':attribute باید کوچکتر از :value کیلوبایت باشد',
        'string' => ':attribute باید کوچکتر از :value کاراکتر باشد',
        'array' => ':attribute باید کوچکتر از :value آیتم باشد',
    ],
    'lte' => [
        'numeric' => ':attribute باید کوچکتر یا مساوی از :value باشد',
        'file' => ':attribute باید کوچکتر یا مساوی از :value کیلوبایت باشد',
        'string' => ':attribute باید کوچکتر یا مساوی از :value کاراکتر باشد',
        'array' => ':attribute باید کوچکتر یا مساوی از :value آیتم باشد',
    ],
    'max' => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array' => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes' => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes' => ':attribute باید یکی از فرمت های :values باشد.',
    'min' => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file' => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string' => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array' => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'multiple_of' => ':attribute باید مضربی از :value باشد.',
    'not_in' => ':attribute وارد شده، معتبر نیست.',
    'not_regex' => 'فرمت :attribute معتبر نیست.',
    'numeric' => ':attribute باید عدد باشد.',
    'password' => 'رمز عبور اشتباه است.',
    'present' => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'فرمت :attribute معتبر نیست.',
    'required' => ':attribute الزامی است.',
    'required_array_keys' => ':attribute باید برابر با یکی از مقادیر: :values باشد.',
    'required_if' => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless' => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with' => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all' => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without' => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same' => ':attribute و :other باید مانند هم باشند.',
    'size' => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file' => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string' => ':attribute باید برابر با :size کاراکتر باشد.',
        'array' => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'starts_with' => ':attribute باید با یکی از مقادیر :values شروع شود.',
    'string' => 'فیلد :attribute باید متن باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique' => ':attribute قبلا انتخاب شده است.',
    'uploaded' => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url' => 'فرمت آدرس :attribute اشتباه است.',
    'uuid' => ':attribute باید یک UUID معتبر باشد.',

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
        'userArr.first_name' => [
            'regex' => ':attribute باید به صورت فارسی باشد.',
        ],
        'userArr.last_name' => [
            'regex' => ':attribute باید به صورت فارسی باشد.',
        ],
        'userArr.phone_number' => [
            'regex' => ':attribute باید ایرانی و معتبر باشد.',
        ],
        'userArr.password' => [
            'regex' => ':attribute باید شامل حرف کوچک، بزرگ و عدد باشد.',
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
        'userArr.first_name' => 'نام',
        'userArr.last_name' => 'نام خانوادگی',
        'userArr.phone_number' => 'شماره موبایل',
        'userArr.password' => 'رمز عبور',
        'userArr.verify_code' => 'کد تأیید',
        '' => '',
    ],

    'The verification code is incorrect. You have :count more times to enter the correct code.'
    => 'کد تأیید اشتباه است. شما برای وارد کردن کد صحیح :count بار دیگر فرصت دارید. ',
    'Username or password is incorrect.' => 'نام کاربری یا رمزعبور اشتباه است.',
    '' => '',
];
