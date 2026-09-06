This file is a merged representation of a subset of the codebase, containing files not matching ignore patterns, combined into a single document by Repomix.

# File Summary

## Purpose
This file contains a packed representation of a subset of the repository's contents that is considered the most important context.
It is designed to be easily consumable by AI systems for analysis, code review,
or other automated processes.

## File Format
The content is organized as follows:
1. This summary section
2. Repository information
3. Directory structure
4. Repository files (if enabled)
5. Multiple file entries, each consisting of:
  a. A header with the file path (## File: path/to/file)
  b. The full contents of the file in a code block

## Usage Guidelines
- This file should be treated as read-only. Any changes should be made to the
  original repository files, not this packed version.
- When processing this file, use the file path to distinguish
  between different files in the repository.
- Be aware that this file may contain sensitive information. Handle it with
  the same level of security as you would the original repository.

## Notes
- Some files may have been excluded based on .gitignore rules and Repomix's configuration
- Binary files are not included in this packed representation. Please refer to the Repository Structure section for a complete list of file paths, including binary files
- Files matching these patterns are excluded: repomix-output.xml, repomix-output.md, repomix-migrations.md, database/data/assessments/**, database/database.sqlite, storage/**, composer.lock, package-lock.json, public/css/report-pdf.css
- Files matching patterns in .gitignore are excluded
- Files matching default ignore patterns are excluded
- Files are sorted by Git change count (files with more changes are at the bottom)

# Directory Structure
```
unit_01.php
unit_02.php
unit_03.php
unit_04.php
unit_05.php
unit_06.php
unit_07.php
unit_08.php
unit_09.php
unit_10.php
unit_11.php
unit_12.php
unit_13.php
```

# Files

## File: unit_01.php
```php
<?php

// بيانات الوحدة رقم 1: مقدمة في التسويق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 36 سؤال
// نسخة مصححة: تم تصحيح 6 أخطاء إملائية/طباعية فقط دون أي تغيير في الأسئلة أو الإجابات أو الشروحات
return [
    'unit_number' => 1,
    'title_ar' => 'مقدمة في التسويق',
    'order_index' => 1,
    'questions' => [
        [
            'original_number' => 1,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تساعد عملية البحث التسويقي التي تربط العملاء والجمهور بالشركات، على فهم ما يمكن عمله لمساعدة السوق الذي يفشل في تحقيق النمو والازدهار',
            'explanation_ar' => 'العبارة صحيحة، لأن (بحوث التسويق تربط العملاء بالشركة بهدف تحديد الفرص والمشكلات وتحسين القرارات التسويقية، وتحسين أداء السوق وفهم ما يمكن عمله لمساعدة السوق الذي يفشل في تحقيق النمو والازدهار) راجع الوحدة الأولى، مقدمة في التسويق، موضوع: بحوث التسويق، ص 21.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 2,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => '"يمكن تعريف جوهر التسويق بأنه بيع ما ننتجه."',
            'explanation_ar' => 'العبارة خاطئة، لأن جوهر التسويق هو إنتاج ما يمكن بيعه وتلبية احتياجات العملاء وليس "بيع ما ننتجه". راجع الواحدة الأولى: مقدمة في التسويق،ص:  8.',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 3,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن تعريف جوهر التسويق بأنه إنتاج ما يمكننا بيعه.',
            'explanation_ar' => 'العبارة صحيحة، لأن فلسفة التسويق الحديثة تقوم على إنتاج ما يمكن بيعه لتلبية رغبات السوق، وليس بيع ما تم إنتاجه". الوحدة 1 – مقدمة في التسويق، ص : 8.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 4,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من النقاط التالية هي أجزاء من العناصر الثمانية لتحليل السوق؟',
            'explanation_ar' => 'يشمل تحليل السوق ثمانية عناصر هي: حجم السوق، واتجاهات السوق، ومعدل نمو السوق وقطاعات السوق وربحية السوق وهيكل تكلفة الصناعة وقنوات التوزيع وعوامل النجاح. الوحدة 1، مقدمة في السوق، موضوع: تحليل السوق، ص 17.',
            'is_multi_correct' => true,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) حجم السوق',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) قنوات السوق',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) عوامل الفشل',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) ربحية السوق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 5,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'ما يلي من عوامل النجاح التي يجب أن تتوفر في الشركة من أجل أن تكون ناجحة في مجال محدد: 1-اسم معروف، 2- ولاء العملاء.',
            'explanation_ar' => 'العبارة صحيحة، حيث تشمل عوامل النجاح التي يجب أن تتوفر في الشركة من أجل أن تكون ناجحة في مجال محدد: 1-اسم معروف، 2- ولاء العملاء، 3- قناة التوزيع، الوحدة الأولى: مقدمة في التسويق، درس عوامل النجاح : ص 21.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 6,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يتمثل جوهر التسويق في ثلاثة أنشطة رئيسية هي: تلبية احتياجات ورغبات العملاء، والتعاون الواسع في مختلف مجالات الأعمال، وفهم العملاء وإيجاد سبل لتوفير المنتجات أو الخدمات التي تلبي قيمهم.',
            'explanation_ar' => 'العبارة صحيحة حيث أن جوهر التسويق يتمحور حول تلبية احتياجات العملاء، وفهمهم، والتعاون داخل الأعمال لتقديم قيمة لهم.، راجع الوحدة الأولى مقدمة في التسويق : ، درس: مقدمة في التسويق، ص: 9.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 7,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'ما يلي هو أحد عوامل النجاح التي يجب أن تتوفر في الشركة من أجل أن تكون ناجحة في مجال محدد: قناة التوزيع.',
            'explanation_ar' => 'العبارة صحيحة، حيث تشمل عوامل النجاح التي يجب أن تتوفر في الشركة من أجل أن تكون ناجحة في مجال محدد: 1-اسم معروف، 2- ولاء العملاء، 3- قناة التوزيع، الوحدة الأولى: مقدمة في التسويق، درس عوامل النجاح : ص 21.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 8,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'إن عملية البحث التسويقي التي تربط بين العملاء والجمهور هي محاولة لفهم سبب الأداء الجيد أو السيء لسوق معين.',
            'explanation_ar' => 'العبارة صحيحة، حيث أن للبحث التسويقي يربط العملاء بالشركة ويساعد على فهم أسباب الأداء الجيد أو الضعيف للسوق. الوحدة 1: مقدمة في التسويق، ص 8.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 9,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من النقاط التالية تعتبر من العناصر الثمانية الأساسية للتسويق؟',
            'explanation_ar' => 'التفسير: كل هذه العناصر بجانب عناصر: التخزين، الجودة ، والمالية  تعتبر العناصر الثمانية الأساسية للتسويق ، الوحدة الأولى ، درس مكونات التسويق، ص : 11.',
            'is_multi_correct' => true,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'أ) وسيلة النقل.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب ) التسليم.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) الشراء.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) البيع.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'هـ) التحديات.',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 10,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'قناة التوزيع لا تعتبر أحد عوامل النجاح التي يجب أن تتوفر في الشركة من أجل أن تكون ناجحة في مجال محدد.',
            'explanation_ar' => 'العبارة خاطئة: حيث أن قناة التوزيع تعد واحدة من عوامل النجاح الرئيسية للشركة إلى جانب الاسم المعروف وولاء العملاء.، راجع الوحدة 1: مقدمة في التسويق، درس عوامل النجاح، ص 20.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 11,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الطرق التالية تستعمل لجمع المعلومات عن العادات الاستهلاكية أو الأدوات التسويقية؟',
            'explanation_ar' => 'التفسير: تعد الاستبيانات والاستطلاعات (Surveys) هي الأداة الأساسية والمباشرة في أبحاث السوق (Market Research) المخصصة لجمع معلومات من المستهلكين حول عاداتهم الاستهلاكية، تفضيلاتهم، وسلوكهم الشرائي',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'أ) اختبار الفكرة.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الاستبانات والاستطلاعية السرية.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تتبع الإعلانات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) العلامة التجارية.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 12,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التسويق يتغير باستمرار لأن احتياجات العملاء ورغباتهم في تغير مستمر.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 13,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'عندما تفكر في سوق معين، يجب تقييم الجاذبية المستقبلية فقط لهذا السوق.',
            'explanation_ar' => 'العبارة خاطئة، حيث أن تحليل السوق يهدف إلى تقييم مدى جاذبية سوق محدد، حيث يتضمن هذا التقييم النظر في الجاذبية ( الحالية والمستقبلية)   للسوق مع التركيز على الفرص المتاحة وكذلك المخاطر والتهديدات المحتملة، ونقاط القوة والضعف في الشركة، راجع، الوحدة الأولى، مقدمة في التسويق، درس تحليل السوق، ص:17.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 14,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من النقاط التالية هي أجزاء من العناصر الثمانية لتحليل السوق؟',
            'explanation_ar' => 'تتضمن العناصر الثمانية الأساسية لتحليل السوق على: حجم السوق، معدل نمو السوق، ربحية السوق، قنوات التوزبع، تحديد الاحتياجات التدريبية، التنوع، هيكل تكلفة الصناعة، عوامل النجاح. راجع الوحدة الأولى، مقدمة في التسويق، درس تحليل السوق، ص : 17.',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'أ) قنوات التوزيع',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) عوامل الفشل.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) كل ما سبق ذكره أعلاه.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 15,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي التعريفات التالية يعبّر عن التسويق وفق منهج CBP؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'أ) عملية تشمل تطوير المنتجات والخدمات وتحديد الأسعار والترويج والتوزيع',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) عملية تصنيع المنتجات في المصنع فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تحصيل المدفوعات من العملاء',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) إدارة الموارد البشرية للشركة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 16,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'عناصر المزيج التسويقي (4Ps) هي:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'أ) المنتج، السعر، المكان، الترويج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) المنتج، الربح، الموظفون، الترويج',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) السعر، الجودة، الكمية، الوقت',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الإنتاج، التوزيع، المحاسبة، البيع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 17,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أبحاث السوق التي تُجمع مباشرة من المصدر (مثل الاستبيانات والمقابلات) تُسمى:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'أ) بيانات أولية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) بيانات ثانوية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج ) بيانات تاريخية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) بيانات ثابتة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 18,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'البيانات الثانوية في أبحاث السوق هي:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'أ) بيانات جُمعت مسبقاً من مصادر موجودة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) بيانات تُجمع لأول مرة من العملاء مباشرة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) بيانات لا يمكن استخدامها',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) بيانات سرية للشركة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 19,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'من المكونات الأساسية للتسويق: الشراء، البيع، النقل، التخزين، وإدارة المخاطر (التحديات).',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 20,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يُعد التسويق عملية تهدف إلى بناء الوعي بالمنتجات والخدمات ومزاياها، والمساعدة في إيصالها من المنتج إلى المستهلك.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ التسويق كعملية متكاملة تهدف إلى تعريف العملاء بالمنتجات والخدمات وقيمتها، والمساهمة في وصولها إلى المستهلك.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 21,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من الأهداف التي يحققها إطار التسويق؟',
            'explanation_ar' => 'التفسير: تحديد الجمهور المستهدف أحد العناصر التي يركز عليها إطار التسويق، إلى جانب تحديد المنتجات، واختيار طرق الترويج، ووضع خطة لزيادة الحصة السوقية، وبناء العلاقات مع العملاء. الوحدة الأولى، ص 15',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد الجمهور المستهدف',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) تحديد الهيكل المالي للشركة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تحديد رواتب الموظفين',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحديد سياسات الموارد البشرية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 22,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يساعد إطار التسويق الشركة على اختيار طرق الترويج المناسبة للمنتجات التي تقوم بتسويقها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ إذ يتضمن إطار التسويق اختيار طرق الترويج المناسبة ضمن مجموعة من الخطوات الأساسية لتخطيط النشاط التسويقي، الوحدة الأولى، ص 15',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 23,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد أحد أهداف إطار التسويق ؟',
            'explanation_ar' => 'التفسير: وضع خطة لزيادة الحصة السوقية ورد ضمن العناصر الأساسية لإطار التسويق، إلى جانب تحديد المنتجات والجمهور وطرق الترويج والعلاقات مع العملاء. الوحدة الأولى، ص 15',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد أسعار أسهم الشركة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) وضع خطة لزيادة حصتك في السوق',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تحديد ساعات العمل اليومية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحديد الهيكل التنظيمي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 24,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يساعد الشركات على تحديد استراتيجياتها الحالية والمستقبلية وتطوير خططها وفقًا لظروف السوق.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ تحليل السوق يساعد الشركات على تحديد استراتيجياتها الحالية والمستقبلية، وعلى اتخاذ قرارات مرتبطة بالسوق.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 25,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العناصر التالية يرتبط بتحديد مدى اتساع السوق وعدد العملاء أو المبيعات الممكنة فيه؟',
            'explanation_ar' => 'التفسير: حجم السوق يركز على تقدير حجم السوق والفرص المتاحة فيه، وهو أحد العناصر الأساسية الثمانية لتحليل السوق. الوحدة الأولى، ص 17.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'أ) حجم السوق',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) ربحية السوق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) هيكل تكلفة الصناعة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عوامل النجاح',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 26,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يُستخدم معدل نمو السوق لتحديد مدى سرعة توسع السوق، ويساعد ذلك في اتخاذ قرارات تتعلق باستراتيجية السوق.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ فمعدل نمو السوق أحد العناصر الأساسية لتحليل السوق، ويساعد في فهم اتجاه السوق ومدى نموه وتحديد الاستراتيجيات المناسبة.، الوحدة الأولى، ص 17.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 27,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العناصر التالية يُستخدم لتقييم مقدار الأرباح الممكن تحقيقها في سوق معين؟',
            'explanation_ar' => 'التفسير: ربحية السوق هي أحد العناصر الأساسية لتحليل السوق، وتركز على مدى إمكانية تحقيق الأرباح من النشاط في السوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'أ) حجم السوق',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ربحية السوق',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) قنوات التوزيع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) التنوع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 28,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'قنوات التوزيع تمثل الطرق والمسارات التي يتم من خلالها نقل المنتجات والخدمات من المنتج أو المورد إلى العملاء.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ تعتبر قنوات التوزيع الوسائل والمسارات المستخدمة لإيصال السلع والخدمات من مصدرها إلى العملاء.، الوحدة الأولى، ص 19.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 29,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من عناصر تحليل السوق الثمانية؟',
            'explanation_ar' => 'تتضمن العناصر الثمانية الأساسية لتحليل السوق على: حجم السوق، معدل نمو السوق، ربحية السوق، قنوات التوزبع، تحديد الاحتياجات التدريبية، التنوع، هيكل تكلفة الصناعة، عوامل النجاح. راجع الوحدة الأولى، مقدمة في التسويق، درس تحليل السوق، ص : 17.',
            'is_multi_correct' => true,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد الاحتياجات التدريبية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) الإعلان',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) التنوع',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) العلاقات العامة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 30,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يُعد التنوع من العناصر الأساسية المستخدمة في تحليل السوق.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ فالتنوع ضمن العناصر الثمانية الأساسية لتحليل السوق.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 31,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من عناصر تحليل السوق الثمانية ؟',
            'explanation_ar' => 'التفسير: هيكل تكلفة الصناعة أحد العناصر الثمانية الأساسية لتحليل السوق، إلى جانب حجم السوق، ومعدل نمو السوق، وربحية السوق، وقنوات التوزيع، والتنوع، وعوامل النجاح وغيرها.',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'أ) خدمة العملاء',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الإعلان',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) هيكل تكلفة الصناعة',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) العلاقات العامة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 32,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تختلف عوامل النجاح باختلاف الصناعات، لذا ينبغي على الشركة التركيز فقط على عوامل النجاح الخاصة بمجال عملها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ تختلف عوامل النجاح من صناعة إلى أخرى، ولذلك يجب معرفة عوامل النجاح الحالية والمستقبلية.',
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 33,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الهدف الأساسي من بحوث التسويق؟',
            'explanation_ar' => 'التفسير: تربط بحوث التسويق بين المستهلكين والعملاء والجمهور من جهة، والشركات والمنتجات أو الخدمات التي تقدمها من جهة أخرى، بهدف الحصول على معلومات تساعد في فهم السوق والعملاء واتخاذ القرارات التسويقية.',
            'is_multi_correct' => false,
            'order_index' => 33,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد رواتب العاملين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ربط المستهلكين والعملاء بالشركات والمنتجات أو الخدمات التي تقدمها',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تحديد الهيكل التنظيمي للشركة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحديد تكاليف الإنتاج فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 34,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تساعد بحوث التسويق الشركات في فهم احتياجات العملاء وتوجهاتهم، وتقييم مدى نجاح حملاتها التسويقية أو فشلها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ توفر بحوث التسويق معلومات عن العملاء والسوق، وتساعد على فهم احتياجاتهم ورغباتهم واتجاهاتهم، كما يمكن استخدامها لمعرفة مدى نجاح الحملات التسويقية الحالية أو فشلها.',
            'is_multi_correct' => false,
            'order_index' => 34,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 35,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يُعد معدل نمو السوق أحد العناصر الأساسية التي تؤخذ في الاعتبار عند تحليل السوق.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن معدل نمو السوق أحد العناصر الثمانية لتحليل السوق، إلى جانب حجم السوق واتجاهاته وقطاعات السوق وربحية السوق وغيرها.',
            'is_multi_correct' => false,
            'order_index' => 35,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 36,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي ممّا يلي يُعدّ من عوامل النجاح الأساسيّة التي ينبغي توفّرها في الشركة؟',
            'explanation_ar' => 'التفسير: من عوامل النجاح: الاسم المعروف، وولاء العملاء، وقناة التوزيع.',
            'is_multi_correct' => true,
            'order_index' => 36,
            'options' => [
                [
                    'option_text_ar' => 'أ) انخفاض عدد الموظفين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ولاء العملاء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) زيادة مساحة المكاتب',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) قنوات التوزيع',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
    ],
];
```

## File: unit_02.php
```php
<?php

// بيانات الوحدة رقم 2: سلوك المستهلك
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 31 سؤال
// نسخة مصححة: تم إصلاح خطأ الإجابة في تنسيق السؤال 37 (قوس ناقص + خيارات مكررة زائدة)
// بالإضافة إلى تصحيحات إملائية/تنسيقية بسيطة (مسافات مزدوجة، فواصل ونقاط مكررة، رقم سؤال زائد داخل نص التفسير)
return [
    'unit_number' => 2,
    'title_ar' => 'سلوك المستهلك',
    'order_index' => 2,
    'questions' => [
        [
            'original_number' => 37,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'حدد المراحل الخمس لعملية اتخاذ المستهلك لقرار الشراء.',
            'explanation_ar' => 'تعتبر المراحل الخمس لعملية اتخاذ قرار الشراء هي (بالترتيب): 1) إدراك وجود المشكلة، 2) البحث عن المعلومات، 3) تقييم البدائل، 4) قرار الشراء، 5) تقييم المشتريات (تقييم ما بعد الشراء). راجع الوحدة الثانية: سلوك المستهلك، موضوع قرار شراء المستهلك، ص 31.',
            'is_multi_correct' => true,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'أ) إدراك المعلومات',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) قرار الشراء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقييم المعلومات',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) إدراك وجود المشكلة',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'هـ) تقييم البدائل',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'و) البحث عن المعلومات',
                    'order_index' => 6,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ز) تقييم المشتريات',
                    'order_index' => 7,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 38,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمثل إحدى مراحل قرار شراء المستهلك؟',
            'explanation_ar' => 'التفسير: يمر قرار شراء المستهلك بخمس مراحل، منها البحث عن المعلومات بعد تحديد المشكلة/الحاجة، ثم تقييم البدائل واتخاذ قرار الشراء وتقييم ما بعد الشراء. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد الحصة السوقية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) البحث عن المعلومات',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تحديد سعر المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحليل المنافسين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 39,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل الآتية يؤثر في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: تصنف عوامل شراء المستهلك إلى عوامل رئيسية، ومن بينها العوامل الثقافية، والتي تشمل الثقافة، والثقافات الفرعية، والطبقة الاجتماعية. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 36–37.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'أ) العوامل الثقافية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) العوامل المحاسبية فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) العوامل الإنتاجية فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) العوامل التكنولوجية فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 40,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أيّ من العوامل التالية يُعدّ من العوامل الاجتماعية المؤثرة في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: تشمل العوامل الاجتماعية الجماعات المرجعية، والأسرة، والأدوار والمكانة الاجتماعية. أما العمر والمهنة والشخصية فتندرج ضمن العوامل الشخصية. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 37.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) العمر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المهنة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الجماعات المرجعية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الشخصية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 41,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'في أي مرحلة من مراحل قرار الشراء يقوم المستهلك بمقارنة الحلول الممكنة بناءً على معايير معينة؟',
            'explanation_ar' => 'التفسير: بعد أن يبحث المستهلك عن المعلومات، يقوم بتقييم البدائل المتاحة ومقارنتها بناءً على معايير تساعده في اختيار البديل الأنسب. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد المشكلة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) البحث عن المعلومات',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تقييم البدائل',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) قرار الشراء',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 42,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أيّ من العوامل التالية يُعدّ من العوامل الشخصية المؤثرة في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: تضمن العوامل الشخصية: العمر ومرحلة دورة الحياة، المهنة، الظروف الاقتصادية، نمط الحياة والشخصية. بينما الثقافة والطبقة الاجتماعية عوامل ثقافية، والجماعات المرجعية عامل اجتماعي. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 37.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) الثقافة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الجماعات المرجعية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) نمط الحياة',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الطبقة الاجتماعية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 43,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'سلوك المستهلك يقتصر فقط على عملية شراء المنتج ولا يشمل العوامل التي تؤثر على عملية الشراء.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن سلوك المستهلك لا يقتصر على عملية الشراء فقط، بل يتأثر بمجموعة من العوامل الثقافية والاجتماعية والشخصية والنفسية، كما يرتبط بالأسباب التي تدفع المستهلك إلى الشراء. راجع الوحدة الثالثة سلوك المستهلك، الصفحة: 30.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 44,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تبدأ عملية اتخاذ قرار شراء المستهلك بتحديد المشكلة أو الحاجة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن أولى مراحل قرار شراء المستهلك هي تحديد المشكلة؛ حيث يشعر المستهلك بوجود حاجة أو مشكلة يرغب في إشباعها أو حلها، ثم ينتقل إلى البحث عن المعلومات. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 45,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تُعد كل من الأسرة والجماعات المرجعية من العوامل الشخصية المؤثرة في سلوك المستهلك.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن الأسرة والجماعات المرجعية تندرجان ضمن العوامل الاجتماعية، وليستا من العوامل الشخصية. ومن العوامل الشخصية: العمر، والمهنة، والظروف الاقتصادية، ونمط الحياة والشخصية. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 46,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تُعدّ الثقافة، والثقافات الفرعية، والطبقة الاجتماعية من أبرز العوامل الشخصية المؤثرة في سلوك المستهلك.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، تُعدّ الثقافة، والثقافات الفرعية، والطبقة الاجتماعية من أبرز العوامل الثقافية، وليس الشخصية، حيث تشتمل على عوامل: الثقافة، والثقافات الفرعية، والطبقة الاجتماعية، وهذه العوامل تؤثر في عادات واتجاهات المستهلكين الشرائية. راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 47,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تتضمن العوامل الشخصية المؤثرة في سلوك المستهلك كلاً من: العمر، والدخل، والمهنة، ونمط الحياة، والشخصية.',
            'explanation_ar' => 'راجع الوحدة الثانية: سلوك المستهلك الصفحة: 31.',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 48,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أيُّ العوامل الآتية يُعد من العوامل النفسية المؤثرة في قرار الشراء؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'أ) الدوافع والإدراك والاتجاهات',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) نمط الحياة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الدخل',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الثقافة الفرعية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 49,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'حتى المستهلكون الذين يبدو أنهم لا يتبعون عملية شراء تقليدية يتبعون في الواقع نسخة معدّلة من نفس العملية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن عملية الشراء تمر بنفس المراحل الخمسة بداية من عملية تحديد المشكلة حتى تقييم عملية الشراء، الوحدة الثانية، ص33.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 50,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يساعد فهم سلوك المستهلك المسوّق بشكل أساسي على:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'أ) تصميم استراتيجيات تسويقية تلبّي احتياجات العملاء ودوافعهم',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) تقليل عدد الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) إلغاء الحاجة إلى المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) رفع الأسعار عشوائياً',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 51,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يهتم سلوك المستهلك بدراسة الأسباب التي تقف وراء قيام المستهلكين بعمليات الشراء والعوامل المؤثرة فيها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ حيث تساعد دراسة سلوك المستهلك على فهم الأسباب وراء قيام المستهلكين بعمليات الشراء، والعوامل التي تؤثر في سلوكهم.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 52,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمثل أحد الأهداف المهمة لفهم سلوك المستهلك من وجهة نظر المسوق؟',
            'explanation_ar' => 'التفسير: فهم العوامل التي تؤثر في قرارات المستهلك يساعد المسوق على تصميم استراتيجيات تسويقية أكثر ملاءمة لاحتياجات المستهلكين وسلوكهم الشرائي.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'أ) إلغاء عملية البحث عن المعلومات',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التعرف على العوامل التي تؤثر في قرارات الشراء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقليل عدد المنتجات في السوق',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) إلغاء المنافسة بين الشركات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 53,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يقتصر سلوك المستهلك على الأفراد فحسب، بل يمتد ليشمل قرارات الشراء التي تتخذها الجماعات أو الأسر.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يرتبط سلوك المستهلك بالمستهلكين وقراراتهم الشرائية، كما تتأثر هذه القرارات بعوامل اجتماعية مثل الأسرة والجماعات المرجعية.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 54,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد مثالًا على تأثير الأسرة في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: تعد الأسرة والجماعات المرجعية من العوامل الاجتماعية المؤثرة في سلوك المستهلك، ويمكن أن يكون لها دور في تشكيل قرارات الشراء.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'أ) تأثير موقع المصنع على الإنتاج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تأثير أفراد الأسرة في قرارات الشراء.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تأثير تكلفة التخزين على المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تأثير سعر السهم في السوق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 55,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'قرارات المستهلك لا تتأثر بعمره ومرحلة دورة حياته.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن العمر ومرحلة دورة الحياة من العوامل الشخصية التي تؤثر في سلوك المستهلك، لأن احتياجات الفرد وتفضيلاته قد تتغير باختلاف مرحلته العمرية والحياتية.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 56,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية يؤثر في سلوك المستهلك نتيجة لاختلاف قدرته وظروفه المالية؟',
            'explanation_ar' => 'التفسير: تعد الظروف الاقتصادية ضمن العوامل المؤثرة في سلوك المستهلك، حيث يمكن أن تؤثر القدرة والظروف المالية في قرارات الشراء.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'أ) الثقافة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الجماعات المرجعية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الظروف الاقتصادية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الطبقة الاجتماعية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 57,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'نمط حياة المستهلك لا يساعد المسوق على فهم المنتجات والخدمات التي قد تتناسب مع احتياجاته وتفضيلاته.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن نمط الحياة من العوامل الشخصية المؤثرة في سلوك المستهلك، ويمكن أن يساعد فهمه في تطوير استراتيجيات تسويقية أكثر ملاءمة للمستهلكين.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 58,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من العوامل الثقافية المؤثرة في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: تتضمن العوامل الثقافية الثقافة، والثقافات الفرعية، والطبقة الاجتماعية. وتؤثر هذه العوامل في عادات وتفضيلات واتجاهات المستهلكين.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'أ) الشخصية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الثقافة الفرعية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) الظروف الاقتصادية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) نمط الحياة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 59,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن تختلف عادات الشراء بين أفراد المجتمع نتيجة لاختلاف الثقافات الفرعية التي ينتمون إليها.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تمثل الثقافات الفرعية مجموعات فرعية داخل المجتمع، وقد تؤثر اختلافاتها في عادات واتجاهات الشراء لدى المستهلكين.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 60,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمثل عاملًا شخصيًا يمكن أن يؤثر في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: الشخصية من العوامل الشخصية المؤثرة في سلوك المستهلك، إلى جانب العمر ومرحلة دورة الحياة، والمهنة، والظروف الاقتصادية، ونمط الحياة.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'أ) الثقافة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الأسرة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الشخصية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الجماعات المرجعية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 61,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تؤثر خبرات المستهلك السابقة في سلوكه الشرائي، ويمكن أن تسهم هذه الخبرات في تشكيل قراراته المستقبلية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن التعلم يرتبط بما يكتسبه المستهلك من خبرات، وأن الخبرات السابقة يمكن أن تؤثر في السلوك الشرائي والقرارات اللاحقة.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 62,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الآتي يُعد من العوامل النفسية المؤثرة في سلوك المستهلك؟',
            'explanation_ar' => 'التفسير: التعلم أحد العوامل النفسية التي تؤثر في سلوك المستهلك، إلى جانب عوامل نفسية أخرى مثل الدوافع والإدراك والمعتقدات والاتجاهات.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'أ) التعلم',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) الطبقة الاجتماعية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الأسرة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المهنة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 63,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا علاقة لإدراك المستهلك بالطريقة التي يفسر بها المعلومات التي يتلقاها حول المنتجات أو العلامات التجارية.',
            'explanation_ar' => 'التفسير: العبارة خطأ؛ فالإدراك من العوامل النفسية المؤثرة في سلوك المستهلك، ويرتبط بكيفية تفسير المستهلك للمعلومات والمثيرات المحيطة به، وبالتالي يمكن أن يؤثر في قراراته الشرائية.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 64,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمكن أن يساعد المسوق على فهم سبب تفضيل مستهلك لعلامة تجارية على أخرى؟',
            'explanation_ar' => 'التفسير: ضرورة فهم العوامل التي تؤثر في سلوك المستهلك، لأن ذلك يساعد الشركات والمسوقين على فهم دوافع وتفضيلات العملاء واتخاذ قرارات تسويقية مناسبة.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'أ) عدد موظفي الشركة فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) دراسة العوامل المؤثرة في سلوك المستهلك',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) مساحة المصنع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عدد السيارات المستخدمة في التوزيع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 65,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من السمات المرتبطة بسلوك القرار المعقد؟',
            'explanation_ar' => 'التفسير: توضح المادة أن سلوك القرار المعقد قد يرتبط بالتكلفة، والمشتريات النادرة، والمخاطر العالية، وعدم الالتزام بالعلامة التجارية. الوحدة الثانية: سلوك المستهلك، أنواع سلوك المستهلك، ص34.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أ) شراء متكرر وروتيني دون الحاجة إلى تفكير كبير.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) شراء منتج منخفض التكلفة دون مقارنة البدائل.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) معرفة المستهلك بالمنتج والعلامة التجارية وعدم وجود مخاطر في الشراء.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) ارتفاع التكلفة أو وجود مخاطر عالية أو كون المشتريات نادرة.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 66,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'في السلوك الشرائي المحدود، قد يقوم المستهلك ببعض التفكير ومقارنة المنتجات المختلفة قبل اتخاذ قرار الشراء.',
            'explanation_ar' => 'التفسير: السلوك الشرائي المحدود يتضمن قدرًا من التفكير قبل الشراء، وقد يقوم المستهلك بمقارنة المنتجات المختلفة، بخلاف السلوك المبرمج الذي يكون أكثر روتينية وتكرارًا. الوحدة الثانية: سلوك المستهلك، أنواع سلوك المستهلك، ص33.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 67,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الحالات التالية تمثل السلوك الشرائي المبرمج؟',
            'explanation_ar' => 'التفسير: السلوك المبرمج يرتبط بعمليات الشراء الروتينية والمتكررة، والتي لا تتطلب قدرًا كبيرًا من التفكير قبل الشراء، الوحدة الثانية، ص33.',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'أ) شراء منتج مرتفع التكلفة بعد إجراء بحث ومقارنة واسعة.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) شراء منتج غير مألوف مع وجود مخاطر عالية في قرار الشراء.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) شراء متكرر وروتيني لمنتج لا يتطلب من المستهلك قدرًا كبيرًا من التفكير.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) مقارنة عدة علامات تجارية قبل اتخاذ قرار شراء معقد.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_03.php
```php
<?php

// بيانات الوحدة رقم 3: تطوير خطة التسويق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 36 سؤال
// نسخة مصححة: إكمال نص السؤال 74 الناقص، تصحيح كلمة "سيق"->"سبق" في السؤال 69،
// إعادة كلمة "السعر" الساقطة من خيار السؤال 82، إزالة نقطة زائدة أول نص السؤال 78،
// وتوحيد صياغة الخيارات + تنظيف مسافات/علامات ترقيم مكررة.
return [
    'unit_number' => 3,
    'title_ar' => 'تطوير خطة التسويق',
    'order_index' => 3,
    'questions' => [
        [
            'original_number' => 68,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تستخدم دورة حياة المنتج لتحليل المنتج:',
            'explanation_ar' => 'التفسير: العبارة صحيحة، تستخدم كل من: دورة حياة المنتج (والتي تشمل مرحلة التقديم، ثم النمو، ثم النضج، ثم الانحدار) في تحليل المنتج. الوحدة 3: تطوير خطة السوق، درس: مراحل دورة حياة المنتج، ص 61.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 69,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من المراحل التالية من دورة حياة المنتج تزداد فيها المبيعات وتنخفض الأرباح:',
            'explanation_ar' => 'حيث (في مرحلة النضج ترتفع المبيعات بينما تبدأ الأرباح في الانخفاض نتيجة زيادة المنافسة والإنفاق التسويقي). راجع الوحدة 3: تطوير خطة التسويق، دورة حياة المنتج (ص 53).',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقديم المنتج أو إطلاقه في السوق.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) مرحلة نمو السوق.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) مرحلة نضج السوق.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) كل ما سبق ذكره أعلاه.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 70,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'العلاقات العامة هي أحد أشكال ______________ التي تهدف إلى كسب فهم الجمهور وقبوله. اختر الإجابة الصحيحة:',
            'explanation_ar' => 'التفسير: العلاقات العامة هي شكل من أشكال الاتصالات يهدف إلى كسب فهم الجمهور وقبوله. راجع الوحدة 3: تطوير خطة التسويق، العلاقات العامة ص 64.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'أ) التسويق',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) العمل',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الاتصالات',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) كل ما سبق ذكره',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 71,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الأنواع الخمسة الرئيسية للمنتجات التجارية؟ (اختر الإجابة الصحيحة)',
            'explanation_ar' => 'بناء الصورة الذهنية أو إنشاء الفئة فهو هدف ترويجي وليس نوعًا من المنتجات التجارية. الوحدة 3 – تطوير خطة التسويق، درس المنتج، ص: 47.',
            'is_multi_correct' => true,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) العقارات أو المنشآت الثابتة.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) الملحقات.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) بناء الصورة الذهنية أو إنشاء الفئة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المكونات.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ه) المواد الأولية (الخام).',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'و) الخدمات.',
                    'order_index' => 6,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 72,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الخيارات التالية يتضمن جميع العناصر الأربعة الرئيسية لخطة التسويق؟',
            'explanation_ar' => 'لأن المزيج التسويقي الصحيح هو: المنتج – السعر – المكان/التوزيع – الترويج، ولا يوجد خيار يذكرها جميعًا بصورة صحيحة. الوحدة 3 تطوير خطة التسويق، ص: 44.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'أ) مكان التسويق، العرض، الخصوصية، السعر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الخطة، الإنتاجية، السعر، المكان، والدعاية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المنتج، مكان التسويق، الدعاية والترويج، الخطة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 73,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي هو العنصر الرابع في المزيج التسويقي؟',
            'explanation_ar' => 'العنصر الرابع من عناصر المزيج التسويقي (وفق ترتيب المنهج): المنتج، السعر، الترويج، التوزيع/المكان، الوحدة 3: تطوير خطة التسويق، ص: 44.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) التوجيه',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التسويق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) التوزيع',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 74,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أيٌّ مما يلي لا يُعدّ من الفئات الأربع لخصائص المنتج؟',
            'explanation_ar' => 'شهرة العلامة التجارية ليست من الفئات الأربع لخصائص المنتج، وإنما ترتبط بالعلامة التجارية. الوحدة 3 تطوير خطة التسويق، موضوع: خصائص المنتج، ص: 51.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'أ) عدد الميزات',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الجودة في الأداء الوظيفي',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) شهرة العلامة التجارية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الشكل أو المظهر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ه) الخيارات المتوفرة في خط الإنتاج',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 75,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الخيارات التالية يتضمن العناصر الأربعة الرئيسية لخطة التسويق؟',
            'explanation_ar' => 'السعر، المنتج، الدعاية والترويج، مكان التسويق، هذا الخيار الوحيد الذي يحتوي على عناصر المزيج التسويقي الأربعة. راجع الوحدة 3: تطوير خطة التسويق – درس: خطة التسويق، ص: 45.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'أ) السعر، المنتج، الدعاية والترويج، مكان التسويق.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) مكان التسويق، العرض، الخصوصية، السعر.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الدعاية والترويج، الإنتاجية، السعر، المكان.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المنتج، مكان التسويق، الدعاية والترويج، الخطة.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 76,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يواجه المنتج في مرحلة نمو السوق تحديات عدة، منها الحاجة إلى استثمار موارد في الإعلان لزيادة الوعي بالمنتج.',
            'explanation_ar' => 'العبارة صحيحة، حيث يحتاج المنتج في هذه المرحلة إلى الترويج المكثف لإعلام السوق بالمنتج، الوحدة 3: تطوير خطة التسويق – درس: خطة التسويق، ص: 53.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 77,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الدورات التالية تستخدم لتحليل المنتج؟',
            'explanation_ar' => 'تستخدم دورة حياة المنتج لتحليل المنتج واستراتيجياته، راجع الوحدة 3: تطوير خطة التسويق – درس: دورة حياة المنتج، ص: 53.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'أ) دورة حياة المنتج.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) دورة تحليل المنتج.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) دورة مرحلة المنتج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره أعلاه.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 78,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد خطوة أساسية في إعداد خطة التسويق؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد السوق المستهدف',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) زيادة عدد الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تغيير الهيكل الإداري',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) شراء الأصول الثابتة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 79,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'حدد أي من الأساليب التالية هي طرق للإعلان.',
            'explanation_ar' => 'العلاقات العامة ليست من طرق الإعلان، وإنما تعتبر عملية من عمليات الاتصال. راجع الوحدة 3: الترويج، درس الإعلان، ص 63.',
            'is_multi_correct' => true,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'أ) التلفاز.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) الراديو/ الإذاعة.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تناقل الأحاديث بين الناس/ الشفهي.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) الإنترنت.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ه) العلاقات الإعلامية.',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 80,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعدّ من الفئات الأربع لخصائص المنتج؟',
            'explanation_ar' => 'تشمل خصائص المنتج: الميزات، جودة الأداء، الشكل/المظهر، والخيارات المتاحة في خط الإنتاج، راجع الوحدة 3: تطوير خطة التسويق، درس: خصائص المنتج، ص 51.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'أ) عدة الميزات.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الجودة في الأداء الوظيفي.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الشكل أو المظهر.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الخيارات المتوفرة في خط الإنتاج.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ه) كل ما سبق.',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 81,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ممّا يلي يُعدّ العنصر الرابع في المزيج التسويقي؟',
            'explanation_ar' => 'حيث أن العنصر الرابع هو التوزيع في سلسلة المزيج التسويقي، والمكون من (المنتج، السعر، الترويج، التوزيع). راجع الوحدة 3: تطوير خطة التسويق، موضوع خطة التسويق، ص: 45.',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'أ) التوجيه',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التسويق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الترويج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 82,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الخيارات التالية يتضمن العناصر الأربعة الرئيسية لخطة التسويق؟',
            'explanation_ar' => 'تعتبر عناصر المزيج التسويقي الأربعة (4Ps) هي: المنتج (Product)، السعر (Price)، المكان/التوزيع (Place)، الترويج (Promotion). ولا يوجد أي خيار من الثلاثة الأولى يذكر هذه العناصر الأربعة بالصيغة الصحيحة والكاملة؛ لذلك تكون الإجابة الصحيحة هي: لا شيء مما سبق ذكره. راجع الوحدة الثالثة: تطوير خطة التسويق – المزيج التسويقي (4Ps)، ص: 45.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'أ) مكان التسويق، العرض، الخصوصية، السعر.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الحملة الإعلانية، السعر، المكان، الدعاية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المنتج، مكان التسويق، السعر، والترويج للخطة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 83,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي الأسس اللازمة لإعداد خطة تسويقية؟',
            'explanation_ar' => 'التفسير: من الأسس لوضع خطة التسويق تحديد المنتج الذي سيتم الترويج له، وتحديد الأشخاص الذين سيتم الترويج لهم، وكيفية الترويج، وكيفية إيجاد العملاء أو الحفاظ عليهم. راجع الوحدة الثالثة: تطوير خطة التسويق، ص: 44.',
            'is_multi_correct' => true,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'أ) ما هو المنتج الذي ستروج له؟',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) من الأشخاص الذين سوف تروج لهم هذا المنتج؟',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) كيفية ترويجك للمنتجات.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) كيفية إيجاد العملاء أو الحفاظ عليهم.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 84,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'تُوصَف خطة التسويق الفعالة بأنها:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'أ) خارطة طريق للنجاح التسويقي تجمع المنتج والسعر والمكان والترويج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) قائمة بأسماء الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تقرير محاسبي سنوي',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عقد إيجار المقر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 85,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تتضمن خطة التسويق عناصر المزيج التسويقي.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 86,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد عنصراً من عناصر خطة التسويق؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'أ) التعريف بالمنتج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) جدول رواتب الإدارة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) لائحة السلامة المهنية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) سياسة الإجازات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 87,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تتضمن خطة التسويق تحديد المنتج والسعر والمكان والترويج باعتبارها عناصر أساسية للمزيج التسويقي.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ تعتبر خطة التسويق أداة لتنظيم جهود التسويق، وتشير إلى عناصر المزيج التسويقي: المنتج، والسعر، والمكان، والترويج.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 88,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأسئلة التالية يجب أن تجيب عنه خطة التسويق؟',
            'explanation_ar' => 'التفسير: من الأسس لوضع خطة التسويق تحديد المنتج الذي سيتم الترويج له، وتحديد الأشخاص الذين سيتم الترويج لهم، وكيفية الترويج، وكيفية إيجاد العملاء أو الحفاظ عليهم.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'أ) كم عدد موظفي الشركة؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ما المنتج الذي ستقوم بتسويقه؟',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) ما قيمة الأصول الثابتة للشركة؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) ما عدد ساعات العمل الرسمية؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 89,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تتضمن استراتيجية التسويق تحديد الطريقة التي ستستخدمها الشركة للوصول إلى العملاء والمحافظة عليهم.',
            'explanation_ar' => 'التفسير: العبارة خاطئة؛ فمن ضمن أسس خطة التسويق كيفية إيجاد العملاء أو الحفاظ عليهم، باعتبار ذلك جزءًا من جهود التسويق.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 90,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أيّ مما يلي يُعد من أنواع المنتجات التجارية (الصناعية)؟',
            'explanation_ar' => 'التفسير: من ضمن المنتجات التجارية والصناعية؛ المواد الخام وهي السلع الطبيعية غير المصنعة مثل الخشب والتبن، الوحدة 3، ص 47.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'أ) المناديل الورقية والصابون ومعجون الأسنان.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المواد الخام',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) منتجات تصفيف الشعر',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الملابس',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 91,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تشمل المنتجات التجارية (الصناعية) المباني والمكاتب والمصانع والمعدات الرأسمالية.',
            'explanation_ar' => 'التفسير: من ضمن المنتجات التجارية والصناعية: العقارات أو المنشآت الثابتة، مثل المباني والمكاتب والمصانع والمعدات الرأسمالية اللازمة للعمليات اليومية.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 92,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من المنتجات الاستهلاكية؟',
            'explanation_ar' => 'التفسير: تعتبر المنتجات الاستهلاكية المنتجات التي يتم شراؤها من قبل المستهلكين النهائيين للاستخدام الشخصي، كالمنتجات الضرورية والأكل والشراب وأدوات الزينة. ص 49.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'أ) المعدات الرأسمالية للمصانع',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المنتجات التي يشتريها المستهلك النهائي لاستخدامه الشخصي مثل الطعام والشراب.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) المواد الخام المستخدمة في الإنتاج فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المباني والمنشآت الصناعية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 93,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'العلامة التجارية تؤثر فقط في شكل المنتج ولا علاقة لها بالقيمة التي يدركها العميل.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تؤثر العلامة التجارية في القيمة، فقيمة العلامة التجارية ترتبط بالقيمة التي يدركها العميل، ويمكن أن تساعد العلامة التجارية في جذب العملاء وبناء الثقة والولاء، ص 50.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 94,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أيٌّ ممّا يلي يُعدّ من أهداف التحكم في العلامة التجارية؟',
            'explanation_ar' => 'التفسير: يهدف التحكم في العلامة التجارية إلى ضمان صورة موحدة واستراتيجية متسقة للعلامة التجارية، بما يساعد على الحفاظ على سمعتها وجودتها، ص 50.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'أ) زيادة تكاليف الإنتاج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ضمان صورة موحدة واتساق للعلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقليل جودة المنتجات',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) إلغاء هوية المنتج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 95,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تعني جودة أداء المنتج قدرته على تلبية توقعات العملاء وتوفير مستوى ملائم من الأداء.',
            'explanation_ar' => 'التفسير: تعد جودة الأداء من ضمن خصائص المنتج، وترتبط بجودة أداء المنتج ومدى ملاءمته لتوقعات واحتياجات العملاء.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 96,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العناصر التالية يمكن للشركة استخدامه لتمييز منتجها عن منتجات المنافسين؟',
            'explanation_ar' => 'التفسير: من ضمن خصائص المنتج، الميزات، وجودة الأداء، والشكل أو المظهر، والخيارات المتوفرة في خط الإنتاج، وهي عناصر يمكن توظيفها في تطوير المنتج وتمييزه.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أ) حذف جميع خصائص المنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) إضافة ميزات جديدة للمنتج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) إلغاء خيارات المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تجاهل احتياجات السوق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 97,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'في مرحلة النمو من دورة حياة المنتج، يطرح المنتج في السوق ويبدأ المستهلكون في التعرف عليه.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تمر دورة حياة المنتج بمجموعة من المراحل تبدأ بالتقديم، ثم النمو، ثم النضج، ثم الانحدار. وفي مرحلة التقديم (وليس مرحلة النمو) يبدأ المنتج بالدخول إلى السوق والتعريف به.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 98,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مرحلة من مراحل دورة حياة المنتج تتميز بزيادة المنافسة وضرورة الحفاظ على حصة السوق؟',
            'explanation_ar' => 'التفسير: ترتبط مرحلة النضج بالسوق الذي أصبح أكثر استقرارًا، وتظهر فيها الحاجة إلى مواجهة المنافسة والحفاظ على حصة السوق.',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'أ) التقديم',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) النضج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) الانحدار فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مرحلة الفكرة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 99,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'السعر عنصر يؤثر في استراتيجية التسويق، ويجب أن يكون مناسبًا لقيمة المنتج في نظر العميل ولظروف السوق.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن قرارات التسعير جزء مهم من استراتيجية التسويق، وأن تحديد السعر يرتبط بالقيمة المقدمة للعملاء والمنافسة وظروف السوق والاستراتيجية التسويقية العامة.',
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 100,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية يمكن أن يؤثر في تحديد سعر المنتج؟',
            'explanation_ar' => 'التفسير: تتأثر استراتيجية التسعير بعوامل مثل المنافسة، والقيمة المقدمة للعميل، وظروف السوق، وأهداف الشركة واستراتيجيتها التسويقية.',
            'is_multi_correct' => false,
            'order_index' => 33,
            'options' => [
                [
                    'option_text_ar' => 'أ) لون مكتب المدير',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) أسعار المنافسين',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) عدد موظفي الموارد البشرية فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مساحة مستودع الشركة فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 101,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تركز استراتيجية التسويق في الترويج على كيفية وصول المنتج أو الخدمة إلى العميل بكفاءة من خلال قنوات التوزيع المناسبة.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن استراتيجية المكان/التوزيع هي التي تركز على كيفية وصول المنتج أو الخدمة إلى العميل، مع اختيار وإدارة قنوات التوزيع المناسبة بما يحقق الكفاءة في الوصول إلى السوق.',
            'is_multi_correct' => false,
            'order_index' => 34,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 102,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'خطة التسويق الفعالة تعمل كخارطة طريق للفشل التسويقي.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تعد خطة التسويق الفعالة خارطة طريق للنجاح التسويقي، وتجمع عناصر المزيج التسويقي.',
            'is_multi_correct' => false,
            'order_index' => 35,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 103,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من العناصر الأساسية للمزيج التسويقي؟',
            'explanation_ar' => 'التفسير: تتضمن عناصر المزيج التسويقي المنتج والسعر والمكان/التوزيع والترويج.',
            'is_multi_correct' => false,
            'order_index' => 36,
            'options' => [
                [
                    'option_text_ar' => 'أ) الموارد البشرية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المنتج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) المحاسبة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) التمويل',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_04.php
```php
<?php

// بيانات الوحدة رقم 4: تحليل المنتج والسوق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 12 سؤال
// نسخة مصححة: تنظيف أخطاء إملائية موروثة من الوورد (كلمة مكسورة "م نخفض"->"منخفض"،
// "مضوع"->"موضوع"، علامات ترقيم وأقواس ومسافات زائدة). الإجابات الصحيحة كلها كانت مطابقة أصلًا.
return [
    'unit_number' => 4,
    'title_ar' => 'تحليل المنتج والسوق',
    'order_index' => 4,
    'questions' => [
        [
            'original_number' => 104,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تُستخدم دورة تقييم مراحل المنتج في تحليل المنتج.',
            'explanation_ar' => 'العبارة خاطئة، حيث تستخدم دورة تقييم مراحل المنتج في تحليل المنتج، الوحدة 4: تحليل المنتج والسوق: درس دورة تقييم المنتج ص: 75.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 105,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'عندما تفكر في سوق معين، ينبغي تقييم جاذبيته الحالية فقط.',
            'explanation_ar' => 'العبارة خطأ، حيث لا يقتصر تقييم السوق على جاذبيته الحالية فقط، بل يشمل أيضًا إمكاناته المستقبلية وعوامل أخرى، راجع الوحدة 4: تحليل المنتج والسوق، درس: تحليل المنتجات والسوق، ص: 69.',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 106,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي هي إحدى النقاط الرئيسية الأربعة المتعلقة بالتوضيب (التعبئة والتغليف)؟',
            'explanation_ar' => 'يشمل عناصر التغليف الأربعة: الجاذبية، قابلية الحمل (سهولة الحمل)، التخزين، التكلفة. راجع الوحدة 4، تحليل المنتج والسوق، درس التغليف، ص: 71.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'أ) التسعير',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) العلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المتانة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الجاذبية/المظهر',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 107,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو تحليل الاتجاهات؟',
            'explanation_ar' => 'الخيار الأول هو التعريف لتحليل الاتجاهات؛ فهو يعتمد على جمع البيانات وتحليلها لاكتشاف الأنماط والاتجاهات التي تساعد في اتخاذ القرارات. راجع الوحدة الرابعة: تحليل المنتج والسوق، موضوع تحليل المنتج واتجاه السوق، ص 78.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) عملية جمع المعلومات وتحويلها لإيجاد نمط أو اتجاه معين في المعلومات التي تم جمعها.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) أقل فنون التحليل دقة.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تَتألف من النظر في المعلومات أو البيانات السابقة والاستنتاج بأن النتيجة سوف تكون هي نفسها.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) يقسم تحليل الاتجاهات السوق إلى أقسام أو شرائح يسهل عندها أو احتسابها.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 108,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يركّز تحليل السوق على الجاذبية الحالية والمستقبلية للسوق، والفرص المتاحة والمخاطر المحتملة.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 109,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'التمييز بين منتجات الأعمال والمنتجات الاستهلاكية مهم لأنه:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) حاسم في تطوير استراتيجية التسويق المناسبة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) لا يؤثر على التسويق إطلاقاً',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) يخص المحاسبة فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) يحدد رواتب البائعين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 110,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => '«تحليل المنتجات التكميلية» يُعد أسلوباً مفيداً لـ:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'أ) فهم جوانب السوق والفرص والتهديدات',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) حساب ضريبة الدخل',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تصميم شعار الشركة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) توظيف المدربين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 111,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل أحد أنواع تحليل اتجاه السوق؟',
            'explanation_ar' => 'التفسير: يتضمن تحليل المنتج واتجاه السوق عدة أنواع من التحليل، ومنها: التحليل الحدسي، والتحليل الزمني، وتحليل تجزئة السوق. ص 78-88.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحليل المنافسين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التحليل الزمني',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تحليل الأسعار',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحليل التوزيع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 112,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد مرحلة من مراحل دورة تقييم المنتج؟',
            'explanation_ar' => 'التفسير: تتكون دورة تقييم المنتج من خمس مراحل، وتبدأ بـ مرحلة الفكرة، ثم مرحلة الجدوى، ثم التطوير، ثم الإطلاق، ثم النمو/النضج.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'أ) مرحلة الفكرة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) مرحلة التسعير',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) مرحلة التوزيع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مرحلة الإعلان',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 113,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'مرحلة الجدوى في دورة تقييم المنتج تهدف إلى التحقق من أن المنتج المقترح مناسب للسوق ويمكنه تلبية احتياجات العملاء.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن مرحلة الجدوى تهدف إلى التحقق من ملاءمة المنتج المقترح للسوق، ومدى قدرته على تلبية احتياجات العملاء، بالإضافة إلى دراسة جدوى تطويره.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 114,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'من ضمن إستراتيجيات التسعير الشائعة أحيانا التسعير بسعر ترويجي.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يتم أحيانًا تقديم أو تسعير المنتج بسعر منخفض جدًا (أحياناً أقل من التكلفة) لجذب العملاء إلى المتجر أو الموقع الإلكتروني.',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 115,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد أحد العناصر الرئيسية للتغليف؟',
            'explanation_ar' => 'التفسير: تشمل العناصر الرئيسية للتغليف الجاذبية، وسهولة الحمل، والتخزين، والتكلفة.',
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'أ) التسعير',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) العلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الجاذبية/المظهر',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) العمالة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_05.php
```php
<?php

// بيانات الوحدة رقم 5: التسويق المستهدف
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 40 سؤال
return [
    'unit_number' => 5,
    'title_ar' => 'التسويق المستهدف',
    'order_index' => 5,
    'questions' => [
        [
            'original_number' => 116,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يمكن للتركيبة السكانية أن تساعد الشركة في البحث عن أوجه التشابه بين المستهلكين وبالتالي لا تساعد في إنشاء مجموعة من المستهلكين المتشابهين الذين يمكن التسويق لهم باعتبارهم مستهلك واحد ,',
            'explanation_ar' => 'العبارة خطأ، حيث تساعد التركيبة السكانية في البحث عن أوجه التشابه بين المستهلكين ومن ثم تساعد في إ نشاء مجموعة من المستهلكين المتشابهين الذين يمكن التسويق لهم بإعتبارهم مستهلك واحد، راجع الوحدة 5: التسويق المستدف، ص :87.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 117,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'عند التخطيط لاستراتيجية التسويق الخاصة بك، حدد العاملين الرئيسيين اللذين يجب أخذهما بعين الاعتبار.',
            'explanation_ar' => 'الاستراتيجية التسويقية الناجحة تعتمد بالأساس على تقسيم السوق واستهداف الشرائح المناسبة (STP). الوحدة 5 – التسويق المستهدف، ص: 87.',
            'is_multi_correct' => true,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'أ) التحسن في الأرباح',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التقسيم',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) الأسلوب المُركز',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الاستهداف',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 118,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي هي الطرق الأكثر شيوعًا التي تُستخدم في تصنيف العملاء؟',
            'explanation_ar' => 'تعد أكثر طرق تصنيف العملاء شيوعًا حسب (العامل النفسي، الديموغرافية/ التركيبة السكانية، الجغرافية، السلوكية)، أما غير السلوكية والنسبية فليستا من طرق التجزئة القياسية، راجع الوحدة 5: التسويق ، درس : التسويق المستهدف، ص: 88',
            'is_multi_correct' => true,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'أ) غير السلوكية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) العامل النفسي',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) الديموغرافية / التركيبة السكانية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) النسبية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ه) الجغرافية',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'و) السلوكية',
                    'order_index' => 6,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 119,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'عند التخطيط لإستراتيجية التسويق الخاصة بك حدد العاملين الرئيسين الذين يجب أخذهما بعين الاعتبار؟(إجابة واحدة).',
            'explanation_ar' => 'عند التخطيط لاستراتيجية التسويق يؤخذ في الاعتبار التقسيم والاستهداف، راجع الوحدة 5، التسويق المستهدف، درس: التسويق المستهدف، ص: 87.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) تعزيز الأرباح.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التقسيم',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الاستهداف.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) ب وج',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 120,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا تقتصر أهمية التركيبة السكانية على تحديد خصائص المستهلكين دون المساهمة في إيجاد أوجه الشبه بينهم وإنشاء مجموعات متشابهة.',
            'explanation_ar' => 'العبارة خاطئة، حيث تساعد التركيبة السكانية على تجميع المستهلكين ذوي الخصائص المتشابهة لتوجيه التسويق إليهم، راجع الوحدة 5: التسويق المستهدف: درس: عوامل التجزئة، ص: 90.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 121,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي هي أمثلة من العوامل النفسية المستخدمة في تقسيم السوق؟',
            'explanation_ar' => 'يعتبر كل من : نمط الحياة، والطبقة الاجتماعية من أمثلة التجزئة النفسية، بينما العمر ديموغرافي والولاء سلوكي، راجع الوحدة 5 : التسويق المستهدف، درس: التجزئة السيكوجرافية والسلوكية، ص:100.',
            'is_multi_correct' => true,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) نمط الحياة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) التركيبة السكانية حسب العمر',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الولاء للعلامة التجارية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الطبقة الاجتماعية',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 122,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تسمى تجزئة السوق من المشترين المحتملين إلى مجموعات فرعية منفصلة على أساس معايير محددة: التقسيم.',
            'explanation_ar' => 'العبارة صحيحة، حيث هذا هو التعريف الصحيح لتقسيم السوق (Segmentation): تقسيم المشترين المحتملين إلى مجموعات فرعية وفق معايير محددة. راجع الوحدة 5 :، درس: التسويق المستهدف،ص:  88.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 123,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي هي الطرق الأكثر شيوعا التي تستخدم في تصنيف العملاء؟(إجابة واحدة)',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'أ) الحالة النفسية.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التركيبة السكانية/ الديموغرافية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الجغرافية.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) السلوكية.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ه) كل ما سبق ذكره أعلاه.',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 124,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو التسويق المستهدف؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'أ) يختار التسويق المستهدف قسم/ أقسام السوق التي تتناسب مع أهداف المؤسسة.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) يطور التسويق المستهدف إستراتيجية التسويق التي تناشد السوق المستهدف والمحدد.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) لقد غير التسويق المستهدف وسائل الإعلام التي يتم استخدامها من قبل الشركات للتسويق وكذلك غير كيفية حصول المستهلك على اتخاذ القرارات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره أعلاه.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 125,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'لتحليل إمكانية النجاح في المستقبل يحتاج المرء للنظر في العوامل التالية من عملية تقسيم السوق:',
            'explanation_ar' => 'لتحليل النجاح المستقبلين سيحتاج المرء إلى إلقاء نظرة على العوامل التالية: العمر، النوع، حجم الأسرة، التعليم، الدخل، الجغرافيا، مجموعة التجزئة، راجع الوحدة 5: التسويق المستهدف، درس عوامل التجزئة، ص 90.',
            'is_multi_correct' => true,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'أ) مستخدمي العلامة التجارية.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الدخل .',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) مستخدمي الصنف المنافس.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المكان الجغرافي.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 126,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'مما يلي يعتبر من العوامل النفسية المستخدمة في تقسيم السوق؟',
            'explanation_ar' => 'التقسيم النفسي (Psychographic Segmentation) يعتمد على عوامل مثل: نمط الحياة (Lifestyle).، والطبقة الاجتماعية (Social Class). أما التركيبة السكانية حسب العمر فتعتبر من التقسيم الديموغرافي. والولاء للعلامة التجارية فتعتبر من التقسيم السلوكي. راجع الوحدة الخامسة: التسويق المستهدف، موضوع: تقسيم السوق (العوامل النفسية)، الصفحات 90–100.',
            'is_multi_correct' => true,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'أ) نمط الحياة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) التركيبة السكانية حسب العمر',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الولاء للعلامة التجارية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الطبقة الاجتماعية',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 127,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تساعد التجزئة التسويقية على فهم دوافع العملاء لاتخاذ قرارات الشراء، وتحديد المعوقات التي تواجههم وسبل التغلب عليها.',
            'explanation_ar' => 'العبارة خاطئة، حيث أن تقسيم السوق (Market Segmentation) يساعد على فهم خصائص العملاء وسلوكهم ودوافع الشراء والعوائق التي تؤثر في قراراتهم، مما يمكّن المؤسسة من تطوير استراتيجيات تسويقية أكثر فاعلية. راجع الوحدة الخامسة: التسويق المستهدف، موضوع: تقسيم السوق (الصفحات 88–100)',
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 128,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تعتبر عملية التجزئة التسويقية التي تربط بين العملاء والجمهور للشركات والمنتجات والخدمات التي تقدمها بهدف واحد ألا وهو: زيادة أداء السوق الجديد عبر الربح. ثم إن من الممكن أن يساعد السوق أو يفشل في تحقيق أي نمو أو ازدهار لهم، فهي تفسر كيفية قيام المستهلكين والشركات بالشراء، وكيف يمكن إزالة هذه المعيقات أو أسباب انخفاضها.',
            'explanation_ar' => 'العبارة صحيحة، حيث تساعد التجزئة التسويقية على: • فهم العملاء وسلوكهم. • تفسير دوافع الشراء. • إزالة معوقات الشراء. • دعم نمو المؤسسة وتحسين الأداء التسويقي. لذلك فالعبارة صحيحة. راجع الوحدة الخامسة: التسويق المستهدف (تقسيم السوق)، ص 87.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 129,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'جميع الأسواق هي نفسها، وبالتالي من المهم أن نفهم الأقسام المختلفة التي تشكل مجمل السوق."',
            'explanation_ar' => 'العبارة خطأ، لأن جميع الأسواق هي نفسها" غير صحيح؛ فكل سوق يختلف من حيث العملاء والاحتياجات والسلوك، ولذلك يتم تقسيم السوق (Market Segmentation) إلى شرائح مختلفة، راجع الوحدة الخامسة: التسويق المستهدف، ص 87.',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 130,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'من المهم أن تُقيِّم أقسام السوق المختلفة التي تُشكِّل مجمل السوق',
            'explanation_ar' => 'العبارة صحيحة، حيث يجب: •	تحديد أقسام (شرائح) السوق. •	تقييم كل شريحة من حيث حجمها، وربحيتها، وإمكانية خدمتها. •	ثم اختيار السوق المستهدف. إذن تقييم أقسام السوق المختلفة هو بالفعل خطوة أساسية قبل اختيار السوق المستهدف راجع الوحدة: التسويق المستهدف، ص :  87.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 131,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'لتحليل النجاح في المستقبل يحتاج المرء للنظر في العوامل التالية في عملية تقسيم السوق (إجابة واحدة تنطبق)',
            'explanation_ar' => 'لتحليل النجاح المستقبلين سيحتاج المرء إلى إلقاء نظرة على العوامل التالية: العمر، النوع، حجم الأسرة، التعليم، الدخل، الجغرافيا، مجموعة التجزئة، راجع الوحدة 5: التسويق المستهدف، درس عوامل التجزئة، ص 90',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'أ) مستخدمين العلامة التجارية.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الدخل .',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) مستخدمي المنتج المنافس',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) المكان الجغرافي.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ه) ب و د',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 132,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يساعد تحليل تجزئة السوق في تحديد حجم الفرص التسويقية في كل قطاع، وبالتالي يمكن للشركات تحديد الأسواق التي تستحق الاستثمار فيها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن تحليل تجزئة السوق يساعد في تقدير حجم الفرص التسويقية في كل قطاع، كما يساعد الشركات على تحديد الموارد بشكل أفضل، وتحديد الأسواق التي يمكن أن تستحق الاستثمار فيها.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 133,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل أحد أنواع التحليل في تحليل التجزئة السكانية؟',
            'explanation_ar' => 'التفسير: يتضمن تحليل التجزئة السكانية عدة أنواع، من بينها العوامل الديموغرافية، واتجاهات المستهلك، والاتجاهات التكنولوجية، بهدف فهم خصائص السوق والمستهلكين بصورة أفضل.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'أ) التحليل الزمني',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التحليل الديموغرافي',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) التحليل التاريخي',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) التحليل التنافسي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 134,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'تجزئة السوق تعني:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقسيم السوق إلى فئات أو قطاعات لاستهدافها بفعالية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) دمج جميع العملاء في فئة واحدة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) إلغاء التسويق للفئات الصغيرة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) بيع المنتج بسعر واحد للجميع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 135,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمثّل أساس التجزئة «الديموغرافي»؟',
            'explanation_ar' => 'راجع الوحدة 5: التسويق المستهدف، ص88',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'أ) العمر والجنس والدخل والمهنة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) المدن مقابل المناطق الريفية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) أنماط الاستخدام والولاء',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) نمط الحياة والقيم',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 136,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'التجزئة على أساس «المدن الكبرى مقابل المناطق الريفية» تُعد تجزئة:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'أ) جغرافية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) ديموغرافية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) سلوكية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) نفسية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 137,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تساعد تجزئة السوق الشركات على تصميم استراتيجيات تسويقية مخصصة لكل فئة من العملاء.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 138,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'التجزئة القائمة على أنماط الاستخدام والولاء للعلامة تُصنّف كتجزئة:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'أ) سلوكية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) جغرافية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) ديموغرافية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) اقتصادية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 139,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يساعد التسويق المستهدف الشركات على تحديد المجموعات الأكثر ملاءمة لأهدافها التسويقية بدلًا من التعامل مع السوق كله باعتباره مجموعة واحدة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ فالتسويق المستهدف يقوم على تحديد المجموعات أو الشرائح التي تتناسب مع أهداف الشركة، ثم توجيه الجهود التسويقية إليها بصورة أكثر تركيزًا.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 140,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من أسباب قيام الشركات بتقسيم السوق؟',
            'explanation_ar' => 'التفسير: حيث أن من أسباب تقسيم الأسواق تحسين الاستجابة لاحتياجات العملاء، وزيادة الأرباح، وفهم العملاء، والمحافظة عليهم، واكتساب حصة سوقية.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'أ) زيادة عدد المنتجات دون دراسة العملاء',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تحسين الاستجابة لاحتياجات العملاء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) إلغاء الاختلافات بين العملاء',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) منع الشركة من تحديد الأسواق المناسبة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 141,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن يساعد تقسيم السوق الشركة على زيادة أرباحها من خلال توجيه جهودها إلى مجموعات أكثر ملاءمة.',
            'explanation_ar' => 'التفسير: يعتبر هدف زيادة الأرباح من ضمن أسباب تنفيذ تقسيم السوق، حيث يمكن أن يؤدي التركيز على شرائح أكثر ملاءمة إلى استخدام أفضل للموارد والجهود التسويقية.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 142,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من النتائج التي يمكن أن يحققها تقسيم السوق؟',
            'explanation_ar' => 'التفسير: من أسباب تنفيذ تقسيم السوق الحفاظ على العملاء، إلى جانب تحسين لاستجابة لاحتياجاتهم، وزيادة الأرباح، وفهمهم، واكتساب حصة سوقية.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'أ) إلغاء الحاجة إلى دراسة العملاء',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التعامل مع جميع العملاء بالطريقة نفسها',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) الحفاظ على العملاء',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) إلغاء المنتجات غير المربحة مباشرة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 143,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يُسهم تقسيم السوق في تمكين الشركة من الاستحواذ على حصة في قطاع محدّد، بدلاً من استهداف السوق بأكمله بالأسلوب نفسه.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن اكتساب حصة سوقية يعد أحد أسباب تنفيذ تقسيم السوق، حيث يسمح التركيز على شرائح محددة بتوجيه الجهود والموارد إليها بصورة أكثر فاعلية.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 144,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من المتغيرات التالية يُستخدم في التجزئة الديموغرافية إلى جانب العمر؟',
            'explanation_ar' => 'التفسير: من المتغيرات الديموغرافية: العمر، والنوع، وحجم الأسرة، والتعليم، والدخل، والجغرافيا.ص90',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أ) الاستخدام',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) حجم الأسرة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) المزايا المطلوبة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الولاء للعلامة التجارية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 145,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يُعد التعليم أحد المتغيرات المستخدمة في التجزئة الديموغرافية.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يعد التعليم أحد المتغيرات الديموغرافية المستخدمة في تقسيم السوق، إلى جانب العمر والنوع وحجم الأسرة والدخل والجغرافيا.90',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 146,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأمثلة التالية يرتبط بتجزئة السوق حسب التجزئة الديموغرافية؟',
            'explanation_ar' => 'التفسير: يختلف التسويق بشكل كبير بناء على الفئات العمرية المستهدفة، حسب الأطفال والبالغين والمتقدمين في العمر، ومعجون الأسنان خير مثال لذلك، ص 98..',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'أ) العملاء الذين يستخدمون المنتج يوميًا',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) اختلاف الاحتياجات حسب المرحلة العمرية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) العملاء الذين يفضلون علامة تجارية معينة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) العملاء الذين يبحثون عن ميزة محددة في المنتج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 147,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يعد النوع (الجنس) متغير ديموغرافي عند تقسيم السوق.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يعتبر النوع ضمن المتغيرات الديموغرافية المستخدمة في تقسيم السوق، إلى جانب العمر، وحجم الأسرة، والتعليم، والدخل والجغرافيا.',
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 148,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل مثالًا على استخدام التجزئة الديموغرافية حسب الدخل؟',
            'explanation_ar' => 'التفسير: الدخل أحد المتغيرات الديموغرافية التي تستخدم في تقسيم السوق، ويمكن من خلاله التعرف على الاختلافات بين الشرائح ذات المستويات الاقتصادية المختلفة.',
            'is_multi_correct' => false,
            'order_index' => 33,
            'options' => [
                [
                    'option_text_ar' => 'أ) استهداف العملاء حسب استخدامهم للمنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) استهداف شرائح ذات مستويات دخل مختلفة بعروض مناسبة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) استهداف العملاء حسب ولائهم للعلامة التجارية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) استهداف العملاء حسب الفوائد التي يبحثون عنها',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 149,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'في التجزئة الجغرافية، يمكن تقسيم السوق وفق مناطق أو وحدات جغرافية مختلفة بدلًا من الاعتماد على خصائص العملاء الشخصية فقط.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تقسم التجزئة الجغرافية السوق إلى وحدات جغرافية مختلفة، ويمكن أن تشمل مناطق أو مواقع مختلفة، بما يسمح بتكييف النشاط التسويقي وفق خصائص كل منطقة.',
            'is_multi_correct' => false,
            'order_index' => 34,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 150,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد مثالًا على التجزئة السلوكية القائمة على المزايا؟',
            'explanation_ar' => 'التفسير: يمكن أن تقوم التجزئة السلوكية على المزايا التي يبحث عنها المستهلكون، أي تقسيمهم وفق الفوائد أو المنافع التي يريدون الحصول عليها من المنتج. ص100(الفوائد المتحققة)',
            'is_multi_correct' => false,
            'order_index' => 35,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقسيم العملاء حسب العمر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تقسيمهم حسب المدينة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تقسيم العملاء وفق الفائدة التي يبحثون عنها في المنتج',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) تقسيمهم حسب حجم الأسرة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 151,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن تقسيم المستهلكين سلوكيًا وفق عدد مرات استخدامهم للمنتج خلال فترة زمنية معينة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يعد الاستخدام ضمن أسس التجزئة السلوكية، ويمكن تقسيم المستهلكين وفق معدل أو نمط استخدامهم للمنتج.',
            'is_multi_correct' => false,
            'order_index' => 36,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 152,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما المقصود بالتجزئة السيكوجرافية؟',
            'explanation_ar' => 'التفسير: تقوم التجزئة السيكوجرافية على العوامل النفسية والاجتماعية للمستهلك، ومن أمثلتها نمط الحياة والقيم والجوانب المرتبطة بشخصية المستهلك. ص 100.',
            'is_multi_correct' => false,
            'order_index' => 37,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقسيم العملاء حسب موقعهم الجغرافي فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تقسيم العملاء حسب العمر والدخل فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تقسيم السوق استنادًا إلى العوامل النفسية والاجتماعية وأنماط الحياة.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) تقسيم العملاء حسب عدد مرات الشراء فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 153,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن يكون نمط الحياة أساسًا لتصميم حملات تسويقية تستهدف مجموعات من العملاء الذين يتشابهون في اهتماماتهم وأنماط حياتهم.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يندرج نمط الحياة ضمن العوامل السيكوجرافية، وأن فهم سلوك المستهلكين وأنماط حياتهم يمكن أن يساعد المسوقين على تصميم حملات تسويقية موجهة إلى اهتماماتهم وأنماط حياتهم.',
            'is_multi_correct' => false,
            'order_index' => 38,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 154,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تُسهم تجزئة السوق في مساعدة الشركات على تخصيص استراتيجيات تسويقية مناسبة لمجموعات مختلفة من العملاء.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تهدف تجزئة السوق إلى تقسيم السوق إلى مجموعات يمكن التعامل معها واستهدافها بصورة أكثر فعالية.',
            'is_multi_correct' => false,
            'order_index' => 39,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 155,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل مثالًا على التجزئة الجغرافية؟',
            'explanation_ar' => 'التفسير: تقسيم السوق إلى المدن الكبرى والمناطق الريفية يمثل تجزئة على أساس جغرافي.',
            'is_multi_correct' => false,
            'order_index' => 40,
            'options' => [
                [
                    'option_text_ar' => 'أ) العمر والجنس',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) نمط الحياة والقيم',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) لمدن الكبرى مقابل المناطق الريفية.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) أنماط الاستخدام والولاء',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_06.php
```php
<?php

// بيانات الوحدة رقم 6: وضع العلامة التجارية
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 34 سؤال
// تم تصحيح السؤال 168: كان فيه 3 "خيارات" وهمية (5، 6، 7) أصلها فقرة شرح
// من الوورد اتقسّمت غلط كخيارات إجابة، وتم دمجها داخل التفسير (explanation_ar) بدل الخيارات
return [
    'unit_number' => 6,
    'title_ar' => 'وضع العلامة التجارية',
    'order_index' => 6,
    'questions' => [
        [
            'original_number' => 156,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يهدف وضع العلامة التجارية إلى تضليل الأفراد في السوق المستهدف عند تمييز علامة تجارية عن أخرى',
            'explanation_ar' => 'العبارة خطأ، حيث أن وضع العلامة التجارية في السوق يضمن تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن غيرها، راجع الوحدة 6: وضع العلامة التجارية: موضوع: تطوير مكانتك: ص 111',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 157,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو تمركز العلامة التجارية؟',
            'explanation_ar' => 'التفسير: التمركز يدور حول خلق صورة ذهنياً "فريدة ومتميزة" تميز المنتج عن المنافسين وليس مجرد موقع قياسي أو عاكس. راجع الوحدة 6: وضع العلامة التجارية: موضوع: تطوير مكانتك: ص 111',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'أ) المركز العاكس الذي تتخذه العلامة التجارية في السوق لضمان تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب)المركز القياسي الذي تتخذه العلامة التجارية في السوق لضمان تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المركز أو المكان الفريد الذي تتخذه العلامة التجارية في السوق لضمان تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) المركز الذي تتخذه العلامة التجارية في السوق لضمان تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 158,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'إن تمركز العلامة التجارية هو الموقع القياسي الذي تتخذه العلامة التجارية في السوق لضمان تمكن الأفراد في السوق المستهدفة من تمييز علامتهم التجارية عن العلامات التجارية الأخرى.',
            'explanation_ar' => 'العبارة خطأ، لأن التمركز يعتمد على الموقع "الفريد/المتميز" (Unique Place) في ذهن العميل وليس "القياسي". راجع الوحدة 6: وضع العلامة التجارية، موضوع: تطوير مكانتك: ص 111',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 159,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يُعد تاريخ التصنيع عاملًا جيدًا لتحديد مركز المنتج.',
            'explanation_ar' => 'العبارة صحيحة، لأن تاريخ التصنيع هو عنصر تشغيلي/لوجستي، ولا يُستخدم كخاصية لتحديد مركز المنتج ذهنياً لدى الجمهور. وليس من العوامل المستخدمة لتحديد تمركز المنتج أو العلامة التجارية. راجع الوحدة 6: وضع العلامة التجارية، موضوع: تطوير مكانتك، ص:111.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 160,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'إن تحديد ما يتميز بيه المنتج عن غيره ليس عاملاً جيداً لتحديد تمركز المنتج.',
            'explanation_ar' => 'العبارة خطأ، لأن تمييز المنتج عن المنافسين (الميزة التنافسية) هو أساس عملية التمركز في ذهن العميل. الوحدة 6 –وضع العلامة التجارية، موضوع، تطوير مكانتك.، ص 111.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 161,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو تمركز العلامة التجارية؟',
            'explanation_ar' => 'التفسير: المكانة الفريدة (Unique Position) في ذهن المستهلك هي التعريف الأساسي الدقيق للتمركز.. الوحدة 6 : وضع العلامة التجارية، درس :تطوير مكانتك، ص 111.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) المركز العاكس الذي تتخذه العلامة التجارية في السوق لضمان تمكّن الأفراد في السوق المستهدف من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المركز القياسي الذي تتخذه العلامة التجارية في السوق لضمان تمكّن الأفراد في السوق المستهدف من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المركز الذي تتخذه العلامة التجارية في السوق لضمان تمكّن الأفراد في السوق المستهدف من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الوضع الفريد الذي تتخذه العلامة التجارية في السوق لضمان تمكّن الأفراد في السوق المستهدف من تمييز علامتهم التجارية عن غيرها.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 162,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تعتبر وظيفة المنتج عاملًا جيدًا لتحديد تمركز المنتج.',
            'explanation_ar' => 'العبارة خطأ، إذ أن من إستراتيجيات تنفيذ أو تحديد أو تمركز بناء العلامة التجارية: تميز المنتج، الميزة الرئيسية، مستخدم المنتج، المقارنة مع المنافس، المقارنة مع الفئة، الاستخدام، الارتباط، الوحدة 6: وضع العلامة التجارية، موضوع: إستراتيجية بناء العلامة التجارية، ص : 116.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 163,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو أسلوب التمركز المستخدم لمطابقة فوائد منتجك أو المزايا التنافسية الفريدة من نوعها مع احتياجات ورغبات السوق المستهدف؟',
            'explanation_ar' => 'التفسير: التمركز عن طريق المطابقة هو أسلوب يعتمد على مطابقة المنافع الفريدة التي يقدمها المنتج مع احتياجات الشريحة المستهدفة.، راجع الوحدة 6: وضع العلامة التجارية، درس: تطوير مكانتك، ص 112.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'أ) التمركز عن طريق رسم الخرائط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التمركز عن طريق المطابقة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) التمركز حسب العلاقة العاطفية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) استراتيجية لتمركز العلامة التجارية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 164,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي ليس من عوامل تحديد تمركز المنتج الجيدة؟',
            'explanation_ar' => 'وظيفة المنتج، والمستهلكون المستهدفون، وما يميز المنتج كلها عوامل جيدة لتحديد تمركز المنتج. الوحدة 6 – وضع العلامة التجارية، ص 105..',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'أ) وظيفة المنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) المستهلكون المستهدفون',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) أوجه الاختلاف بين المنتج وغيره (ما يميز المنتج)',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق .',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 165,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يجب فعله لتنفيذ استراتيجية تمركز العلامة التجارية؟',
            'explanation_ar' => 'راجع الوحدة 6 : وضع العلامة التجارية، درس: تطوير المكانة، ص: 111.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'أ) حدد مركز منتجك/شركتك استنادًا إلى نقاط قوة منتجك ونقاط ضعف المنتج المنافس.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) استخدم مركزين لنفس المنتج في السوق نفسه.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تحديد مركز كل شيء عن المنتج الخاص بك للجميع.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) كل ما سبق ذكره.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 166,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تمركز العلامة التجارية هو المكانة الفريدة التي تحتلها العلامة في السوق، بما يضمن لجمهورها المستهدف تمييزها عن العلامات التجارية المنافسة.',
            'explanation_ar' => 'العبارة صحيحة: حيث أن المكانة الفريدة (Unique Position) في ذهن المستهلك هي التعريف الأساسي الدقيق للتمركز.. الوحدة 6 : وضع العلامة التجارية، درس :تطوير مكانتك، ص 111. راجع الوحدة 6: وضع العلامة التجارية، ص 111 (تطوير مكانتك)',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 167,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يجب وضعه ضمن استراتيجية مركز العلامة التجارية؟',
            'explanation_ar' => 'التفسير: تقوم إستراتيجية تمركز العلامة التجارية على تحديد ميزة تنافسية واضحة اعتمادًا على نقاط قوة المنتج مقارنةً بالمنافسين. أما بقية الخيارات فهي ممارسات خاطئة (مثل استخدام أكثر من تمركز لنفس المنتج أو تقديم وعود لا يمكن الوفاء بها). راجع الوحدة السادسة: وضع العلامة التجارية، موضوع: تطوير مكانتك،ص 111.',
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'أ) حدد ميزتك التنافسية، شركتك استنادًا إلى نقاط قوة منتجك ونقاط ضعف المنافس.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) استخدام مركزين لنفس المنتج في السوق نفسه.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تحديد مركز لكل شيء في الملف الخاص بك للدمج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تقديم منتجك بناءً على وعود أو مبادئ لا يمكنك الوفاء بها.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 168,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو أسلوب التمركز المستخدم عندما تكون فوائد منتجك أو مزاياه التنافسية الفريدة من نوعها مع احتياجات ورغبات السوق المستهدف؟',
            'explanation_ar' => 'يوجد ثلاثة أنواع من التمركز هي: تمركز المطابقة (Matching Positioning): يعتمد على مطابقة فوائد ومزايا المنتج الفريدة مع احتياجات ورغبات السوق المستهدف، بحيث يشعر العميل أن المنتج يلبي احتياجاته مباشرة. التمركز برسم الخرائط (Mapping Positioning): يعتمد على استخدام خرائط التمركز لمقارنة موقع العلامة التجارية مع المنافسين وتحديد موقعها في أذهان العملاء. التمركز حسب العلاقة العاطفية (Emotional Positioning): يعتمد على بناء ارتباط عاطفي بين العميل والعلامة التجارية، بحيث يتخذ العميل قرار الشراء بناءً على المشاعر والثقة والانتماء أكثر من الخصائص الوظيفية. ولذا فإن الصحيح، تمركز المطابقة، وهو غير موجود ضمن الخيارات المتاحة، لذلك الإجابة الصحيحة هي "لا شيء مما سبق ذكره".',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'أ) التمركز عن طريق رسم الخرائط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب)التمركز حسب العلاقة العاطفية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) استراتيجية تمركز العلامة التجارية.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) لا شيء مما سبق ذكره.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 169,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تعتبر سمعة الشركة وصورتها جزءاً حيوياً من الاستثمار التسويقي في العلامة التجارية.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 170,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'الوظيفة الأساسية للعلامة التجارية هي:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'أ) تمييز منتجات الشركة عن المنافسين وبناء صورة ذهنية لدى العميل',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) زيادة تكاليف الإنتاج',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) إخفاء اسم الشركة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تقليل جودة المنتج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 171,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'العلامة التجارية القوية تبني ولاء العملاء وتدعم الحصة السوقية.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 172,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من مكونات هوية العلامة التجارية؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'أ) الاسم والشعار والقيم والصورة الذهنية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) رواتب الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) موقع المستودع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) جدول الصيانة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 173,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يجب عند تحديد مكانة العلامة التجارية على المدى الطويل فهم احتياجات ورغبات السوق المستهدف.',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ فتحديد الموقع الناجح على المدى الطويل يتطلب مراعاة احتياجات ورغبات السوق المستهدف، حتى تكون المكانة التي تختارها العلامة مناسبة للجمهور المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 174,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمثل أحد الأسئلة الأساسية التي تساعد الشركة على تطوير مكانتها؟',
            'explanation_ar' => 'التفسير: عند تطوير مكانة العلامة التجارية توجد مجموعة من الأسئلة الأساسية التي تساعد على تحديد هوية العلامة ومكانتها، ومنها: من أنت؟ ماذا تفعل؟ وكيف تفعله؟',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'أ) كم عدد موظفي الشركة؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) من أنت؟',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) كم تبلغ تكلفة المصنع؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) كم عدد فروع المنافسين؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 175,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'من الأسئلة التي تساعد على تطوير مكانة العلامة التجارية: "ماذا تفعل؟',
            'explanation_ar' => 'التفسير: العبارة صحيحة؛ فعند تطوير مكانة العلامة التجارية توجد مجموعة من الأسئلة الأساسية التي تساعد على تحديد هوية العلامة ومكانتها، ومنها: من أنت؟ ماذا تفعل؟ وكيف تفعله؟',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 176,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأسئلة التالية يركز على الطريقة التي تقدم بها الشركة منتجاتها أو خدماتها؟',
            'explanation_ar' => 'التفسير: ضمن أسئلة تطوير المكانة، يساعد سؤال "كيف تفعل؟" على توضيح الأسلوب أو الطريقة التي تستخدمها الشركة في تقديم القيمة لعملائها، وهو جزء من تحديد مكانتها.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'أ) من أنت؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) ماذا تفعل؟',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) كيف تفعل ذلك؟',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) أين يوجد منافسوك؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 177,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'لا يمكن استخدام التمركز عن طريق رسم الخرائط لمقارنة موقع العلامة التجارية مع العلامات المنافسة.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن التمركز عن طريق رسم الخرائط يعتمد على استخدام خريطة للتمركز تساعد في مقارنة العلامة التجارية بالمنافسين وتحديد المواقع المختلفة في السوق.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 178,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الهدف الأساسي من استخدام خريطة التمركز؟',
            'explanation_ar' => 'التفسير: تستخدم خرائط التمركز لتحديد موقع العلامة أو المنتج مقارنة بالمنافسين، مما يساعد على معرفة موقع المنتج في السوق واختيار المكانة المناسبة له.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد عدد موظفي الشركة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تحديد موقع المنتج مقارنة بالمنافسين في السوق',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) حساب تكلفة الإنتاج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تحديد رواتب فريق التسويق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 179,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يساعد التمركز عن طريق رسم الخرائط الشركة على تقييم كيفية إدراك السوق المستهدف لمنتجها مقارنة بالمنافسين.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تستخدم خرائط التمركز لفهم موقع المنتج أو العلامة في السوق مقارنة بالمنافسين، وبالتالي تساعد في تقييم المكانة التي يدركها السوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 180,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الذي يركز عليه التمركز من خلال المكانة العاطفية؟',
            'explanation_ar' => 'التفسير: يعتمد التمركز من خلال المكانة العاطفية على تحديد موقع العلامة التجارية من خلال العلاقة العاطفية بينها وبين السوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'أ) مقارنة أسعار المنتجات فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) بناء ارتباط عاطفي بين العميل والعلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تحديد موقع المصنع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مقارنة عدد فروع الشركة بالمنافسين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 181,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن للمكانة العاطفية أن تساعد العلامة التجارية على بناء علاقة مع المستهلك تتجاوز الخصائص الوظيفية للمنتج.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن المكانة العاطفية تعتبر أسلوبًا يعتمد على العلاقة العاطفية مع السوق المستهدف، وبالتالي لا يقتصر التفاعل مع العلامة على خصائص المنتج الوظيفية فقط.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 182,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أيٌّ مما يلي يمثل أحد مزايا استخدام المكانة العاطفية؟',
            'explanation_ar' => 'التفسير: تتضمن المكانة العاطفية على العديد من المزايا، ومنها إمكانية بناء علاقة أقوى مع العملاء وتعزيز ارتباطهم بالعلامة التجارية من خلال الجانب العاطفي.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'أ) إلغاء الحاجة إلى فهم العملاء',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تعزيز ارتباط العملاء بالعلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقليل أهمية العلامة التجارية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) منع الشركة من التميز عن المنافسين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 183,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'ليس من المهم أن تتوافق المكانة التي تختارها العلامة التجارية مع توقعات الجمهور المستهدف.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يجب عند تناول تحديد الموقع الناجح (التمركز في ذهن العميل) فهم السوق المستهدف واحتياجاته ورغباته، لأن المكانة يجب أن تكون ذات صلة بالجمهور الذي تستهدفه العلامة التجارية وتتوافق مع توقعاتهم.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 184,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأساليب التالية يركز على مقارنة المنتج بالمنافسين لتحديد موقعه؟',
            'explanation_ar' => 'التفسير: التمركز عن طريق رسم الخرائط يستخدم لتحديد موقع العلامة أو المنتج مقارنة بالمنافسين، بينما يركز التمركز بالمطابقة على ملاءمة المنافع لاحتياجات السوق المستهدف، ويركز التمركز العاطفي على العلاقة العاطفية.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أ) التمركز عن طريق المطابقة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التمركز عن طريق رسم الخرائط',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) التمركز حسب العلاقة العاطفية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) التسويق غير المباشر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 185,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تتضمن استراتيجية بناء العلامة التجارية سبعة أساليب للتمركز.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث توجد سبعة أساليب ضمن استراتيجية بناء العلامة التجارية، وهي: تميز المنتج، الميزة الرئيسية، مستخدم المنتج، المقارنة مع المنافس، المقارنة مع الفئة، الاستخدام، والارتباط.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 186,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من أساليب استراتيجية بناء العلامة التجارية؟',
            'explanation_ar' => 'التفسير: من ضمن أساليب استراتيجية بناء العلامة التجارية: تمييز المنتج، الميزة الرئيسية، مستخدم المنتج، المقارنة مع المنافس، المقارنة مع الفئة، الاستخدام، والارتباط',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'أ) التمركز حسب السعر فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التمركز حسب حجم الشركة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) المقارنة مع المنافس',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) التمركز حسب عدد الموظفين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 187,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من أساليب استراتيجية بناء العلامة التجارية؟',
            'explanation_ar' => 'التفسير: يعتبر الاستخدام أحد الأساليب السبعة ضمن استراتيجية بناء العلامة التجارية، إلى جانب تميز المنتج، والميزة الرئيسية، ومستخدم المنتج، والمقارنة مع المنافس، والمقارنة مع الفئة، والارتباط.',
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'أ) مقارنة تكلفة الموظفين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) الاستخدام',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) موقع المصنع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) حجم المخزون',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 188,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن يعتمد تحديد تمركز العلامة التجارية على المقارنة مع المنافسين.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث توجد عدة أساليب لتحديد تمركز العلامة التجارية، ومنها المقارنة مع المنافس، والمقارنة مع الفئة، والاستخدام والارتباط وغيرها.',
            'is_multi_correct' => false,
            'order_index' => 33,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 189,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الأسلوب الذي يعتمد على مطابقة المنافع الفريدة للمنتج مع احتياجات ورغبات الشريحة المستهدفة؟',
            'explanation_ar' => 'التفسير: يعتمد التمركز عن طريق المطابقة على ربط المنافع أو المزايا التنافسية الفريدة للمنتج باحتياجات ورغبات السوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 34,
            'options' => [
                [
                    'option_text_ar' => 'أ) التمركز عن طريق رسم الخرائط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التمركز عن طريق المطابقة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) التمركز حسب العلاقة العاطفية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) التمركز حسب السعر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_07.php
```php
<?php

// بيانات الوحدة رقم 7: استراتيجية التسويق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 30 سؤال
// المحتوى مطابق تمامًا للوورد، تم فقط تنظيف 3 مسافات مزدوجة بسيطة في التفسيرات (أسئلة 190، 196، 199)
return [
    'unit_number' => 7,
    'title_ar' => 'استراتيجية التسويق',
    'order_index' => 7,
    'questions' => [
        [
            'original_number' => 190,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هو الهدف من إستراتيجية السوق؟',
            'explanation_ar' => 'التفسير: الاستراتيجية التسويقية الناجحة توازن بين تحقيق الأهداف المالية (المبيعات) وبناء علاقة مستدامة (رضا العملاء)، راجع الوحدة 7: إستراتيجية التسويق، ص 124',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'أ) خفض نسبة المبيعات وكسب رضا العملاء.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) زيادة نسبة المبيعات واكتساب رضا العملاء.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) زيادة رضا العملاء وخفض نسبة المبيعات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) خفض رضا العملاء وزيادة المبيعات.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 191,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الإستراتيجيات التسويقية التالية تستخدمها الشركات لمهاجمة منتجك أو شركتك، في محاولةٍ لتشويه سمعتك أو إثبات أن منتجك مُدَّعٍ أو مُزيَّف؟',
            'explanation_ar' => 'التفسير: من ضمن الاستراتيجيات التنافسية: مهاجمة المنافس أو التشكيك في منتجاته، الوحدة 7: استراتيجية التسويق، ص131',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'أ) الاستراتيجية التنافسية.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) إستراتيجية التدهور.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) إستراتيجية الجودة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) إستراتيجية الترويج.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 192,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي لا يجب فعله في السويق؟',
            'explanation_ar' => 'راجع الوحدة 7، إستراتيجية التسويق ،ص : 123.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'أ) تعرف على منافسيك.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) إخبار العملاء لم ينبغي عليهم استخدام المنتج.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) التعتيم على ضعف الشركة وعدم القدرة على التحسين.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 193,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي هو إحدى الخطوات الأربعة لوضع الاستراتيجيات التسويقية؟',
            'explanation_ar' => 'راجع الوحدة 7: استراتيجية التسويق ، موضوع خطوات تطوير إستراتيجيات السوق، ص131.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'أ) استعراض مشكلاتك وفرصك.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) استعراض السوق الذي تستهدفه والأهداف التسويقية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) وضع الاستراتيجية الخاصة بك.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مراجعة الاستراتيجية الخاصة بك لتحديد ميزتك.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'هـ) كل ما سبق ذكره.',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 194,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي استراتيجية التسويق؟',
            'explanation_ar' => 'التفسير: إستراتيجية التسويق هي مجموعة من الإجراءات التي تركز على أفضل الفرص لزيادة المبيعات وتحقيق ميزة (أفضلية) تنافسية قابلة للاستمرار، راجع الوحدة 7: استراتيجية التسويق، بداية الموضوع: صفحة 131.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'أ) مجموعة من الإجراءات التي من شأنها أن تسمح للمؤسسة بالتركيز على أفضل الفرص لزيادة نسبة مبيعاتها وتحقيق أفضلية تنافسية قابلة للاستمرار.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) مجموعة من الإجراءات التي من شأنها أن تسمح للمؤسسة بالتركيز على أفضل الفرص لزيادة نسبة مبيعاتها وتحقيق أفضلية تنافسية غير قابلة للاستمرار.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) مجموعة من الإجراءات التي من شأنها أن تسمح للمؤسسة بالتركيز على أفضل الفرص لتخفيض نسبة مبيعاتها وتحقيق أفضلية تنافسية قابلة للاستمرار.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) مجموعة من الإجراءات التي من شأنها أن تسمح للمؤسسة بالتركيز على أفضل الفرص لتخفيض نسبة مبيعاتها وتحقيق أفضلية تنافسية غير قابلة للاستمرار.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 195,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يمكن اعتبارها استراتيجيات جيدة لإطلاع العملاء المحتملين على عملك، منتجاتك، و/أو خدماتك؟',
            'explanation_ar' => 'الأربع خيارات الأولى هي وسائل ترويجية وتسويقية فعلية لزيادة الوعي بالمنتج أو الخدمة، بينما الخيار الأخير ليس استراتيجية تسويقية. راجع الوحدة 7: استراتيجية التسويق، موضوع، إستراتيجيات الترويج،ص:136.',
            'is_multi_correct' => true,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'أ) إرسال رسائل شخصية للمؤثرين أو الصحفيين أو المحللين الذين يمكن أن يكتبوا خبرًا عنك في شبكة العلاقات الخاصة بك.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) تنظيم فعالية في شركتك حيث سيستمتع الضيوف بشيء مميز أو مثير للاهتمام.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) عبر محطة إذاعية محلية مع توافق صحيح يمكنك من استهداف عملائك المحتملين بهذا الإعلان.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) إرسال بطاقات تعريف للأعمال المجاورة.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ه) تحديد موعد للأحد أو يوم منتصف الشهر.',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 196,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يعد من الخطوات الأربع لوضع الاستراتيجيات التسويقية؟ (اذكر اكثر من إجابة)',
            'explanation_ar' => 'التفسير: تعتبر الخطوات الأربع الأولى هي خطوات وضع الإستراتيجيات التسويقية، أما تطوير الأساليب التنافسية فهو جزء من تنفيذ أو اختيار الاستراتيجية التنافسية، وليس إحدى الخطوات الأربع الأساسية لوضع الاستراتيجية التسويقية، راجع الوحدة السابعة: إستراتيجيات التسويق، درس خطوات تطوير إستراتيجيات التسويق، ص: 138.',
            'is_multi_correct' => true,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'أ) استعراض مشكلاتك وفرصك.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) استعراض السوق التي تستهدفها والأهداف التسويقية.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) مراجعة الاستراتيجية الخاصة بك لتحديد تمركزك.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) وضع الاستراتيجيات الخاصة بك.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ه) تطوير الأساليب التنافسية الخاصة',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 197,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'إستراتيجية التسويق هي أساسًا خطة تمكّن المنظمة من التركيز على أفضل الفرص لزيادة المبيعات والحصول على ميزة تنافسية مستدامة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة حيث تمثل استراتيجية التسويق أساسًا خطة تساعد المنظمة على التركيز على أفضل الفرص لزيادة المبيعات، مع تحقيق ميزة تنافسية مستدامة.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 198,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد من أساليب تمييز المنتج عن المنافسين؟',
            'explanation_ar' => 'التفسير: إن تمييز المنتج يعتمد على التركيز على عنصر أو خاصية فريدة تساعد المنتج على التميز عن المنافسين، مثل الجودة أو خصائص معينة في المنتج.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'أ) خفض جودة المنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التركيز على عنصر أو خاصية فريدة في المنتج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تجاهل احتياجات العملاء',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تقليل استخدامات المنتج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 199,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمكن استخدامه لتحديد استراتيجية المنتج وفقًا للمستخدم؟',
            'explanation_ar' => 'التفسير: من ضمن أساليب التعامل مع المنتج وتمييزه مستخدمي المنتج، حيث يمكن أن يكون التركيز في الاستراتيجية على الفئة التي تستخدم المنتج، وما يناسب احتياجاتها وخصائصها.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد المنتج حسب سعر المنافس',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) تحديد المنتج حسب موقع الشركة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تحديد المنتج حسب مستخدمي المنتج',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د) تحديد المنتج حسب عدد الموظفين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 200,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => '«الحصة السوقية» تشير إلى:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'أ) نسبة مبيعات الشركة من إجمالي مبيعات السوق',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) عدد موظفي قسم التسويق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) قيمة المخزون',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عدد الفروع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 201,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يجب مراقبة الاستراتيجيات التسويقية بعناية للحفاظ على التميز وتجنّب التقليد من المنافسين.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 202,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'الغرض من الاستراتيجية التسويقية هو:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحقيق أهداف التسويق وزيادة الأرباح والحصة السوقية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) زيادة عدد الاجتماعات',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تقليل التواصل مع العملاء',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تجاهل المنافسين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 203,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من الموضوعات التي يمكن أن تعتمد عليها المؤسسة عند تطوير استراتيجية التسويق؟',
            'explanation_ar' => 'التفسير: تركز استراتيجية التسويق على تمكين المنظمة من التركيز على أفضل الفرص بهدف زيادة المبيعات وتحقيق ميزة تنافسية مستدامة.',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'أ) تحديد فرص السوق المناسبة.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التركيز على أفضل الفرص المتاحة لزيادة المبيعات.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقليل القدرة على المنافسة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) تجاهل احتياجات السوق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 204,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'وسائل الإعلام المحلية لا تعتبر إحدى الوسائل للوصول إلى العملاء المحتملين والتعريف بالعمل.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث توجد مجموعة من الوسائل يمكن استخدامها ضمن خطة التسويق، ومنها الاستفادة من وسائل الإعلام المحلية للوصول إلى الجمهور المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 205,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل أسلوبًا مناسبًا لبناء الحصة السوقية؟',
            'explanation_ar' => 'التفسير: يرتبط بناء الحصة السوقية باستخدام استراتيجيات تساعد المؤسسة على جذب العملاء والمحافظة عليهم، ومن ذلك التركيز على عناصر مثل الجودة والتمييز.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'أ) تجاهل احتياجات العملاء.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التركيز على جودة المنتج وتمييزه عن المنافسين.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) تقليل قيمة المنتج لدى العملاء.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) الابتعاد عن دراسة السوق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 206,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن يساعد اكتشاف فرصة جديدة في السوق المؤسسة على زيادة حصتها السوقية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يمكن من خلال التعرف على الفرص التي يمكن أن تتيح للمؤسسة الوصول إلى عملاء أو أسواق جديدة زيادة حصة الشركة السوقية.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 207,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كانت المؤسسة تتبع استراتيجية تعتمد على انخفاض التكلفة، فما الأسلوب السعري الأكثر توافقًا معها؟',
            'explanation_ar' => 'التفسير: ترتبط استراتيجية التكلفة المنخفضة وبين إمكانية استخدام أسعار منخفضة لجذب العملاء، بينما قد تسمح التكلفة العالية باستراتيجية سعرية مختلفة.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقديم أسعار منخفضة نسبيًا لجذب العملاء.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) رفع الأسعار إلى أعلى مستوى ممكن.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) تجاهل تكاليف الإنتاج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) استخدام السعر دون النظر إلى السوق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 208,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما العامل الذي يجب على المؤسسة مراعاته عند اختيار استراتيجية التسعير؟',
            'explanation_ar' => 'التفسير: إن اختيار استراتيجية التسعير يرتبط بوضع المنتج في السوق وبمستوى تكلفته، ولذلك تختلف الاستراتيجية وفقًا للظروف السوقية والتكلفة.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'أ) عدد موظفي المؤسسة فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) مستوى تكلفة المنتج ووضعه في السوق.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) مساحة مقر المؤسسة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عدد اجتماعات الإدارة.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 209,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن تلجأ المؤسسة إلى استراتيجية مطابقة السعر عندما يكون هدفها تقديم سعر يتوافق مع أسعار المنافسين.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تعد إستراتيجية "مطابقة السعر" إحدى استراتيجيات التسعير، بحيث يتم تقديم السعر بصورة تتناسب مع الأسعار السائدة لدى المنافسين.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 210,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'متى تلجأ الشركات إلى الاستراتيجيات التنافسية ؟',
            'explanation_ar' => 'التفسير: تستخدم الاستراتيجيات التنافسية عندما تواجه الشركة ظروفًا تنافسية مثل تراجع حصتها السوقية أو اشتداد المنافسة.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'أ) عندما لا توجد أي منافسة في السوق.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) عندما تواجه تراجعًا في حصتها السوقية أو منافسة شديدة.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) عندما تتوقف عن بيع منتجاتها.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) عندما لا يكون لديها عملاء.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 211,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل أحد الاتجاهات التي يمكن أن تتخذها المؤسسة عند التعامل مع المنافسة؟',
            'explanation_ar' => 'التفسير: من ضمن الاستراتيجيات التنافسية توجه "الدفاع عن الحصة السوقية" باعتباره أحد الأساليب التي يمكن أن تستخدمها المؤسسة في مواجهة المنافسة.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'الدفاع عن حصتها السوقية.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إلغاء دراسة المنافسين.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'خفض جودة المنتج عمدًا.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوقف عن متابعة السوق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 212,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن تكون مواجهة المنافسة سببًا في قيام المؤسسة بإعادة النظر في استراتيجيتها التسويقية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن التغير في الحصة السوقية واشتداد المنافسة قد يدفعان المؤسسة إلى مراجعة استراتيجيتها واتخاذ إجراءات تنافسية مناسبة.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 213,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الهدف من استخدام استراتيجية الترويج عند نقطة البيع (POS)؟',
            'explanation_ar' => 'التفسير: يمكن استخدام أدوات "نقطة البيع (Point-of-Sale – POS) لجذب انتباه العملاء وتشجيعهم على اتخاذ قرار الشراء.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'زيادة تكاليف التخزين فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جذب انتباه العملاء وتشجيعهم على الشراء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'منع العملاء من رؤية المنتج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقليل التواصل مع العملاء.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 214,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تقتصر استراتيجية الترويج على الإعلان فقط ولا تشمل عروض الترويج أو وسائل أخرى للتأثير في العملاء.',
            'explanation_ar' => 'التفسير: العبارة خطأ، حيث توجد العديد من الوسائل التي تستخدمها إستراتيجية الترويج مثل الإعلان، وعروض المبيعات، والتسويق المباشر، والعلاقات العامة.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 215,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما المقصود باستراتيجية عروض الترويج؟',
            'explanation_ar' => 'التفسير: تركز استراتيجية عروض الترويج على العروض المقدمة للعملاء بهدف دعم المبيعات وزيادة الإقبال على المنتج أو الخدمة.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'استراتيجية تهدف إلى رفع تكلفة المنتج فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'استراتيجية تهدف إلى زيادة المبيعات من خلال العروض الترويجية المقدمة للعملاء.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'استراتيجية تهدف إلى تقليل عدد العملاء.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'استراتيجية تهدف إلى إيقاف الإعلان.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 216,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا ينبغي أن تتوافق استراتيجية الإعلان مع خطة التسويق الشاملة للمؤسسة.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تستخدم استراتيجية الإعلان في توجيه خطة التسويق الشاملة، ويجب أن يكون الإعلان متوافقًا مع أهداف المؤسسة وجهودها التسويقية.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 217,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يأتي أولًا ضمن خطوات تطوير استراتيجيات السوق؟',
            'explanation_ar' => 'التفسير: تبدأ خطوات تطوير استراتيجية السوق بمراجعة المشكلات والفرص التي تواجهها المؤسسة، ثم الانتقال إلى مراجعة السوق المستهدف والأهداف وتطوير الاستراتيجية.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'مراجعة مشكلاتك وفرصك التي تواجهها.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تحديد سعر المنتج فقط.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اختيار قناة توزيع جديدة مباشرة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إطلاق الإعلان قبل تحليل السوق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 218,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تطوير استراتيجية السوق يتم دون الحاجة إلى مراجعة السوق المستهدف أو الأهداف التسويقية.',
            'explanation_ar' => 'التفسير: العبارة خطأ، حيث تتضمن خطوات تطوير استراتيجيات السوق على مراجعة السوق المستهدف والأهداف التسويقية ضمن عملية تطوير الاستراتيجية؛ لذلك لا يمكن تجاهلها.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 219,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تتضمن استراتيجية التسويق استراتيجيات تتعلق بالحصة السوقية والمنافسة والتسعير والترويج.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تتضمن استراتيجية التسويق استراتيجيات الحصة السوقية والاستراتيجيات التنافسية والتسعير والترويج والإعلان.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_08.php
```php
<?php

// بيانات الوحدة رقم 8: الاتصال
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 29 سؤال
return [
    'unit_number' => 8,
    'title_ar' => 'الاتصال',
    'order_index' => 8,
    'questions' => [
        [
            'original_number' => 220,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي أنواع الاتصالات التي تُطبق عليها استراتيجيات تسويق السلع؟',
            'explanation_ar' => 'نقاط بيع البضائع هي نوع الاتصالات الذي تطبق عليه استراتيجيات تسويق السلع، والتي تعتبر نوع من أنواع التسويق المباشر للعميل دون وسيط. الوحدة 8 – الاتصال، ص 151، و156.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'تقنيات التسويق التقليدية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اتصالات التجزئة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نقاط بيع البضائع',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الاتصالات التنافسية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 221,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'حدد الأهداف التواصلية ممَّا يلي ؟',
            'explanation_ar' => 'تشمل أهداف الاتصال 4 أهداف؛ هي: الإعلام، الإقناع، الطلب، بناء العلاقات ، راجع الوحدة 8: الاتصال، موضوع: أهداف الاتصال، ص 144.',
            'is_multi_correct' => true,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'الإعلام',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإقناع',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الطلب',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'بناء العلاقات',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'لا شيء مما سبق',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 222,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي لا يجب فعله في التواصل؟',
            'explanation_ar' => 'راجع الوحدة 8، الاتصال ، ص 144.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'تحديد رغبات عميلك ومعرفة احتياجاته',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إنشاء رسالة محددة لعملائك',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'وضع الاستراتيجيات الخاصة بك',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لا شيء مما سبق ذكره',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 223,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأهداف التالية هي أهداف تواصلية؟',
            'explanation_ar' => 'تعتبر أهداف الاتصال هي: الإعلام، الإقناع، الطلب، بناء العلاقات، راجع الوحدة 8: الاتصال، درس أهداف الاتصال، ص: 153.',
            'is_multi_correct' => true,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'التلاعب',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الإعلام',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإقناع',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'المواجهة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الطلب',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'بناء العلاقات',
                    'order_index' => 6,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإغفال',
                    'order_index' => 7,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 224,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي لا يجب فعله في التواصل؟',
            'explanation_ar' => 'التخمين ليس من الممارسات الصحيحة في الاتصال؛ يجب الاعتماد على المعلومات والبحث، راجع الوحدة 8 – الاتصال، ص: 143.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'معرفة احتياجات ورغبات عميلك.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إنشاء رسالة محددة لعملائك.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تخمين ما يرغب فيه عملاؤك وعملاؤك المحتملون والمنافسون.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'وضع الاستراتيجيات الخاصة بك.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 225,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تُركز العلاقات العامة بشكل أساسي على الشراء المباشر للمساحات الإعلانية المدفوعة.',
            'explanation_ar' => 'التفسير: العبارة خطأ، حيث تعتمد العلاقات العامة على بناء صورة ذهنية إيجابية وتواصل غير مدفوع الأجر مباشرة، بينما الإعلان هو الذي يعتمد على شراء المساحات الإعلامية المدفوعة. راجع الوحدة 8 – الاتصال، ص: 143 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 226,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'المبيعات الشخصية تُعد أكثر أدوات المزيج الترويجي تكلفة لكل اتصال ولكنها الأكثر فاعلية في إقناع العميل.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تتطلب المبيعات الشخصية تفاعلاً مباشرًا بين البائع والعميل، مما يرفع تكلفة الاتصال الواحد لكنه يحقق أعلى نسبة إقناع وتكيف مع احتياجات العميل. راجع الوحدة 8 – الاتصال، ص: 143 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 227,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يُقصد بالترويج الشامل للعلامة التجارية لمنتج أو خدمة عبر عدة وسائط إعلامية مصطلح ________.',
            'explanation_ar' => 'التفسير: الحملة الإعلانية هي سلسلة من الرسائل الإعلانية المنسقة الموجهة عبر وسائل إعلام متعددة لتعزيز العلامة التجارية أو الخدمة. راجع الوحدة 8 – الاتصال، ص: 143 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'المبيعات الشخصية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الحملة الإعلانية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'العلاقات العامة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير النفسي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 228,
            'level' => 'hard',
            'question_type' => 'true_false',
            'text_ar' => 'تُعرف العروض الترويجية الموجهة للمستهلك النهائي باسم عروض التجارة (Trade Promotions).',
            'explanation_ar' => 'التفسير: العبارة خطأ، حيث أن العروض الموجهة للمستهلك النهائي تُسمى عروض المستهلك الترويجية (Consumer Promotions)، بينما تُوجه عروض التجارة للموزعين والوسطاء. راجع الوحدة 8 – الاتصال، ص: 143 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 229,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الوسائل التالية يُعد مثالاً على أدوات ترويج المبيعات؟',
            'explanation_ar' => 'التفسير: تُعد الكوبونات والحسومات والعينات المجانية من الأدوات الرئيسية لترويج المبيعات لحث المستهلك على الشراء الفوري. راجع الوحدة 8 – الاتصال، ص: 143 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'الإعلانات التلفزيونية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الرعاية الرياضية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'قسيمة التخفيض (الكوبون)',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'المؤتمرات الصحفية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 230,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'التسويق المباشر يعتمد على وجود العديد من الوسطاء مثل تجار الجملة وتجار التجزئة لنقل السلع للمستهلك.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن التسويق المباشر (Direct Marketing) يبيع المنتجات مباشرة من المنتج إلى المستهلك النهائي دون الاستعانة بوسطاء تجاريين.',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 231,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'عناصر الترويج (المزيج الترويجي) تشمل:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'الإعلان والبيع الشخصي والعلاقات العامة وترويج المبيعات',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الشراء والتخزين والنقل',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير والتوزيع فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التصنيع والتغليف',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 232,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => '«البيع الشخصي» كعنصر ترويجي يعتمد على:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'التفاعل المباشر بين البائع والعميل',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإعلانات التلفزيونية فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المنشورات الصحفية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لوحات الطرق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 233,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'العلاقات العامة لا تعتبر أحد عناصر المزيج الترويجي.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 234,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الذي يجب أن تتوافق معه خطة الاتصالات التسويقية؟',
            'explanation_ar' => 'التفسير: خطة الاتصالات يجب أن تكون متوافقة مع الاستراتيجية التسويقية والأهداف التسويقية، وأن تعكس الجمهور المستهدف وتوجه الرسائل بصورة مناسبة.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'سياسة التوظيف فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الاستراتيجية التسويقية والأهداف التسويقية.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'خطة الإنتاج فقط.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نظام المحاسبة.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 235,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يحتاج المسوق إلى معرفة العملاء الحاليين والمحتملين قبل إعداد خطة الاتصالات.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يجب معرفة العملاء الحاليين والمحتملين، وما يحبونه وما يكرهونه، وخصائصهم، حتى تتمكن المؤسسة من التواصل معهم بفعالية.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 236,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأسئلة التالية يجب أن تجيب عنه المؤسسة قبل إعداد خطة الاتصالات؟',
            'explanation_ar' => 'التفسير: لابد من طرح سؤالًا أساسيًا عند إعداد خطة الاتصالات، وهو: ما هي أفضل طريقة للتواصل مع العملاء؟ هل تتمثل في تفضيلات العملاء للبريد الإلكتروني ووسائل التواصل الاجتماعي أو وسائل الاتصال المادية.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'كم عدد موظفي الشركة؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ما أفضل طريقة للتواصل مع العملاء؟',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ما مساحة مقر الشركة؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كم عدد سيارات الشركة؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 237,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يجب على المؤسسة مراعاته عند اختيار أداة الاتصال المناسبة؟',
            'explanation_ar' => 'التفسير: بعد تحديد الرسالة، تنتقل المؤسسة إلى تحديد الأدوات والمنهجيات المناسبة لنقلها، مع مراعاة الميزانية المتاحة ومتى سيتم استخدام الأداة أو الأدوات.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'عدد فروع المنافسين.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الميزانية المتاحة وتوقيت استخدام الأداة.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'مساحة المستودعات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عدد المنتجات القديمة.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 238,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يجب أن تتضمن خطة الاتصالات التسويقية أداة اتصال واحدة فقط مهما اختلفت طبيعة العملاء',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث توجد عدة أدوات للاتصال يمكن استخدامها وفقًا لطبيعة الجمهور والرسالة والميزانية، ومنها العلاقات العامة والإعلان والموقع الإلكتروني والندوات والتسويق المباشر.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 239,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من أدوات الاتصال ؟',
            'explanation_ar' => 'التفسير: يعتبر الموقع الإلكتروني من ضمن أدوات الاتصال التي تستخدمها الشركات للتواصل مع العملاء والعملاء المحتملين، إلى جانب العلاقات العامة والإعلان والندوات والتسويق المباشر.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'إدارة المخزون.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التخزين.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الموقع الإلكتروني.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التصنيع.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 240,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الوظيفة الأساسية للعلاقات العامة؟',
            'explanation_ar' => 'التفسير: تعرف العلاقات العامة بأنها شكل من أشكال الاتصال يهدف إلى بناء وإدارة العلاقات بين الشركة والجمهور، كما تركز على القضايا والقيم واستخدام وسائل متعددة لنشر المعلومات.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'بيع المنتج مباشرة لكل عميل.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'بناء وإدارة العلاقات بين الشركة والجمهور.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تحديد أسعار المنتجات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إدارة المخزون.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 241,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تساعد العلاقات العامة في بناء صورة إيجابية للشركة وتعزيز التواصل مع مختلف الجهات المعنية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن العلاقات العامة تساعد في بناء صورة إيجابية للشركة وتعزز التواصل مع مختلف الجهات المعنية.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 242,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'يعرف الإعلان بـ',
            'explanation_ar' => 'التفسير: يعرف الإعلان بأنه رسالة مدفوعة تهدف إلى التأثير على سلوك الشراء والتفكير في السوق، ويتم بثها من قبل الشركات والمنظمات بوسائل متعددة.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'رسالة مجانية هدفها إدارة العلاقات فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'رسالة مدفوعة تهدف إلى التأثير على سلوك الشراء والتفكير في السوق.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'وسيلة لتخزين المنتجات.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'وسيلة لإدارة الموظفين.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 243,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يعد من خصائص التسويق المباشر؟',
            'explanation_ar' => 'التفسير: يعرف التسويق المباشر بأنه أسلوب ترويجي يتضمن العرض المباشر للمنتج أو الخدمة إلى العملاء أو العملاء المحتملين بدون وسيط.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'يعتمد بالضرورة على وجود وسيط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'يقدم المنتج أو الخدمة مباشرة إلى العملاء أو العملاء المحتملين دون وسيط.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'يهدف فقط إلى بناء صورة الشركة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لا يسمح بقياس استجابة العملاء.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 244,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يهدف التسويق المباشر إلى توليد استجابة فورية من الأفراد المستهدفين.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن التسويق المباشر يهدف إلى توليد استجابة فورية من الأفراد المستهدفين، مع إمكانية تحليل كيفية استجابتهم للعروض الترويجية.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 245,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد استجابة نموذجية للتسويق المباشر؟',
            'explanation_ar' => 'التفسير: تشمل الاستجابات النموذجية للتسويق المباشر: الشراء، أو طلب مزيد من المعلومات، أو الإحالة إلى آخرين.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'تجاهل العرض.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الشراء أو طلب مزيد من المعلومات.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إيقاف التواصل مع الشركة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تغيير موقع الشركة.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 246,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد مثالًا على وسائل التسويق المباشر؟',
            'explanation_ar' => 'التفسير: توجد عدة وسائل للتسويق المباشر، منها الطلبات البريدية، والموقع الإلكتروني التي تشجع على الشراء مباشرة، والبيع من الباب إلى الباب، والتسويق عبر الهاتف، والتسويق عبر البريد الإلكتروني.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'الإعلان.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العلاقات العامة.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسويق عبر البريد الإلكتروني.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ترويج المبيعات (التخفيضات والكوبونات.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 247,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن استخدام الندوات لتقديم المعلومات والتثقيف من خلال مشاركة الخبراء والمختصين وإجراء المناقشات.',
            'explanation_ar' => 'التفسير: تعتبر الندوات وسيلة فعالة لتوجيه الجمهور نحو العمل وتقديم المعلومات والتثقيف من خلال مشاركة الخبراء والمختصين وإجراء المناقشات، كما يمكن أن تساعد في جذب جمهور مهتم وبناء العلاقات معه.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 248,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'لماذا قد تحتاج المنتجات الجديدة أو غير المعروفة إلى تخصيص ميزانية ترويجية أكبر؟',
            'explanation_ar' => 'التفسير: من ضمن اعتبارات ميزانيات الاتصالات أن المنتجات الجديدة أو غير المعروفة قد تحتاج إلى جذب العملاء وزيادة الوعي بها، ولذلك يمكن تخصيص ميزانية ترويجية أكبر لها.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'لأنها لا تحتاج إلى تعريف العملاء بها.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لأنها لا تتأثر بسلوك العملاء.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لجذب العملاء وزيادة الوعي بالمنتج.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'لأنها تعتمد فقط على البيع الشخصي.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_09.php
```php
<?php

// بيانات الوحدة رقم 9: تخطيط المنتج
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 32 سؤال
return [
    'unit_number' => 9,
    'title_ar' => 'تخطيط المنتج',
    'order_index' => 9,
    'questions' => [
        [
            'original_number' => 249,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يعد إحدى النقاط الرئيسية الأربعة المتعلقة بالتوضيب (التعبئة والتغليف)؟',
            'explanation_ar' => 'التغليف والتوضيب يعتمد على 4 عناصر رئيسية منها الحماية، والترويج، والسهولة، والجاذبية/المظهر لجذب المستهلك. راجع الوحدة 9: تخطيط المنتج، موضوع ، عرض المنتج/ التوضيب ص (167 وما بعدها)',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'التسعير',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العلامة التجارية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العمالة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الجاذبية/المظهر',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 250,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من النقاط التالية تؤخذ بعين الاعتبار عند النظر إلى التوافق على التصميم؟',
            'explanation_ar' => 'راجع الوحدة 9: تخطيط المنتج ، درس تصميم المنتج ص ، 162',
            'is_multi_correct' => true,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'احتياجات المستهلك',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'توفر المنتج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'أنظمة المستهلك (أنظمة القياس )',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'أنظمة البث',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'القضايا البيئية',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'لا شيء من الإجابات المدرجة',
                    'order_index' => 6,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 251,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الشركات التالية تستخدم اسم المؤسس لتمثيل منتج الشركة؟',
            'explanation_ar' => 'سكوندريا فيراري سميت باسم مؤسسها أنزو فيراري (Enzo Ferrari).، الوحدة 9: تخطيط المنتج، درس: تسمية المنتج، ص 163.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'تارغت (Target)',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ووكمان (Walkman)',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كرسبي كريم (Krispy Kreme)',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'فيراري (Ferrari)',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 252,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي هي من أنواع الأسماء المستخدمة عند تسمية الكلمة التجارية؟',
            'explanation_ar' => 'من أهم أنواع الأسماء المستخدمة عند تسمية الكلمة التجارية هي: عشوائي، خيالي، وصفي، إيحائي، راجع الوحدة 9: تخطيط المنتج، درس: تقنيات تسمية المنتج، ص: 163.',
            'is_multi_correct' => true,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'معياري',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عشوائي',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'خيالي',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'وجودي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'وصفي',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'دلالي',
                    'order_index' => 6,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيحائي',
                    'order_index' => 7,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 253,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من النقاط التالية تعتبر أنواع مختلفة من عرض تقديم المنتج؟',
            'explanation_ar' => 'التمهيدي، والشامل، والتحديثي، وتدريب فريق المبيعات، هذه هي الأنواع المذكورة لعرض تقديم المنتج، بينما الختامي وغير الشامل غير واردين ضمن الأنواع .راجع الوحدة 9 : تخطيط المنتج، درس: عرض المنتج، ص : 167.',
            'is_multi_correct' => true,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'الختامي',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التحديثي',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الشامل',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تدريب فريق المبيعات',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'غير الشامل',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التمهيدي',
                    'order_index' => 6,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 254,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يعد من أنواع الأسماء المستخدمة عند تسمية العلامة التجارية؟',
            'explanation_ar' => 'تشمل أنواع تسمية المنتجات : وصفية، إيحائية، عشوائية، خيالية ، درس تسمية المنتج، ص 163-165.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'معياري.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'وجودي.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'دلالي.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لا شيء مما سبق ذكره أعلاه.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 255,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الأغراض الثلاثة الأكثر شيوعا للعرض التقديمي؟',
            'explanation_ar' => 'تعد أكثر أغراض العرض التقديمي شيوعًا هي: التعليم، الإقناع، والتدريب، راجع الوحدة 9: تخطيط المنتج، درس أنواع العروض التقديمية للمنتجات، ص : 171.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'التعليم والردع والتدريب.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التعليم والإقناع والتدريب.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التعليم والغرض والتدريب.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التعليم والمركز والتدريب.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 256,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي جوانب تخطيط المنتج؟',
            'explanation_ar' => 'تشمل جوانب تخطيط المنتج أ، وب ، وج، ود ، راجع الوحدة 9، الوحدة 9: تخطيط المنتج، موضوع: تخطيط المنتج، ص: 159.',
            'is_multi_correct' => true,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'أ- تسمية المنتج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب - عرض واستخدام المنتج',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'جـ- احتياجات العملاء',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'د - تصميم المنتج',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب و ج',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 257,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الشركات التالية يستخدم كلمة مختصرة للاسم؟',
            'explanation_ar' => 'راجع الوحدة، 9: تخطيط المنتج، درس تسمية المنتج، 163 .',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'كوكا كولا',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'مرسيدس',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'أبل',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لا شيء مما سبق ذكره',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 258,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان هدف الشركة من تصميم المنتج هو تحقيق الأرباح، فأي من التالي يمثل المبدأ الذي يجب أن يراعيه تصميم المنتج ؟',
            'explanation_ar' => 'التفسير: تصميم المنتج الناجح لا يعتمد على جانب واحد فقط؛ فإذا كان الهدف هو جني الأرباح من تصميم المنتج، فيجب تحقيق توازن بين تلبية احتياجات العملاء، والتكاليف، والربحية. كما أن التصميم الجيد يمكن أن يكون عاملًا مهمًا في نجاح استراتيجية التسويق.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'التركيز على خفض تكاليف الإنتاج فقط، حتى لو لم يلبِّ المنتج احتياجات العملاء.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التركيز على تلبية احتياجات العملاء فقط، بغض النظر عن التكاليف والربحية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحقيق توازن بين احتياجات العملاء والتكاليف والربحية.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التركيز على التصميم الجمالي للمنتج باعتباره العامل الوحيد لنجاحه.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 259,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الترتيب الصحيح لمراحل دورة حياة المنتج؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'التقديم ← النمو ← النضج ← الانحدار',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'النمو ← التقديم ← الانحدار ← النضج',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النضج ← النمو ← التقديم ← الانحدار',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الانحدار ← النضج ← النمو ← التقديم',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 260,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'في أي مرحلة من دورة حياة المنتج تكون الأرباح عادةً في أعلى مستوياتها ويشتد التقليد من المنافسين؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'النضج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التقديم',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النمو',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الانحدار',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 261,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'مرحلة «الانحدار» في دورة حياة المنتج تتميز بـ:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'تقلّص السوق وانخفاض الأرباح',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'أعلى معدلات النمو',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إطلاق المنتج لأول مرة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'غياب المنافسة تماماً',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 262,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'خلال مرحلة الانحدار، تلجأ الشركات غالباً إلى استراتيجيات مثل:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'التذكير والعروض للحفاظ على الربحية',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'رفع الأسعار بشكل حاد',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيقاف كل أنشطة التسويق فوراً',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'زيادة الإنتاج بلا حدود',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 263,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => '«تطوير المنتج» قبل طرحه يهدف إلى:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'التأكد من أن المنتج يعمل بشكل صحيح ويتوافق مع الاحتياجات والمواصفات',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'رفع سعره فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إخفاء عيوبه عن العميل',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إلغاء أبحاث السوق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 264,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الهدف الأساسي من تخطيط المنتج؟',
            'explanation_ar' => 'التفسير: يهدف تخطيط المنتج إلى تطوير المنتجات واستراتيجيات السوق بما يلبي أو يتجاوز احتياجات العملاء ويتوافق مع أهداف الشركة.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'التركيز على زيادة الإنتاج فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تطوير المنتجات واستراتيجيات السوق التي تلبي أو تتجاوز احتياجات العملاء وأهداف الشركة.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقليل عدد المنتجات الموجودة في السوق.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التركيز على تصميم المنتج دون دراسة العملاء.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 265,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يجب أن يكون تصميم المنتج متوافقًا مع أهداف الشركة بالإضافة إلى احتياجات وتوقعات العملاء.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن تصميم المنتج ينبغي أن يلبي احتياجات وتوقعات العملاء، وأن يتماشى كذلك مع أهداف الشركة.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 266,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان المنتج يحقق احتياجات العملاء لكنه مرتفع التكلفة بصورة تجعل تحقيق الربح صعبًا، فما الجانب الذي لم يتحقق بصورة متوازنة؟',
            'explanation_ar' => 'التفسير: حيث نجاح تصميم المنتج، خصوصًا إذا كان الهدف تحقيق الأرباح، يتطلب تحقيق توازن بين احتياجات العملاء والتكاليف والربحية.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'احتياجات العملاء فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوازن بين احتياجات العملاء والتكاليف والربحية.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'اسم المنتج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عرض المنتج فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 267,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية يجب مراعاتها عند تصميم المنتج؟',
            'explanation_ar' => 'التفسير: توجد عدة عوامل مرتبطة بتصميم المنتج، ومنها التصميم الجمالي، والوظائف، والمواد المستخدمة، والتجربة، والتكلفة، وغيرها.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'السعر فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اسم الشركة فقط.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الوظائف والمواد المستخدمة والتصميم الجمالي والتكلفة.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'عدد منافذ التوزيع فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 268,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تقتصر تفضيلات العملاء على معرفة العملاء الرئيسيين فقط، ولا تشمل معرفة ما يهم هؤلاء العملاء أو توقعاتهم.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تتطلب دراسة تفضيلات العملاء تحديد العملاء الرئيسيين، وفهم ما يهمهم، ومعرفة توقعاتهم احتياجاتهم، ثم استخدام هذه المعلومات في تطوير المنتج.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 269,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الذي يمكن أن يساعد المؤسسة في الحفاظ على عملائها الحاليين واكتساب عملاء جدد؟',
            'explanation_ar' => 'التفسير: يمكن أن يكونا كل من: الابتكار والتميز في تصميم المنتج مفتاحًا للنجاح، وأن المنتج الذي يلبي احتياجات العملاء ويقدم قيمة إضافية يساعد في تحقيق النجاح والحفاظ على العملاء.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'تجاهل تفضيلات العملاء.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تطوير منتج يلبي احتياجات العملاء ويقدم قيمة إضافية لهم.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقليل جودة المنتج.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الاعتماد على اسم المنتج فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 270,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان المنتج مخصصًا للاستخدام في دولة تختلف فيها أنظمة القياس عن الدولة التي صُمم فيها، فما الجانب الذي يجب مراعاته عند تصميم المنتج؟',
            'explanation_ar' => 'التفسير: من ضمن قضايا التوافق في التصميم ضرورة مراعاة أنظمة القياس؛ إلى جانب المناخ وأنظمة البث والبنية التحتية وشبكات الطاقة والقضايا البيئية وتوقعات ورغبات المستهلك.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'الاسم التجاري.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوافق مع أنظمة القياس.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإعلان فقط.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'طريقة عرض المنتج فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 271,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تُعد القضايا البيئية من الأمور التي ينبغي مراعاتها عند التفكير في توافق التصميم.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تعتبر القضايا البيئية من ضمن مجموعة الأمور التي ينبغي مراعاتها عند التفكير في توافق المنتج وتصميمه.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 272,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي نوع من أسماء المنتجات يعتمد على وصف بعض ميزات أو خصائص المنتج؟',
            'explanation_ar' => 'التفسير: يصف الاسم الوصفي بعض ميزات أو خصائص المنتج، وتورد أمثلة على الأسماء الوصفية.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'الاسم الوصفي.',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الاسم العشوائي.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الاسم الخيالي.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الاسم الإيحائي.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 273,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي نوع من أسماء المنتجات يشير إلى الميزات أو الفوائد الرئيسية للمنتج؟',
            'explanation_ar' => 'التفسير: التسمية الإيحائية تشير إلى الميزات أو الفوائد الرئيسية للمنتج، أي أنها توحي بما يمكن أن يقدمه المنتج للمستهلك.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'وصفي.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيحائي',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'عشوائي.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'خيالي.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 274,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'الاسم العشوائي للمنتج هو اسم يتم اختياره دون وجود سبب محدد أو وصف لمعنى المنتج.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تتضمن الأسماء العشوائية اختيار الاسم دون وجود سبب محدد.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 275,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أطلقت شركة منتجاً جديداً وترغب في أن يثير اسمه إحساساً بميزة أو فائدة معينة دون وصف المنتج مباشرة؛ أيُّ نوعٍ من التسمية يُعدُّ الأنسب لذلك؟',
            'explanation_ar' => 'التفسير: الاسم الإيحائي لا يكتفي بوصف المنتج، وإنما يشير أو يلمّح إلى ميزاته أو فوائده الرئيسية.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'عشوائية.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'وصفية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيحائية.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'خيالية فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 276,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الغرض الأساسي من العرض التقديمي للمنتج؟',
            'explanation_ar' => 'التفسير: تعد العروض التقديمية للمنتجات جانبًا مهمًا جدًا من عملية بيع المنتج للعملاء والمستثمرين المحتملين وكذلك للأفراد داخل الشركة.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'عرض المنتج دون تقديم معلومات عنه.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'بيع المنتج للعملاء والمستثمرين المحتملين وكذلك للأفراد داخل الشركة.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تدريب العملاء على المحاسبة.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحديد سعر المنتج فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 277,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'ينبغي أن يقدم العرض التقديمي للمنتج المعلومات بصورة واضحة ومثيرة للاهتمام دون إفراط أو نقص.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يجب تقديم المعلومات للجمهور بصورة واضحة ومثيرة للاهتمام، مع تجنب تقديم معلومات أكثر أو أقل من اللازم.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 278,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الآتي يُعد من فئات جمهور العرض التقديمي للمنتج؟',
            'explanation_ar' => 'التفسير: توجد عدة فئات يمكن أن تكون من جمهور العرض التقديمي، ومنها: داخل الشركة، شريك التوزيع أو الحل، محللو الصناعة والسوق، المستثمرون، الوسيط، والزبون',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'المنافسون فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المستثمرون.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الموردون فقط.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'موظفو الحكومة فقط.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 279,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان العرض التقديمي موجّهًا إلى فريق المبيعات، فما الهدف الذي ينبغي أن يركز عليه العرض بصورة أكبر؟',
            'explanation_ar' => 'التفسير: يعتبر التدريب على المبيعات أحد أنواع العروض التقديمية، ويهدف إلى تمكين فريق المبيعات من تقديم المنتج بطريقة شاملة وتحليلية والتعامل مع الأسئلة والاستفسارات بفعالية.',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'وصف المنتج دون توضيح طريقة استخدامه.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التركيز على تاريخ الشركة فقط.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'توضيح كيفية استخدام المنتج ومزاياه لمساعدة فريق المبيعات على بيعه.',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تجاهل أسئلة العملاء المحتملين.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 280,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تُعد احتياجات المستهلك من الاعتبارات التي تؤخذ في الحسبان عند توافق التصميم',
            'explanation_ar' => 'التفسير: العبارة صحيحة، فمن ضمن الاعتبارات المرتبطة بالتوافق على التصميم احتياجات المستهلك، إضافة إلى عوامل أخرى مثل توفر المنتج والقضايا البيئية.',
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_10.php
```php
<?php

// بيانات الوحدة رقم 10: التسعير
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 29 سؤال
return [
    'unit_number' => 10,
    'title_ar' => 'التسعير',
    'order_index' => 10,
    'questions' => [
        [
            'original_number' => 281,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'تتضمن تكاليف تصنيع منتج أو تقديم خدمة ________ كإحدى النفقات التي على الشركة احتسابها. اختر الإجابة الصحيحة.',
            'explanation_ar' => 'تشمل التكلفة: المواد، والعمالة، والنفقات العامة راجع الوحدة 10: التسعير، درس عوامل التكلفة والتسعير، ص: 180.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'تكاليف المواد',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تكاليف النفقات العامة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تكاليف العمالة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما ذكر',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 282,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي هي إستراتيجية تسعير؟',
            'explanation_ar' => 'التفسير: الخيارات المذكورة (التكلفة المرتفعة، التكلفة المنخفضة، التطابق في السعر) تُعبر عن مستويات التكاليف أو تطابق الأسعار وليست مسماة كاستراتيجيات تسعير تسويقية معروفة مثل: (التسعير على أساس التكلفة، التسعير القائم على القيمة، تسعير كشط السوق، أو التسعير لاختراق السوق).، راجع الوحدة 10:، درس: إستراتيجيات التسعير، ص: 183,',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'التكلفة المرتفعة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التكلفة المنخفضة.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التطابق في التسعير',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كل ما سبق.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لا شيء مما سبق.',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 283,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'يتواجد .......... في معظم الأحيان في حال كانت المنتجات معروفة جيدًا في السوق، وفي حال كان سعرها راسخًا في السوق منذ فترة طويلة',
            'explanation_ar' => 'يستخدم التسعير التنافسي غالبًا عندما تكون المنتجات معروفة جيدًا ويكون السعر مستقرًا في السوق منذ فترة، راجع الوحدة 10: ، درس: استراتيجيات التسعير، ص: 190.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'تسعير خط المنتجات.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير التنافسي.',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التسعير بالأرقام الفردية.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم إستراتيجية التسعير.',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 284,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'يُعرف سعر التجزئة المقترح من الشركة المصنعة اختصاراً بـ _____',
            'explanation_ar' => 'التفسير: يُشار إلى سعر التجزئة المقترح من قبل الشركة المصنعة بـ MSRP (Manufacturer\'s Suggested Retail Price). راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 183.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'MSRP',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'POS',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ROI',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'TFC',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 285,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'في إستراتيجية تسعير كشط السوق، تبدأ الشركة بأسعار منخفضة جدًا لاختراق السوق بسرعة ثم تقوم برفعها لاحقًا.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن تسعير كشط السوق يعتمد على البدء بأسعار مرتفعة للمنتجات الجديدة لكشط أقصى أرباح ممكنة من الطبقات المستعدة للدفعة الأولى، بينما التسعير لاختراق السوق هو الذي يبدأ بأسعار منخفضة. راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 184.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 286,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'التكاليف التي تتغير مباشرة مع حجم الإنتاج تُسمى بالتكاليف ________.',
            'explanation_ar' => 'التفسير: التكاليف المتغيرة (VC) تتغير مباشرة بالزيادة أو النقصان بناءً على كمية ونشاط الإنتاج، بخلاف التكاليف الثابتة. راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 185.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'الثابتة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المتغيرة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإجمالية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العامة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 287,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تُستخدم النسبة المئوية للرغبة في العائد على الاستثمار (ROI) لتقييم مدى كفاءة الاستثمار أو لمقارنة كفاءة عدد من الاستثمارات المختلفة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يُستخدم العائد على الاستثمار (ROI) كمقياس لقياس مقدار العائد على استثمار معين بالنسبة لتكلفة ذلك الاستثمار. راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 186.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 288,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يُعد التسعير بالأرقام الفردية (مثل 9.99 أو 159.99) نوعًا من أنواع ________.',
            'explanation_ar' => 'التفسير: التسعير النفسي يحدد الأسعار عند مستويات تؤثر نفسياً على المستهلك وتجعله يشعر أن السعر أقل بشكل ملحوظ (مثل استخدام أرقام فردية كـ 9.99). راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 192.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'تسعير كشط السوق',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير على أساس التكلفة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير النفسي',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التسعير التنافسي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 289,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'النقطة التي تتساوى عندها الإيرادات الإجمالية مع التكاليف الإجمالية دون تحقيق ربح أو خسارة تُسمى نقطة التعادل.',
            'explanation_ar' => 'التفسير: نقطة التعادل تعبر عن حجم المبيعات الذي تتساوى عنده التكاليف الكلية مع الإيرادات الكلية تماماً. راجع الوحدة 10: التسعير، درس: إستراتيجيات التسعير، ص: 185.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 290,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية يُعتبر من العوامل الداخلية التي تؤثر على قرارات التسعير؟',
            'explanation_ar' => 'التفسير: تشمل العوامل الداخلية المؤثرة في التسعير أهداف الشركة التسويقية والتكاليف والإستراتيجية العامة، بينما تعتبر المنافسة والطلب والظروف الاقتصادية عوامل خارجية. راجع الوحدة 10: التسعير، درس: عوامل التكلفة والتسعير، ص: 180-181.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'أسعار المنافسين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الطلب في السوق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'أهداف التسويق والتكاليف',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الظروف الاقتصادية العامة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 291,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'استراتيجية «كشط السوق» (Skimming) تعني:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'تحديد سعر مرتفع عند إطلاق المنتج لتحقيق أقصى ربح قبل دخول المنافسين',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقديم المنتج بسعر منخفض جداً لجذب العملاء',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'بيع المنتج بالتكلفة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'توزيع المنتج مجاناً',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 292,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'استراتيجية «الاختراق» (Penetration) في التسعير تعني:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'تقديم المنتج بسعر منخفض جداً لاجتذاب عملاء جدد ثم رفع السعر تدريجياً',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تحديد سعر مرتفع من البداية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تثبيت السعر للأبد',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'رفع السعر عند كل عملية بيع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 293,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'قد يحتاج السعر إلى أن يكون مرتفعاً إذا كان التصنيع باهظ الثمن.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 294,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التسعير جزء حاسم من استراتيجية الأعمال ويجب أن يتوافق مع عدة عوامل.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 295,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الآتي يُعد من مكونات تكلفة تصنيع المنتج أو تقديم الخدمة؟',
            'explanation_ar' => 'التفسير: تتكون تكاليف تصنيع المنتج أو تقديم الخدمة من تكاليف المواد والعمالة والنفقات العامة.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'تكاليف المواد',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تكاليف العمالة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النفقات العامة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سبق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 296,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'التكاليف التي لا تتغير بتغير حجم الإنتاج تُعرف باسم:',
            'explanation_ar' => 'التفسير: التكاليف الثابتة لا تتغير مباشرة مع تغير حجم الإنتاج، بخلاف التكاليف المتغيرة.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'التكاليف الثابتة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التكاليف المتغيرة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التكاليف الإجمالية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تكاليف المبيعات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 297,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'كيف تُحسب نقطة التعادل',
            'explanation_ar' => 'التفسير: تُحسب نقطة التعادل بتقسيم التكاليف الثابتة على هامش المساهمة للوحدة(سعر بيع الوحدة – التكلفة المتغيرة للوحدة)؛ وفي المثال الوارد تظهر النتيجة بحوالي 286 وحدة.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'أ) تقسيم التكاليف الثابتة على هامش المساهمة للوحدة (سعر بيع الوحدة -التكلفة المتغيرة)',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ب) التكاليف الثابتة × سعر بيع الوحدة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ج) التكاليف المتغيرة ÷ التكاليف الثابتة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) سعر بيع الوحدة ÷ التكاليف الثابتة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 298,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان سعر بيع الوحدة 75 والتكلفة المتغيرة للوحدة 45، فإن هامش المساهمة للوحدة يساوي:',
            'explanation_ar' => 'التفسير: هامش المساهمة للوحدة = سعر البيع − التكلفة المتغيرة، أي 75 − 45 = 30.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => '20',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => '30',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => '45',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => '75',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 299,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'تستخدم الشركة العائد على الاستثمار (ROI) من أجل:',
            'explanation_ar' => 'التفسير: يُستخدم ROI لتقييم مدى كفاءة الاستثمار ومقارنة كفاءة الاستثمارات المختلفة.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'تحديد عدد المنافسين في السوق',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم كفاءة الاستثمار',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تحديد اسم المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اختيار قناة التوزيع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 300,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'يشير الاختصار TFC إلى:',
            'explanation_ar' => 'التفسير: يستخدم الاختصار TFC للدلالة على التكاليف الثابتة الكلية Total Fixed Costs .',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'إجمالي التكاليف الثابتة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إجمالي التكاليف المتغيرة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'سعر البيع',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العائد على الاستثمار',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 301,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'يشير الاختصار TVC إلى:',
            'explanation_ar' => 'التفسير: TVC هو اختصار Total Variable Cost، أي إجمالي التكاليف المتغيرة.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'إجمالي التكاليف الثابتة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إجمالي التكاليف المتغيرة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إجمالي الإيرادات',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'العائد على الاستثمار',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 302,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يُستخدم التسعير النفسي بهدف التأثير في إدراك المستهلك للسعر.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث من أمثلة التسعير النفسي استخدام أسعار مثل 159.99 بدلًا من 160.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 303,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'السعر 159.99 بدلًا من 160 يمثل مثالًا على:',
            'explanation_ar' => 'التفسير: استخدام سعر 159.99 بدلًا من 160 هو أحد أمثلة التسعير بالأرقام الفردية ضمن التسعير النفسي.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'التسعير على أساس التكلفة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تسعير كشط السوق',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير النفسي',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التسعير بالاختراق',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 304,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'السعر الذي تحدده الشركة المصنعة باعتباره سعرًا مقترحًا للبيع بالتجزئة يُعرف باسم MSRP.',
            'explanation_ar' => 'التفسير: MSRP هو اختصار Manufacturer\'s Suggested Retail Price، أي سعر التجزئة المقترح من الشركة المصنعة.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 305,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كانت الشركة تسعى إلى استرداد تكاليفها وتحقيق هامش ربح محدد، فإن أحد الأساليب التي يمكن أن تعتمد عليها هو التسعير بناءً على:',
            'explanation_ar' => 'التفسير: ترتبط قرارات التسعير بعوامل التكلفة، حيث يجب على الشركة مراعاة تكاليف المواد والعمالة والنفقات العامة عند تحديد السعر.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'التكلفة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'لون المنتج',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اسم العلامة التجارية فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'موقع المتجر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 306,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'ارتفاع التكاليف الثابتة يؤدي بالضرورة إلى انخفاض نقطة التعادل.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن ارتفاع التكاليف الثابتة؛ مع ثبات العوامل الأخرى، يؤدي إلى ارتفاع كمية المبيعات اللازمة للوصول إلى نقطة التعادل، وليس انخفاضها.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 307,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'إذا ارتفع سعر البيع مع بقاء التكاليف الأخرى ثابتة، فإن كمية المبيعات المطلوبة للوصول إلى نقطة التعادل تنخفض.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن ارتفاع سعر البيع يزيد هامش المساهمة لكل وحدة، وبالتالي يقل عدد الوحدات اللازمة لتغطية التكاليف الثابتة والوصول إلى نقطة التعادل.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 308,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن تلجأ المؤسسة إلى استراتيجية مطابقة السعر عندما يكون هدفها تقديم سعر لا يتوافق مع أسعار المنافسين.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تعتبر إستراتيجية مطابقة السعر إحدى استراتيجيات التسعير، ويكون فيها السعر متوافقًا مع أسعار المنافسين.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 309,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية يُعد عاملًا خارجيًا يؤثر في قرارات التسعير؟',
            'explanation_ar' => 'التفسير: يمكن التفريق بين العوامل الداخلية، مثل أهداف التسويق والتكاليف، والعوامل الخارجية، مثل المنافسة والطلب والظروف الاقتصادية.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'أهداف التسويق',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تكاليف الشركة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'أسعار المنافسين',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'استراتيجية الشركة العامة',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_11.php
```php
<?php

// بيانات الوحدة رقم 11: التوزيع
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 31 سؤال
return [
    'unit_number' => 11,
    'title_ar' => 'التوزيع',
    'order_index' => 11,
    'questions' => [
        [
            'original_number' => 310,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي ليس بإستراتيجية توزيع قناة مباشرة؟',
            'explanation_ar' => 'القناة المباشرة تعني التوصيل من المُنتِج إلى المستهلك مباشرة؛ وجود "الوسطاء" يحولها إلى قناة غير مباشرة. راجع الوحدة 11: التوزيع ، موضوع :التوزيع المباشر والغير مباشر (ص 204 – 209)',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'البريد المباشر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الوسطاء',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'دليل السلع والكتالوج والمنشورات',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'مندوب مبيعات من الباب إلى الباب',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المواقع الإلكترونية على شبكة الإنترنت',
                    'order_index' => 5,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 311,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي الأنواع الثلاث لإستراتيجيات تغطية السوق؟',
            'explanation_ar' => 'راجع الوحدة 11: التوزيع، درس إستراتيجية التوزيع، ص 201 .',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'الانتقائية، المكثفة، التوزيع غير المباشر.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الانتقائية، الحصرية، التطفلية.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المكثفة، الحصرية، التوزيع المباشر.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المكثفة، الانتقائية، الحصرية.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 312,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'إن قنوات التوزيع هي السبل المستخدمة في نقل السلع والخدمات للسوق.',
            'explanation_ar' => 'العبارة صحيحة، حيث تعرف قنوات التوزيع بأنها الوسائل المستخدمة لنقل السلع والخدمات إلى السوق، راجع الوحدة 11: التوزيع، ص199 .',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 313,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'إن اختيارك لاستراتيجية القناة الصحيحة سيساعدك في إيصال المنتج إلى المستهلكين في الوقت المناسب.',
            'explanation_ar' => 'العبارة صحيحة، حيث تهدف إستراتيجية قنوات التوزيع إلى ضمان وصول المنتج إلى العميل المناسب، في المكان المناسب، وفي الوقت المناسب،. راجع الوحدة 11: التوزيع ، موضوع: استراتيجية التوزيع وقنوات التوزيع 201، و202.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 314,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'إن اختيار أي استراتيجية مع القناة الصحيحة سيساعدك في إيصال المنتج إلى المستهلك في الوقت المناسب.',
            'explanation_ar' => 'العبارة خطأ، حيث أن اختيار استراتيجية التوزيع المناسبة مع القناة المناسبة هو الذي يحقق وصول المنتج، وليس أن أي استراتيجية ستنجح، حيث يعد المزيج الصحيح بين الإستراتيجية والقناة والعملية معاً ، مهماً للإستراتيجية التسويقية الشاملة. راجع الوحدة 11، التوزيع، مقدمة، ص : 198.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 315,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يقصد بـ ________ القنوات والمسارات التي تمر من خلالها المنتجات والخدمات للوصول من المنتِج إلى المستهلك النهائي.',
            'explanation_ar' => 'التفسير: قنوات التوزيع (Distribution Channels) هي الهياكل والمؤسسات والمسارات التي تساعد في نقل المنتجات والخدمات من مكان الإنتاج إلى أماكن الاستهلاك. راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'المزيج الترويجي',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'قنوات التوزيع',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إستراتيجية التسعير',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المزيج التسويقي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 316,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'يُسمى التوزيع الذي تقوم فيه الشركة ببيع منتجاتها عبر جميع المنافذ المتاحة والممكنة بـ ________.',
            'explanation_ar' => 'التفسير: التوزيع المكثف أو الشامل يهدف إلى عرض المنتج في أكبر عدد ممكن من منافذ البيع لتسهيل وصول المستهلك إليه في أي وقت (مثل السلع الاستهلاكية). راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'التوزيع الانتقائي (Selective)',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوزيع الحصري (Exclusive)',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوزيع الشامل / المكثف (Intensive)',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التوزيع المباشر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 317,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'إدارة اللوجستيات تركز فقط على عملية الشحن النهائي للسلعة ولا تهتم بمدخلات الإنتاج أو التخزين.',
            'explanation_ar' => 'التفسير: العبارة خطأ، حيث تشمل إدارة اللوجستيات التخطيط والتنفيذ والتحكم في تدفق المواد الخام والسلع والتخزين والمؤشرات اللوجستية من نقطة المنشأ إلى نقطة الاستهلاك.راجع الوحدة 11: التوزيع، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 318,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يُعرف التجار الذين يشترون البضائع بكميات كبيرة من المنتجين ثم يبيعونها إلى تجار التجزئة بـ ________.',
            'explanation_ar' => 'التفسير: تجار الجملة (Wholesalers) يمثلون الحلقة الوسطى التي تشتري بكميات ضخمة لتوزع على تجار التجزئة. راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'الوكلاء',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تجار الجملة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'السماسرة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المستهلكين النهائيين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 319,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'التوزيع الحصري يمنح عددًا محدودًا جدًا من الموزعين حق توزيع منتجات الشركة في منطقة جغرافية معينة.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أن إستراتيجية التوزيع الحصري تُستخدم غالبًا للسلع الفاخرة حيث تُعطى الأهلية لموزع واحد أو عدد محدود جدًا في منطقة معينة لبناء صورة ذهنية ممتازة. راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 320,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العناصر التالية يُعد من الوظائف الأساسية لبرامج إدارة سلسلة الإمداد (Supply Chain Management)؟',
            'explanation_ar' => 'التفسير: إدارة سلسلة الإمداد تركز على تنسيق وتنفيذ العمليات الخاصة بالمشتريات، إدارة المخزون، حركة البضائع، والتخزين.راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'تصميم الإعلانات التلفزيونية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إدارة المخزون والمشتريات',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تحديد الأسعار النفسية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إجراء المقابلات الشخصية للمبيعات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 321,
            'level' => 'hard',
            'question_type' => 'true_false',
            'text_ar' => 'يُقصد بالصراع بين أعضاء قناة التوزيع في نفس المستوى (مثل صراع بين تاجر تجزئة وتاجر تجزئة آخر) بالصراع الرأسي.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن الصراع بين أطراف في نفس المستوى يُسمى بالصراع الأفقي (Horizontal Conflict)، بينما الصراع الرأسي (Vertical Conflict) يحدث بين مستويات مختلفة في القناة (مثل المنتج مع تاجر الجملة).راجع الوحدة 11: التوزيع ، الصفحة رقم 198 وما بعدها.',
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 322,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'التوزيع كعنصر من المزيج التسويقي ينطوي على:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'نقل وتوزيع السلع من الشركة المصنعة إلى البائع أو المستهلك',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تصميم المنتج فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحديد سعر المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كتابة الإعلانات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 323,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التوزيع أكثر من مجرد نقل المنتج من النقطة (أ) إلى المستهلك في النقطة (ب).',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 324,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => '«قنوات التوزيع» تشير إلى:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'المسارات التي يمر بها المنتج للوصول إلى المستهلك النهائي',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'أقسام المحاسبة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'خطوط الإنتاج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'قوائم الأسعار',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 325,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من العوامل التالية تؤثر في استراتيجية التوزيع ؟',
            'explanation_ar' => 'التفسير: تتأثر استراتيجية التوزيع بهيكل السوق، وأهداف المنظمة، ومواردها، واستراتيجيتها التسويقية.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'حجم العبوة فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لون المنتج فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'هيكل السوق وأهداف المنظمة ومواردها واستراتيجيتها التسويقية',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'عدد موظفي قسم المحاسبة فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 326,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'عند تحديد كيفية نقل المنتجات أو الخدمات إلى العملاء، فإن القرار يتعلق بـ :',
            'explanation_ar' => 'التفسير: اختيار القنوات يعني تحديد القنوات التي سيتم استخدامها لنقل المنتجات أو الخدمات إلى العملاء، ومن أمثلتها البيع بالتجزئة والمبيعات عبر الإنترنت والموزعون.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'تحديد سعر المنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'اختيار قنوات التوزيع',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تصميم العبوة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحديد ميزانية الإعلان',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 327,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُمثّل أحد العناصر الأربعة لعملية التوزيع المادي؟',
            'explanation_ar' => 'التفسير: توجد أربعة عناصر لعملية التوزيع المادي، من بينها النقل وإدارة المخزون ومعالجة الطلب.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'الإعلان',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسعير',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النقل',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'بناء العلامة التجارية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 328,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي وسيلة نقل تصف بأنها سريعة ولكنها مكلفة؟',
            'explanation_ar' => 'التفسير: يعتبر الشحن الجوي سريع ولكنه مكلف، ولذلك يستخدم عندما يكون التسليم السريع مهمًا للعميل.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'النقل المائي',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النقل بالسكك الحديدية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النقل الجوي',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'النقل بالشاحنات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 329,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ماذا يُقصد بالخدمات متعددة الوسائط في عملية النقل؟',
            'explanation_ar' => 'التفسير: الخدمات متعددة الوسائط تعني استخدام طريقتين أو أكثر من وسائل النقل، مع ترتيب العملية بحيث يتم استخدام أكثر طرق النقل كفاءة.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'استخدام شاحنة واحدة فقط لنقل المنتج',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'استخدام وسيلة نقل واحدة لأكثر من مرة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نقل المنتجات باستخدام طريقتين أو أكثر من وسائل النقل',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'نقل المنتجات داخل المستودع فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 330,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما الغرض الأساسي من نظام كمية الطلب الاقتصادي (EOQ)؟',
            'explanation_ar' => 'التفسير: يحدد نموذج كمية الطلب الاقتصادي الكمية المثلى التي ينبغي الاحتفاظ بها في المخزون بهدف تقليل تكاليف المخزون المتغيرة.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'زيادة تكاليف التخزين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'زيادة حجم المخزون دون حدود',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحديد كمية الطلب المثلى لتقليل تكاليف المخزون',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إلغاء الحاجة إلى إدارة المخزون',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 331,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل وظيفة للوسطاء تتمثل في جمع عناصر من مصادر مختلفة لإنشاء إمدادات أكبر للعملاء؟',
            'explanation_ar' => 'التفسير: التراكم يعني أن الوسطاء يجمعون عناصر من عدة مصادر مختلفة لإنشاء إمدادات أكبر لعملائهم.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'الفرز',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التراكم',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'النقل',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التخزين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 332,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان المنتج غير متوفر بسبب نفاد مخزون الشركة المصنعة أو تاجر الجملة، فما الخطوة الإضافية في معالجة الطلب؟',
            'explanation_ar' => 'التفسير: عند عدم توفر العنصر، يتم تحديد موعد متوقع لتوفره ثم وضع جدول للتسليم، مع التحذير من الإفراط في الوعد بمواعيد لا يمكن الالتزام بها.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'إلغاء الطلب مباشرة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الإعلان عن المنتج',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جدولة الطلب',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تغيير العلامة التجارية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 333,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'النقل في عملية التوزيع المادي يقتصر على نقل المنتجات من الشركة المصنعة إلى المستهلك النهائي فقط.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يشير النقل إلى حركة المنتجات من موقع إلى آخر، مثل انتقالها من المستودع إلى بائع التجزئة أو من الشركة المصنعة إلى وسيط.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 334,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يساعد نظام "Just In Time" على تقليل حاجة تجار التجزئة إلى الاحتفاظ بمخزون فائض.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث أصبح العديد من تجار التجزئة لم يعودوا يحتفظون بمخزون فائض، بل يطلبون ما يحتاجونه في الوقت المطلوب، مما يجعل من الضروري أن يوفر المصنعون وتجار الجملة المخزون عند الطلب.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 335,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'تبدأ معالجة الطلب عند شحن المنتج، وتنتهي بمجرد خروج المنتج من المستودع.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تبدأ معالجة الطلب عندما يقدم العميل طلبًا، ولا تعتبر مكتملة بمجرد الشحن؛ إذ تشمل مراحل لاحقة مثل ما بعد الشحن والخدمة ما بعد البيع، حتى يكون المنتج في حوزة العميل وتتم خدمته بصورة مناسبة.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 336,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'من أنشطة ما بعد الشحن تتبع الطلب والتأكد من استلام العميل للمنتج بصورة مرضية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث لا تنتهي معالجة الطلب بمجرد إرسال المنتج؛ فمن أنشطة ما بعد الشحن تتبع الطلب، وتحديث العميل بشأن التسليم، واكتشاف أخطاء أو تأخيرات الشحن ومعالجتها، بالإضافة إلى الفوترة.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 337,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تؤثر قنوات التوزيع على الأرباح أو القدرة التنافسية للمنظمة.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يؤثر التوزيع على الأرباح والقدرة التنافسية، وأن قناة التوزيع الضعيفة يمكن أن تقلل الأرباح بشكل كبير وقد تؤدي إلى توجه العملاء إلى المنافسين.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 338,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يجب توسيع قنوات التوزيع حتى لو لم تكن المنظمة مستعدة لتسليم المنتجات باستمرار إلى القنوات الجديدة.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أنه من الأمور التي لا يجب فعلها توسيع التوزيع إذا لم تكن المنظمة مستعدة لتسليم المنتجات باستمرار إلى القنوات الجديدة. كما يوصي باختبار طرق التوزيع الجديدة قبل التوسع فيها.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 339,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تهدف استراتيجية قنوات التوزيع إلى المساعدة في إيصال المنتج إلى المستهلك في الوقت المناسب.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن اختيار استراتيجية القناة المناسبة يساعد على إيصال المنتج إلى العميل المناسب، في المكان والوقت المناسبين.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 340,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من أنواع استراتيجيات تغطية السوق؟',
            'explanation_ar' => 'التفسير: توجد ثلاثة أنواع لاستراتيجيات تغطية السوق: المكثفة، والانتقائية، والحصرية.',
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'التوزيع المالي',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوزيع الحصري',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التوزيع المحاسبي',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوزيع الإداري',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_12.php
```php
<?php

// بيانات الوحدة رقم 12: التكنولوجيا في التسويق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 37 سؤال
return [
    'unit_number' => 12,
    'title_ar' => 'التكنولوجيا في التسويق',
    'order_index' => 12,
    'questions' => [
        [
            'original_number' => 341,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أيٌّ مما يلي يُعرف بأنه تطبيق التكنولوجيا الرقمية والإنترنت لتحقيق الأهداف التسويقية للشركة؟',
            'explanation_ar' => 'التفسير: يتضمن التسويق الرقمي استخدام الوسائط والتكنولوجيا الرقمية لتوسيع نطاق الوصول للعملاء وتحقيق أهداف التسويق. راجع الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'أ) التسويق المباشر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ب) التسويق الرقمي (Digital Marketing)',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ج) العلاقات العامة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'د) البيع الشخصي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 342,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'من أنواع التسويق الرقمي (الإلكتروني ) ما يلي:',
            'explanation_ar' => 'راجع الوحدة 12: التكنولوجيا في التسويق ، ص : 230',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'التسويق عبر الإنترنت (الشبكي).',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسويق عبر محركات البحث.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسويق عبر البريد الإلكتروني.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسويق عبر وسائل التواصل الاجتماعي',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سبق',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 343,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'من أنواع التسويق عبر الإنترنت (الشبكي ) الدفع لكل نقرة (Click).',
            'explanation_ar' => 'راجع الوحدة 12: التكنولوجيا في التسويق، درس التكنولوجيات في التسويق، ص : 230',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 344,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من القطاعات التالية يُعد أحد قطاعات التسويق عبر الإنترنت الرئيسية التي تعتمد عليها الشركات للوصول إلى الجمهور؟',
            'explanation_ar' => 'التفسير: يُعد التسويق عبر محركات البحث أحد القطاعات الرئيسية للتسويق عبر الإنترنت لضمان ظهوره للعملاء الباحثين عن الخدمات والمنتجات. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'التسويق الميداني المباشر',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التسويق عبر محركات البحث (SEM/SEO)',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'المعارض التجارية التقليدية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التوزيع الجغرافي الحصري',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 345,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التسويق عبر البريد الإلكتروني يُركز بشكل أساسي على إرسال رسائل مخصصة واستهداف دقيق للجمهور لبناء علاقات مستمرة وتحقيق معدلات تحويل عالية.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يُستخدم التسويق عبر البريد الإلكتروني كأداة قوية لتوجيه الرسائل المخصصة للجمهور المستهدف وتتبع تفاعلهم. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 346,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الخطوات الأساسية للتواجد الرقمي للشركة عند التخطيط للتسويق الإلكتروني:',
            'explanation_ar' => 'التفسير: تصميم وإنشاء موقع إلكتروني يُعد الواجهة الرقمية الأساسية التي تُبنى عليها باقي أنشطة التسويق الإلكتروني. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'إغلاق المنافذ التقليدية',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تصميم وإنشاء موقع إلكتروني للشركة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الاعتماد الحصري على الرسائل النصية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'طباعة الكتالوجات الورقية',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 347,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'يُقصد بعملية تحسين ظهور الموقع الإلكتروني في نتائج البحث غير المدفوعة بـ ________.',
            'explanation_ar' => 'التفسير: تحسين محركات البحث (SEO) يهدف لتطوير محتوى الموقع وتهييئته ليظهر في نتائج البحث الأولى مجاناً. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'التسويق الميداني',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحسين محركات البحث (SEO)',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التسعير التنافسي',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'البيع المباشر',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 348,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما الخيار الذي يعتبر الطريقة الأسهل والأغلى لإنشاء موقع ويب:',
            'explanation_ar' => 'التفسير: توظيف محترف هو الطريقة الأسهل والأغلى للحصول على موقع ويب وتشغيله راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'استخدام برنامج جاهز',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إنشاء الموقع بنفسك',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'توظيف محترف',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الاستغناء عن الموقع',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 349,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يُعد من معايير تقييم المرشحين لتصميم موقع الويب؟',
            'explanation_ar' => 'من معايير التقييم: سهولة الاستخدام، سرعة الموقع، استخدام الرسوم المتحركة، واتساق النص. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'سهولة استخدام الموقع',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'عدد الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'مساحة المكتب',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'حجم المخزون',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 350,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الذي يجب أن تتضمنه خطة مشروع إنشاء موقع ويب ؟',
            'explanation_ar' => 'التفسير: يجب وضع خطة واضحة تحدد السعر النهائي والنطاق، ومتطلبات الموقع، والتوقعات المتعلقة بموعد التسليم راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'السعر فقط.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المحتوى فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نطاق العمل ومتطلبات الموقع والتوقعات المتعلقة بالموعد',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'اسم المصمم فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 351,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يُقصد بـ "تحسين محركات البحث" (SEO) دفع مبالغ مالية لمحركات البحث مقابل ظهور الإعلان في أعلى نتائج البحث.',
            'explanation_ar' => 'التفسير: العبارة خاطئة حيث يهدف مصطلح  SEO للظهور في النتائج المجانية (الغير مدفوعة) من خلال تحسين المحتوى والكلمات المفتاحية، بينما الدفع مقابل الظهور يُعرف بـ (SEM / Pay-Per-Click). راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 352,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'ما هي التقنية التي تُستخدم لرصد وتتبع سلوك الزوار على الموقع الإلكتروني وتحليل كيفية تفاعلهم مع المحتوى؟',
            'explanation_ar' => 'التفسير: توفر تحليلات الويب بيانات دقيقة حول الزيارات، السلوك، ومعدلات التحويل للمستخدمين على الموقع. راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'تحسين محركات البحث (SEO)',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحليلات الويب (Web Analytics)',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'البريد الإلكتروني العشوائي (Spam)',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إدارة شبكات الاتصال',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 353,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التقنيات التالية تعتبر من ضمن تقنيات الويب؟',
            'explanation_ar' => 'التفسير : تعد تقنيات CSS وXML وAJAX ضمن التقنيات الجديدة/المستخدمة في تطوير الويب، وتناقش أثرها على تصميم المواقع، راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'CSS وXML وAJAX',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'Excel وWord',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'PowerPoint وAccess',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Bluetooth وGPS',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 354,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'من أهم أدوات التجارة الإلكترونية هي:',
            'explanation_ar' => 'راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'برنامج عربة التسوق اللازمة لبيع منتجاتك أو خدماتك.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'بوابة الدفع (الخدمة التي تسمح بالمدفوعات)',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'حساب بطاقة ائتمان التاجر.',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سبق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 355,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'توجد جوانب يجب أن تفهمها قبل الشروع في عملية إنشاء موقع الويب هي :',
            'explanation_ar' => 'راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'الغرض.',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الأهداف.',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الجمهور المستهدف',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المحتوى',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سبق',
                    'order_index' => 5,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 356,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'توجد بنود يجب معالجتها فيما يتعلق بما سيتضمنه الموقع خلال مرحة التخطيط ، من ضمنها :',
            'explanation_ar' => 'راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'المستخدم النهائي',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التقنيات',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'النماذج التفاعلية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سبق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 357,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يعتبر الجمهور المستهدف أحد العوامل الرئيسية التي تؤخذ في الاعتبار عن تصميم الموقع.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يعتبر الجمهور المستهدف أحد العوامل الرئيسية التي تؤخذ في الاعتبار عن تصميم الموقع، الموقع الذي يستهدف المراهقين مختلفا عن كثيرا عن الموقع المخصص لمؤسسة مالية.راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 358,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التسويق بالعمولة عبر الإنترنت يسمح للفرد بالترويج لمنتج بائع آخر والحصول على عمولة.',
            'explanation_ar' => 'راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 359,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'تعرف تقنية ............  بأنه يقوم المستهلك " بسحب " المعلومات حول الشركات و/ أو المنتجات و/ أو الخدمات في محاولة لتحديد الشركات التي يتردد عليها، أو المنتجات التي يجب شراؤها.',
            'explanation_ar' => 'راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'تقنية " PULL"',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقنية : PUSH',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقنية SEO',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقنية PPC',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 360,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'هنالك إستراتيجيات قد تساعد شركتك/ أو منتجك/ أو خدمتك في المستقبل القريب هي:',
            'explanation_ar' => 'الإجابة الصحيحة جميع ما سبق، راجع الوحدة: الوحدة 12: التكنولوجيا في التسويق، ص 228',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'التسويق عبر الهاتف المحمول',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إنشاء تطبيقك الخاص للهواتف الذكية',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عمليات الدفع الإلكتروني',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'جميع ما سباق',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 361,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تلعب التكنولوجيا دوراً في تنفيذ الأنشطة التسويقية والوصول للعملاء.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 362,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'من أبرز فوائد التكنولوجيا في التسويق:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'الوصول الأوسع للعملاء وتحليل البيانات وتحسين الاستهداف',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'زيادة تكاليف التخزين فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقليل جودة المنتج',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إلغاء الحاجة للعملاء',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 363,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا تساعد تطبيقات التكنولوجيا الوصول للعملاء.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 364,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التقنيات التالية ترتبط بإنشاء صفحات الويب؟',
            'explanation_ar' => 'التفسير: تعد تقنية الـ  HTML ضمن التقنيات المرتبطة بالويب وإنشاء صفحات المواقع الإلكترونية.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'Excel',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'HTML',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'PowerPoint',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Access',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 365,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ماذا يُقصد بمصطلح WYSIWYG في سياق تصميم مواقع الويب؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'نظام لإدارة البريد الإلكتروني',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'أداة/واجهة تتيح تصميم صفحات الويب بصورة مرئية',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'محرك بحث',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نظام للدفع الإلكتروني',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 366,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يعد مرتبطًا بالإعلانات المدفوعة في محركات البحث؟',
            'explanation_ar' => 'التفسير: يشير الاختصار PPC إلى نموذج إعلاني يرتبط بالدفع مقابل النقر Pay Per Click',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'SEO فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'PPC',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'HTML',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'XML',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 367,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'يشير الاختصار PPC إلى نموذج إعلاني يرتبط بالدفع مقابل النقر Pay Per Click.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 368,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأدوات التالية يرتبط بسياق البحث عن الكلمات المفتاحية والأفكار المتعلقة بها؟',
            'explanation_ar' => 'التفسير: تعتبر Google Trendsو Answer the Public Keyword Generatorضمن الأدوات المرتبطة بالبحث في محركات البحث والكلمات المفتاحية.',
            'is_multi_correct' => false,
            'order_index' => 28,
            'options' => [
                [
                    'option_text_ar' => 'Microsoft Word',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Google Trends',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'PowerPoint',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Bluetooth',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 369,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يُستخدم Google Trends في سياق تحليل الاتجاهات المرتبطة بعمليات البحث.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث تعتبر  Google Trends ضمن الأدوات المستخدمة في سياق محركات البحث وتحليل ما يبحث عنه المستخدمون.',
            'is_multi_correct' => false,
            'order_index' => 29,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 370,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يعتبر أداة لتوليد أفكار للكلمات المفتاحية؟',
            'explanation_ar' => 'التفسير: تعتبر Answer the Public Keyword Generatorضمن الأدوات المرتبطة بالكلمات المفتاحية في سياق التسويق عبر محركات البحث.',
            'is_multi_correct' => false,
            'order_index' => 30,
            'options' => [
                [
                    'option_text_ar' => 'Google Maps',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Answer the Public Keyword Generator',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'Google Drive',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Google Calendar',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 371,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يشير الاختصار SERP إلى الصفحة التي تظهر فيها نتائج محرك البحث.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 31,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 372,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الآتي يرتبط مباشرة بمفهوم SERP ؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 32,
            'options' => [
                [
                    'option_text_ar' => 'تصميم الشعار',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نظام الدفع الإلكتروني',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نتائج محرك البحث',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'إدارة المخزون',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 373,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تعتبر كل من  Google وYahoo محركات البحث.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 33,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 374,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يعتبر مثال على منصات التواصل الاجتماعي؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 34,
            'options' => [
                [
                    'option_text_ar' => 'Excel',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Google AdWords',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Facebook',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'HTML',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 375,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي مجموعة من التالية تتضمن منصات وسائل التواصل الاجتماعي؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 35,
            'options' => [
                [
                    'option_text_ar' => 'Excel وWord وAccess',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Facebook وTwitter وLinkedIn',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'HTML وCSS وXML',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'Google وAmazon وIBM',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 376,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يقتصر استخدام وسائل التواصل الاجتماعي في التسويق على Facebook وTwitter فقط.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث توجد مجموعة كبيرة من منصات التواصل الاجتماعي يمكن استخدمها في التسويق، والتي من بينها Facebook وTwitter وLinkedIn وYouTube وQuora وReddit.',
            'is_multi_correct' => false,
            'order_index' => 36,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 377,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من المجموعات التالية تمثل أمثلة إضافية لمنصات التواصل الاجتماعي ؟',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 37,
            'options' => [
                [
                    'option_text_ar' => 'Google وAmazon',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'HTML وCSS',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'YouTube وQuora وReddit',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'PPC وSEO',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
    ],
];
```

## File: unit_13.php
```php
<?php

// بيانات الوحدة رقم 13: تقييم التسويق
// تم توليدها آليًا من بنك أسئلة IBTA (404 سؤال) - 27 سؤال
return [
    'unit_number' => 13,
    'title_ar' => 'تقييم التسويق',
    'order_index' => 13,
    'questions' => [
        [
            'original_number' => 378,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي تعتبر من أنواع تقييمات خطة السوق.',
            'explanation_ar' => 'تشمل العناصر السابقة مع العناصر التالية :الفاعلية، والكفاءة، والملخص، الهدف، الإجراءات النتائج  تمثل كافة أنواع تقييمات خطة السوق  ، الوحدة 13 ، درس أنواع تقيميات خطة السوق، ص : 272.',
            'is_multi_correct' => false,
            'order_index' => 1,
            'options' => [
                [
                    'option_text_ar' => 'الاحتياجات',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التكلفة / الفائدة',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التكوين',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كل ما سبق ذكره.',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 379,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما الهدف الأساسي من تقييم خطة التسويق',
            'explanation_ar' => 'تقييم الخطة يساعد على التأكد من تحقيق الأهداف المحددة، كما يساعد في تحسين خطة التسويق مستقبلاً. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 2,
            'options' => [
                [
                    'option_text_ar' => 'زيادة عدد الموظفين',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التأكد من تحقيق الأهداف المحددة وتحسين الخطة',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تغيير اسم الشركة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقليل عدد المنتجات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 380,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'لماذا ينبغي مراجعة خطة التسويق بصورة مستمرة؟',
            'explanation_ar' => 'المستهلكين يتغيرون، وأن عدم معالجة هذه التغييرات قد يؤدي إلى فقدان قاعدة عملاء الشركة. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 3,
            'options' => [
                [
                    'option_text_ar' => 'لأن المستهلكين لا يتغيرون',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لأن المستهلكين تتغير رغباتهم واحتياجاتهم',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'لتغيير الأسعار فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'لتقليل الإعلانات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 381,
            'level' => 'hard',
            'question_type' => 'mcq',
            'text_ar' => 'أي مما يلي يُعد نوعًا من أنواع تقييمات خطة التسويق ؟',
            'explanation_ar' => 'من أنواع تقييم التسويق: الاحتياجات، والتكلفة/الفائدة، والفعالية، والكفاءة، والتكوين، والملخص، والهدف، والإجراءات، والنتائج. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 4,
            'options' => [
                [
                    'option_text_ar' => 'تقييم الاحتياجات .',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقييم الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم الرواتب',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم المباني',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 382,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يساعد تقييم خطة التسويق في تحديد نقاط القوة والضعف في خطة التسويق، بما يساعد على تحسينه.',
            'explanation_ar' => 'العبارة خاطئة لأنه تقييم خطة التسويق يساعد في تحديد نقاط القوة والضعف في خطة التسويق، بما يساعد على تحسينه. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 5,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 383,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الأنواع الثلاثة الأكثر شيوعًا لتقييمات خطة التسويق؟',
            'explanation_ar' => 'التفسير تعتبر الأنواع الثلاثة الأكثر شيوعًا في تصميم التقييم التسويقي هي: قائم على الهدف، قائم على الإجراءات، قائم على النتائج. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 6,
            'options' => [
                [
                    'option_text_ar' => 'قائم على الهدف، قائم على الإجراءات، قائم على النتائج',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'قائم على السعر، المنتج، المكان',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'قائم على العملاء، الموظفين، الإدارة',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'قائم على التكلفة، الربح، المبيعات',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 384,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'ما السؤال الذي ينبغي طرحه عند تصميم تقييم قائم على الهدف؟',
            'explanation_ar' => 'التفسير: من ضمن أسئلة تصميم التقييم: أسئلة، «ما هو الغرض من التقييم؟ ما هو القرار الذي تريد أن تتخذه نتيجة التقييم؟». راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 7,
            'options' => [
                [
                    'option_text_ar' => 'ما هو الغرض من التقييم؟',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'كم عدد الموظفين؟',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كم عدد الفروع؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ما سعر المنتج؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 385,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'تتمثل أدوات جمع المعلومات فيما يلي:',
            'explanation_ar' => 'تتمثل هذه الأدوات تحديدًا لجمع المعلومات: الاستبيانات، المقابلات، التوثيق، والمراقبة.راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 8,
            'options' => [
                [
                    'option_text_ar' => 'الاستبيانات والمقابلات والتوثيق والمراقبة',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'الإعلانات والأسعار فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المبيعات والمخزون فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الصحف والمجلات فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 386,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من التالي يمثل سؤالًا مناسبًا عند تقييم قائم على الإجراءات؟',
            'explanation_ar' => 'يركز التقييم القائم على الإجراءات على كيفية تنفيذ العمليات، ومن ذلك كيفية تدريب الموظفين وتقديم المنتجات أو الخدمات. راجع الوحدة 13: تقويم التسويق، ص 270.',
            'is_multi_correct' => false,
            'order_index' => 9,
            'options' => [
                [
                    'option_text_ar' => 'كيف يتم تدريب الموظفين على تقديم المنتج أو الخدمات؟',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ما لون شعار الشركة؟',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كم عدد فروع المنافسين؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ما سعر الإعلان؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 387,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الذي يركز عليه التقييم القائم على النتائج؟',
            'explanation_ar' => 'أن التقييم القائم على النتائج يأخذ في الاعتبار ما إذا كانت الأنشطة التسويقية تحقق النتائج المناسبة التي ترضي العملاء والسوق المستهدف ككل. راجع الوحدة 13: تقويم التسويق، ص 270',
            'is_multi_correct' => false,
            'order_index' => 10,
            'options' => [
                [
                    'option_text_ar' => 'تحقيق النتائج التي ترضي العملاء والسوق المستهدف ككل',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'طريقة تصميم المكتب',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عدد الاجتماعات',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عدد الموظفين فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 388,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'الغرض من تقييم التسويق هو:',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 11,
            'options' => [
                [
                    'option_text_ar' => 'قياس فعالية الأنشطة التسويقية وتحسين الأداء',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'زيادة عدد الموظفين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيقاف الحملات نهائياً',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تجاهل النتائج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 389,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'تقييم التسويق لا يساعد المنظمة على معرفة مدى تحقيق أهدافها التسويقية.',
            'explanation_ar' => null,
            'is_multi_correct' => false,
            'order_index' => 12,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 390,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'عند إجراء تقييم لخطة التسويق، ما الذي ينبغي أن يساعد التقييم الإدارة على تحديده؟',
            'explanation_ar' => 'التفسير: من أهداف تقييم خطة التسويق تحديد نقاط القوة والضعف في الخطة، بما يساعد المنظمة على تحسينها مستقبلًا.',
            'is_multi_correct' => false,
            'order_index' => 13,
            'options' => [
                [
                    'option_text_ar' => 'عدد مكاتب الشركة فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نقاط القوة والضعف في خطة التسويق',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ألوان المنتجات المنافسة فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عدد الموظفين الجدد',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 391,
            'level' => 'easy',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأسئلة التالية يرتبط بصورة أكبر بقرار سيتم اتخاذه نتيجة التقييم؟',
            'explanation_ar' => 'التفسير: عند تصميم التقييم ينبغي تحديد القرار الذي سيتم اتخاذه بناءً على نتائج التقييم، وليس جمع المعلومات بصورة عشوائية.',
            'is_multi_correct' => false,
            'order_index' => 14,
            'options' => [
                [
                    'option_text_ar' => 'ما لون الشعار؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كم عدد موظفي الشركة؟',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ما القرار الذي تريد أن تتخذه نتيجة التقييم؟',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'أين يقع مقر الشركة؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 392,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا كان الهدف من التقييم معرفة ما إذا كانت الخطة تحقق الغرض الذي وضعت من أجله، فأي نوع من التقييم يناسب ذلك؟',
            'explanation_ar' => 'التفسير: التقييم القائم على الهدف يرتبط بفحص الخطة في ضوء الغرض أو الهدف الذي وضعت لتحقيقه.',
            'is_multi_correct' => false,
            'order_index' => 15,
            'options' => [
                [
                    'option_text_ar' => 'التقييم القائم على الهدف',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'التقييم القائم على الإجراءات',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'التقييم القائم على النتائج فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم التكلفة فقط',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 393,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأسئلة التالية يرتبط بالتقييم القائم على الإجراءات؟',
            'explanation_ar' => 'التفسير: يركز التقييم القائم على الإجراءات على كيفية تنفيذ الأنشطة والعمليات، وليس فقط على النتائج النهائية.',
            'is_multi_correct' => false,
            'order_index' => 16,
            'options' => [
                [
                    'option_text_ar' => 'هل حققت الخطة أهدافها النهائية؟',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'كيف يتم تنفيذ الأنشطة والإجراءات التسويقية؟',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'ما مقدار الربح السنوي للشركة؟',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'ما حجم السوق المستهدف؟',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 394,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'شركة قامت بتقييم حملتها التسويقية من خلال مقارنة النتائج التي حققتها بالنتائج التي كانت تستهدفها. هذا مثال على:',
            'explanation_ar' => 'التفسير: التقييم القائم على النتائج يهتم بما إذا كانت الأنشطة التسويقية قد حققت النتائج المناسبة المطلوبة.',
            'is_multi_correct' => false,
            'order_index' => 17,
            'options' => [
                [
                    'option_text_ar' => 'تقييم قائم على الاحتياجات',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم قائم على الإجراءات',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تقييم قائم على النتائج',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'تقييم قائم على التكوين',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 395,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'أي من الأدوات التالية يمكن استخدامها للحصول على معلومات عند إجراء التقييم التسويقي؟',
            'explanation_ar' => 'التفسير: تعتمد عملية جمع المعلومات في التقييم على مجموعة من الأدوات، وليس أداة واحدة فقط.',
            'is_multi_correct' => false,
            'order_index' => 18,
            'options' => [
                [
                    'option_text_ar' => 'الاستبيانات فقط',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المقابلات فقط',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'المراقبة فقط',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'الاستبيانات والمقابلات والتوثيق والمراقبة',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 396,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'إذا أرادت المنظمة معرفة مدى رضا السوق المستهدف عن النتائج التي حققتها أنشطتها التسويقية، فإنها تركز بصورة أساسية على:',
            'explanation_ar' => 'التفسير: التقييم القائم على النتائج يهتم بما إذا كانت الأنشطة تحقق النتائج المناسبة التي ترضي العملاء والسوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 19,
            'options' => [
                [
                    'option_text_ar' => 'كيفية كتابة الخطة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'عدد الموظفين المشاركين',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'طريقة إعداد الميزانية',
                    'order_index' => 3,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'نتائج الأنشطة التسويقية',
                    'order_index' => 4,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 397,
            'level' => 'medium',
            'question_type' => 'mcq',
            'text_ar' => 'ما الخطوة الأكثر منطقية قبل البدء في جمع المعلومات الخاصة بالتقييم؟',
            'explanation_ar' => 'التفسير: تحديد الغرض من التقييم والقرار الذي سيُتخذ بناءً عليه يساعد في تحديد المعلومات المطلوبة وأسلوب جمعها.',
            'is_multi_correct' => false,
            'order_index' => 20,
            'options' => [
                [
                    'option_text_ar' => 'تغيير الخطة مباشرة',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'إيقاف النشاط التسويقي',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'تحديد الغرض من التقييم والقرار المطلوب اتخاذه',
                    'order_index' => 3,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'اختيار شعار جديد للمنتج',
                    'order_index' => 4,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 398,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن استخدام نتائج تقييم خطة التسويق لتحسين الخطة التسويقية مستقبلًا.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث لا يقتصر التقييم على الحكم على الخطة الحالية، وإنما يساعد أيضًا في تحسين خطة التسويق مستقبلًا.',
            'is_multi_correct' => false,
            'order_index' => 21,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 399,
            'level' => 'medium',
            'question_type' => 'true_false',
            'text_ar' => 'التقييم القائم على الإجراءات يهتم فقط بالنتائج النهائية التي حققتها الخطة، ولا يهتم بكيفية تنفيذها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن التقييم القائم على الإجراءات يهتم بكيفية تنفيذ الأنشطة والعمليات، ولذلك فإن معرفة كيفية تنفيذ العمل جزء أساسي منه.',
            'is_multi_correct' => false,
            'order_index' => 22,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 400,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن يكون التقييم التسويقي أكثر فائدة عندما تكون المعلومات التي يتم جمعها مرتبطة بالغرض من التقييم.',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث يساعد تحديد الغرض والقرار المطلوب في توجيه عملية جمع المعلومات نحو البيانات المفيدة للتقييم.',
            'is_multi_correct' => false,
            'order_index' => 23,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 401,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'التقييم القائم على النتائج لا يهتم بما إذا كانت الأنشطة التسويقية تحقق نتائج مناسبة للعملاء والسوق المستهدف.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث أن جوهر اهتمام التقييم القائم على النتائج؛ بما إذا كانت الأنشطة التسويقية تحقق النتائج المناسبة التي ترضي العملاء والسوق المستهدف.',
            'is_multi_correct' => false,
            'order_index' => 24,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 402,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يمكن أن تستخدم عملية التقييم أكثر من وسيلة لجمع المعلومات',
            'explanation_ar' => 'التفسير: العبارة صحيحة، حيث تشمل أدوات جمع المعلومات الاستبيانات والمقابلات والتوثيق والمراقبة، وبالتالي يمكن استخدام أكثر من أداة في عملية التقييم.',
            'is_multi_correct' => false,
            'order_index' => 25,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => true,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => false,
                ],
            ],
        ],
        [
            'original_number' => 403,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'لا يؤثر تحديد الهدف من التقييم التسويقي والقرارات التي ستُتخذ بناءً على نتائجه في طريقة تصميم هذا التقييم.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، تحديد الغرض من التقييم والقرار الذي تريد المنظمة اتخاذه نتيجة التقييم من الأسئلة الأساسية عند تصميم التقييم التسويقي.',
            'is_multi_correct' => false,
            'order_index' => 26,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
        [
            'original_number' => 404,
            'level' => 'easy',
            'question_type' => 'true_false',
            'text_ar' => 'يقتصر تقييم خطة التسويق على معرفة ما إذا كانت الخطة حققت نتائجها فقط، دون النظر إلى طريقة تنفيذها.',
            'explanation_ar' => 'التفسير: العبارة خاطئة، حيث يمكن التمييز بين التقييم القائم على الهدف، والقائم على الإجراءات، والقائم على النتائج؛ ولذلك فإن التقييم لا يقتصر على النتائج وحدها، بل يمكن أن يفحص الأهداف والإجراءات والنتائج.',
            'is_multi_correct' => false,
            'order_index' => 27,
            'options' => [
                [
                    'option_text_ar' => 'True',
                    'order_index' => 1,
                    'is_correct' => false,
                ],
                [
                    'option_text_ar' => 'False',
                    'order_index' => 2,
                    'is_correct' => true,
                ],
            ],
        ],
    ],
];
```
