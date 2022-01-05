<?php

function print_lang($lang, $stringinEnglish){


$language = ['sv_SE'=>[
                'dishes' => 'maträtter',
                'dish'  => 'maträtt',
                'tablespoon' => 'matsked',
                'teaspoon'  =>  'tesked',
                'here' => 'här'
            ],
            'en_US'=>[


            ]

            ];
   return $language[$lang][$stringinEnglish];
}
 ?>
