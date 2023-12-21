<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => 'يجب قبول الحقل :attribute',
    'accepted_if' => 'attribute: must be accepted when :other is :value.',
    'active_url' => 'الحقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على الحقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'الحقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي الحقل :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي الحقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون الحقل :attribute ًمصفوفة',
    'before' => 'يجب على الحقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'الحقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة الحقل :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'current_password' => ' كلمة مرور خاطئة.',
    'date' => 'الحقل :attribute ليس تاريخًا صحيحًا',
    'date_equals' => ':attribute يجب أن يحتوي تاؤيخ مساوي :date.',
    'date_format' => 'لا يتوافق الحقل :attribute مع الشكل :format.',
    'declined' => ':attribute يجب أن ترفض.',
    'declined_if' => ':attribute يجب أن تكون مرفوضة عندما :other تكون :value.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي الحقل :attribute على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي الحقل :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'ends_with' => ':attribute يجب أن ينتهي ب: :values.',
    'enum' => 'المحدد :attribute الحقل خاطئ.',
    'exists' => 'الحقل :attribute غير موجود',
    'file' => 'الـ :attribute يجب أن يكون من ملفا.',
    'filled' => 'الحقل :attribute إجباري',
    'gt' => [
        'array' => 'attribute: يجب أن تملك عدد  عناصر أكبر :value عناصر.',
        'file' => 'attribute: must be greater than :value kilobytes.',
        'numeric' => 'attribute: must be greater than :value.',
        'string' => 'attribute: must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'attribute: يجب أن تملك :value عناصر أو أكثر.',
        'file' => 'attribute: يجب أن يكون  أكبر أو يساوي :value كيلوبايت.',
        'numeric' => 'attribute: يجب أن يكون أكبر أو مساوي :value.',
        'string' => 'attribute: يجب أن يكون أكبر أو مساوي :value characters.',
    ],
    'image' => 'يجب أن يكون الحقل صورة :attribute',
    'in' => 'الحقل ضمن :attributeٍ',
    'in_array' => 'الحقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون الحقل :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون الحقل :attribute عنوان IP ذا بُنية صحيحة',
    'ipv4' => 'يجب أن يكون الحقل :attribute عنوان IPv4 ذا بنية صحيحة.',
    'ipv6' => 'يجب أن يكون الحقل :attribute عنوان IPv6 ذا بنية صحيحة.',
    'json' => 'يجب أن يكون الحقل :attribute نصا من نوع JSON.',
    'lt' => [
        'array' => 'attribute: يجب أن تحتوي أقل  :value عناصر.',
        'file' => 'attribute: يجي أن يكون أصغر أو يساوي ل :value كيلوبايت.',
        'numeric' => 'attribute: يجي أن يكون أصغر أو يساوي ل :value.',
        'string' => 'attribute:  يجي أن يكون أصغر أو يساوي ل :value المحارف.',
    ],
    'lte' => [
        'array' => 'attribute: يجب أن تحتوي أقل  :value عناصر.',
        'file' => 'attribute: يجي أن يكون أصغر أو يساوي ل :value كيلوبايت.',
        'numeric' => 'attribute: يجي أن يكون أصغر أو يساوي ل :value.',
        'string' => 'attribute:  يجي أن يكون أصغر أو يساوي ل :value المحارف.',
    ],
    'mac_address' => 'attribute: يجب أن يكون عنوان فيزيائي صحيح.',
    'max' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أصغر لـ :max.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول نص :attribute :max حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي الحقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية أو أكبر لـ :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول نص :attribute على الأقل :min حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي الحقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'multiple_of' => 'attribute:  الحقل يجب ان يكون متعددمن   :value.',
    'not_in' => 'الحقل :attribute لاغٍ',
    'not_regex' => ' :attribute التنسيق خاطئ.',
    'numeric' => 'يجب على الحقل :attribute أن يكون رقمًا',
    'present' => 'يجب تقديم الحقل :attribute',
    'prohibited' => 'attribute: الحقل محظور.',
    'prohibited_if' => 'attribute: الحقل محظور  :other is :value.',
    'prohibited_unless' => 'attribute: الحقل محظر حتى :other في :values.',
    'prohibits' => 'attribute: الحقل محظورة :other  من التواجد.',
    'regex' => 'صيغة الحقل :attribute .غير صحيحة',
    'required' => '.الحقل :attribute مطلوب',
    'required_array_keys' => 'attribute: field must contain entries for: :values.',
    'required_if' => 'الحقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'الحقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'الحقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all' => 'الحقل :attribute مطلوب إذا توفّر :values.',
    'required_without' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق الحقل :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array' => 'يجب أن يحتوي الحقل :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'starts_with' => ' :attribute يجب أن يبدأ بواحد من following: :values.',
    'string' => 'يجب أن يكون الحقل :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة الحقل :attribute مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'url' => 'صيغة الرابط :attribute غير صحيحة',
    'uuid' => ' attribute: يجب أن يكون رقم غير مستخدم من قبل.',
    'exists_soft' => ' المعرف :attribute غير موجود',
    'has_relations' => 'هنالك ارتباطات تمنع إتمام العملية',
    'not_allowed_already_processed' => 'لا يمكن تعديل طلب معالج مسبقاً',
    'location_already_exists' => 'الموقع موجود مسبقاً',
    'email_unique' => 'قيمة الحقل البريد الإلكتروني مستخدمة من قبل',

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
        'guard_name' => [
            'unique' => ' قيمة الزوج الاسم واسم الحماية مستخدم من قبل',
        ],
    ],

    'attributes' => [
        'email'=>"البريد الالكتروني",
        'password' => 'كلمة المرور',
        'mobile' => 'رقم المحمول',
        'phone' => 'رقم الهاتف',
        'user_id' => 'المستخدم',
        'owner_id' => 'المالك',
        'general_code_id' => 'نوع العقار',
        'address_id'=>'العنوان',
        'estate_no'=>'رقم العقار',
        'street_ar'=>'اسم الشارع بالعربية',
        'street_en'=>'اسم الشارع بالانكليزية',
        'longitude'=>'نقاط الطول',
        'latitude'=>'نقاط العرض',
        'subscription_type_id'=>'نوع الاشتراك',
        'subscription_general_code_id'=>'حالة الاشتراك',
        'first_name' => 'الاسم',
        'last_name' => 'الكنية',
        'father_name' => 'اسم الأب',
        'is_active'=>'مفعل؟',
        'name_en'=>'الاسم بالانكليزية',
        'name_ar'=> 'الاسم بالعربية',
        'device_count' => 'عدد الأجهزة',
        'period_in_month' => 'صلاحيّة الاشتراك بالأشهر',
        'amount'=>'السعر',
        'identity'=>'نوع وثيقة المُعرِّف الشخصي',
        'identity_no'=>'رقم وثيقة المُعرِّف الشخصي',
        'notes_en'=>'ملاحظات بالانكليزية',
        'notes_ar'=>'ملاحظات بالعربية',
        'activation_code'=>'رمز التفعيل',
        'description_en'=>'الوصف بالانكليزية',
        'description_ar'=>'الوصف بالعربية',
        'level'=>'مستوى الترميز العام',
        'parent_id'=>'الأب التابع له',
        'bank_id'=>'اسم البنك',
        'value'=>'رسم الاشتراك',
        'payment_date'=>'تاريخ الدفع',
        'receipt_no'=>'رقم الإيصال',
        'account'=>'رقم البنك',
        'roles'=>'الأدوار',
        'real_estate_id' => 'العقار',
        'room_type_id'=> ' نوع الغرفة',
        'room_id'=>'الغرفة',
        'device_type_id'=>'نوع الجهاز',
        'device_number'=>'رقم الجهاز',
        'device_brand_id'=>'ماركة الجهاز'

    ],
];
