<template>
	<button
		id="confirmrecaptcha"
		class="btn btn-info"
		@click='initReCaptcha'>
		Send
	</button>
</template>
<script>
	export default{
		name:"RecaptchaButton",
		mounted() {
            this.initReCaptcha();
        },
        methods:{
        	initReCaptcha() {
                setTimeout(() => {
                    if (typeof grecaptcha === 'undefined') {
                        this.initReCaptcha();
                    } else {
                        this.$emit('recaptcha-loaded');
                        grecaptcha.render('confirmrecaptcha', {
                            sitekey: this.recaptchaSiteKey,
                            size: 'invisible',
                            callback: this.successToken
                        });
                    }
                }, 1000);
            },
            successToken(token) {
                this.$emit('token-received', token);
            }
        },
        data(){
        	return {
        		recaptchaSiteKey
        	}
        }
	}
</script>