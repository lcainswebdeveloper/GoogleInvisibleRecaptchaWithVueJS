# GoogleInvisibleRecaptchaWithVueJS
Integrating VueJS with Google's Invisible Recaptcha. This repo demonstrates how I work with these technologies both on the client and server side. Credit to Jeffrey Way and Laracasts for providing the foundations of the 'Form.js' and 'Error.js' classes. These provide a really nice way to do validation and handle form inputs using Vue so I've added that in as well. Hopefully there are bits in there which you may find useful.

## Please follow these steps once you have cloned the repo:
- run npm install or 'yarn' to add the node modules needed
- in the 'scripts' section of package.json please rename 'vuerecaptcha.dev' in the 'phpserve' method to your local domain if it is set differently
- run composer install, then composer dump-autoload -o
- rename config.bak.php to config.php and rename the values to those specific to your domain
- run npm run dev to begin using the code.

### Please note the following
- I've just used Bootstrap for a minimally nice UI. The focus isn't on the visuals, except for where they provide feedback.
- Please generate your invisible recaptcha details before proceeding (ie for vuerecaptcha.dev in this case).
- This was developed using Laravel Valet to run the server. 
- The above isn't essential but your local url will need to resemble something like vuerecaptcha.dev or vuerecaptcha.app etc, not localhost:8000 or any of those domains. Google doesn't like those from my understanding but please feel free to set me straight on that one.
- When you run 'npm run dev' this will open a 'localhost:3000' window in your browser. It's unlikely this will work using that so make sure that your local domain url matches up with whatever you registered in the Google Recaptcha Admin Panel (vuerecaptcha.dev in this case).

#### HELPFUL AND CONSTRUCTIVE CRITICISMS ARE NOT ONLY WELCOME BUT APPRECIATED...
