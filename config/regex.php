<?php
return [
    'persian_characters' => '/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی ً ٌ ٍ ـ ۀ ّ ِ ُ َ ة ؤ إ أ ء \s]+$/u',
    'persian_mobile' => '/^09\d{9}$/u',
    'password' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/u',
];
