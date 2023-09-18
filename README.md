# QRC maker
Quick Response (QR) Code Generator Application

## Check out the project at [QRC Maker.io](https://auenetengtech.com.ng/qrcmaker/)

![image](https://github.com/ugoem/qrcmaker/assets/24642339/73c159ff-3fd9-4fc6-b65f-6155808edd7b)

QR Code stands for Quick Response code. Initially, it was developed for the automotive industry, but later it was widely used in a wider range of applications. By using this, we can replace a large amount of information, such as smart card data, consumer advertising, website urls, telephone numbers, articles, and much more, into just a two-dimensional matrix Barcode. It is capable of storing up to 4,296 alphanumeric characters of arbitrary text. The generated code can be read by a QR-Code reader software using optical smart devices. PHP provides several libraries to generate QR code. In PHP, it is very simple to generate QR codes

# Generating QR Code using phpqrcode library
* Here, we are using the QR Code library. PHP QR Code is an open source library for generating QR Code, 2-dimensional barcode. To use this, first W we downloaded the QR Code library from Github, OR from sourceforge.

* Download and extract the folder and then place the extracted folder in your appropriate project directory where you want to execute it. Now create a PHP file in the same folder where you placed the phpqrcode folder. We need to include the 'qrlib.php' file to use a function named 'png()'. This function is inside the QRcode class, which outputs a QR code directly in the browser when we pass some text as a parameter.

# Syntax
`` QRcode::png(text, file, ecc, pixel_size, frame_size);``

* text- the text message which needs to be in a QR code,
* file- location to save the generated QR code,
* ecc- to specify the error correction capability of the QR code, it has four levels: L, M, Q and H,
* pixel_size- to specify the pixel size of QR,
* frame_size- to specify the size of the QR.
  
![image](https://github.com/ugoem/qrcmaker/assets/24642339/d0f0428f-fcd2-4ce3-af30-db338c015dae) ![image](https://github.com/ugoem/qrcmaker/assets/24642339/97586cd6-6ed7-42af-8509-8e7bbcf15874)



![image](https://github.com/ugoem/qrcmaker/assets/24642339/933c582c-bbf2-44d8-82ba-bc9366b41dd7)


# Dynamic vs Static QR Codes
* The outcome of both are pretty similar. They have their differences when it comes to changes, updates, stats, track.

## Dynamic QR Codes
* With Dynamic Qr Codes you can create a customized landing page for your QR Code that can be changed and updated whenever you want no matter if the QR Code is created or even if it went public.

* Dynamic Qr Codes also give you statistics of how many people scanned your QR Codes, from where and on what date.

* This QR Code type is most used by business owners (restaurants, gyms, clothing stores, etc.), artists, influencers, and non-developers users.

 * Dynamic QR Codes
 * Customized Colors & Shapes for QR Codes
 * QR Code Statistics
 * Fully customized landing pages
 * No Coding Required

# Static QR Codes
* Static QR Codes on the other hand can't be changed or updated once created and went public.

* Also, static QR Codes do NOT give you statistics of how many people scanned your QR Codes, from where and on what date.

* This QR Code type is most used by developers and users who can create an url (landing page) for themselves.

 * Customized Color & Shape
 * Download SVG & PNG file
 * No Coding Required
 * QR Code Statistics
 * Fully customized landing pages

* Copy and paste the given code in your PHP file and replace the value in the content variable.

  ```
<?php
    include "phpqrcode/qrlib.php" ;
    $content = "http://www.etutorialspoint.com/" ;
    QRcode::png($content) ;
?>
```
When you execute the above code, you will get this QR Code.
