<?php 

function lang($phrase)
{
	# code...
	static $lang = array(
		//start navbar language
		'home'    => 'الرئيسية',
		'about'	  => 'معلومات عنا',
		'shop'	  => 'المتجر',
		'contact' => 'مراسلتنا',
		'langue'  => 'Changez la langue',
      'connexion'  => 'تسجيل الدخول',
      'inscription' => 'اشتراك',
      'deconnexion' => 'تسجيل خروج',
		//end navbar language

		//start banner
		'image1title' => 'رقم 1 في التسوق عبر الإنترنت',
		'image1desc'  => 'نحن نقدم العديد من منتجات الأجهزة المنزلية. مثل <a rel="sponsored" class="text-success" href="https://templatemo.com" target="_blank">مقلاة</a> حديثة بزيت أو بدون زيت. 
                                    يمكنك زيارة الكتالوج الخاص بنا <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank">لمشاهدة منتجاتنا</a>, ستجد أيضًا
                                    <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank">رحيات</a> و
                                    <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank"> قطعات</a>.',
         'image2title' => 'أسعار منطقية للغاية',
         'image2stitle'=> 'بالإضافة إلى التوصيل المجاني 58 ولاية',
         'image2desc'  => 'جميع منتجاتنا ذات جودة عالية من عدة أماكن في العالم مثل فرنسا وألمانيا والصين وغيرها ، وضمان ما بين 12 و 18 شهرًا ، واستبدال مجاني في حالة عدم عمل المنتج',
         'image3title' => 'منتجات مفيدة جدا',
         'image3stitle'=> 'فعالة وطويلة الأمد',
         'image3desc'=> 'هل تحب الطبخ لديك العديد من الوصفات وأنت بحاجة إلى معدات ، نقدم لك ماركات كبرى تسهل عليك تحضير أطباق الكيك وكوكتيلات العصير',
         
         //start catégorie of the mount
         'titlecat'  => 'أهم فئات الشهر.',
         'stitlecat' => 'يقترح First Shop الفئات الأكثر شيوعًا لتصفح المنتجات التي تعجبك بسهولة.',
         'visitez'  => 'تصفح',
         //end catégorie of the mont
         //Start Featured Product
         'titlepro'  => 'المنتجات الأكثر رواجًا',
         'stitlepro' => 'يقترح موقع First Shop أكثر المنتجات شعبية لتصفح المنتجات التي تعجبك بسهولة.',
         //end Featured Product
         //////////////shop page//////////////////
         //Start shop page
         'sidebar1'  => 'تصنيفات',
         'sidebar2' => 'العلامات التجارية',
         'cardpro'   => 'تفاصيل' ,
         //end shop page

         //shop single buy fast//
         "formachat" => "formulaire d'achat",

         /////////////checkout//////////////
         'alert'     => 'المعلومات اللتي ادخلتموها كانت فقط للتسجيل او دخول لحسابك.املئ استمارة (معلومات حول الزبون) لكي نتأكد انك زبون جيد و ليس (spam).',
         'info'      => 'معلومات على الزبون',
         'nom'       => 'اسم عائلي',
         'prenom'	 => 'اسم',
         'wilaya'    => 'ولاية',
         'commune'  => 'بلدية',
         'num'		 => 'رقم الهاتف',
         'submit'    => 'ارسل معلومات',
         'panier'	 => 'سلة التسويقi',
         'nombre'    => 'عدد المنتجات المشتراة',
         'supprime'  => 'الحذف',
         'produit'   => 'المنتوج',
         'qtt'       => 'كميات',
         'prix'      => 'السعر',
         'total'     => 'مجموع السعر',
         'actualise' => 'تأكيد الحذف',
         'continue'  => "إجراء عملية شراء أخرى",
         'submit2'	 => 'ارسل معلومات',
         'annonce'   => 'لحذف جدول يرجى التحديد على يسار طاولة السلة والنقر فوق تحديث',

         ////////////contact page //////////////////////
         'contactus'  => 'اتصل بنا',
         'text_contact'  => 'املأ النموذج أدناه ، وانقر فوق إرسال ، وسنقوم بالرد عليك عبر البريد الإلكتروني في أقرب وقت ممكن.',
         'label_name' => 'اسم',
         'placeholder_name' => 'مثال: ياسين حميان',
         'label_email'      => 'email',
         'placeholder_email'          => 'exemple : yacinehamiane94@gmail.com',
         'label_sujet'       => 'موضوع',
         'placeholder_sujet'        => 'مثال: لم يتم استلام الشراء',
         'msg'        => 'رسالة',
         'btn_concact' => 'أرسل ',
         ///////////page d'inscription/////////////
         'lien_co'   => 'إذا كنت مسجلا و لديك حساب ، انقر هنا لتسجيل الدخول',
         'nom'       => 'اللقب',
         'prenom'    => 'الإسم',
         'num'       => 'رقم الهاتف',
         'wilaya'    => 'ولاية',
         'commune'   => 'بلدية',
         'inscrire'  => "تسجيل",
         'connect'   => ' الدخول',
         //////////////footer///////
         'info'      => "مزيد من المعلومات"
	);

	return $lang[$phrase];

}

 ?>
