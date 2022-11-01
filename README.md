# Resume-Builder
 Resume Builder is Laravel framework-based dynamic resume maker website. After login user can create his own RESUME with his own requirements. Users can download the Resume also send generated Resume.pdf via email.

 1. Install Laravel 8 : `composer create-project --prefer-dist laravel/laravel test "8.*"`
 2. Install dompdf : `composer require barryvdh/laravel-dompdf`
 3. Go to `config/app.php`

```php
'providers' => [
    Barryvdh\DomPDF\ServiceProvider::class,
],

'aliases' => [
    'PDF' => Barryvdh\DomPDF\Facade::class,
]
```



4. `Exception`  ==  `The PHP GD extension is required, but is not installed.`
   + Sloution : open Xampp(Apache->Config->php.ini) 
      + Then search `extention=gd`  Then remove `;` before it. Save -> clase
      + Stop xampp and rerurn again
      + Close your program and open it again


5. `Save cv_pdf in local folder` 
```php
    // Pdf::loadView('view', ['key' => $value])->save(public_path('Asset/pdfFolder/cv.pdf'));
    Pdf::loadView('pdf', ['userdata' => $userdata])->save(public_path(pathName));
```
