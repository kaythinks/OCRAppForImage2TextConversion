# OCR App.

This is an optical character recognition App built with the KayPHP framework powered by the Tesseract binary.

NOTE : - You will need to install the Tesseract binary on your system/server for this to work. 

Run (For MacOS)
```
$ brew install tesseract-lang
```
Run (For Linux)
```
$ sudo apt-get install tesseract-ocr
```

# Installation

Run 
```
$ git clone https://github.com/kaythinks/OCRAppForImage2TextConversion.git
```

# STARTING

		Run the following to start the server and enjoy application
		~ php - S localhost:7777 
		~ composer install 
		~ composer dump-autoload
		~ Change the EnvExample.php file to Env.php and change the class name to Env

# TESTING
    Run in the root folder :
    vendor/bin/phpunit Tests/ExampleTest.php
