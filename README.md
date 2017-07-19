# GoogleInvisibleRecaptchaWithVueJS
Integrating VueJS with Google's Invisible Recaptcha

## Please follow these steps once you have cloned the repo:
- run npm install or 'yarn' to add the node modules needed
- in the 'scripts' section of package.json please rename 'vuerecaptcha.dev' in the 'phpserve' method to your local domain if it is set differently
- run composer install, then composer dump-autoload -o
- rename config.bak.php to config.php and rename the values to those specific to your domain
- run npm run dev to begin using the code.

### Please note the following
- Please generate your invisible recaptcha details before proceeding (ie for vuerecaptcha.dev in this case).
- This was developed using Laravel Valet to run the server. 
- The above isn't essential but your local url will need to resemble something like vuerecaptcha.dev or vuerecaptcha.app etc, not localhost:8000 or any of those domains. Google doesn't like those from my understanding but please feel free to set me straight on that one.
- Essentially, when you run 'npm run dev' this will open a 'localhost:3000' window in your browser. It's unlikely this will work using that so make sure that your local domain url matches up with whatever you registered in the Google Recaptcha Admin Panel (vuerecaptcha.dev in this case).
