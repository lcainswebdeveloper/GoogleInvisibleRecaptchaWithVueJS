<template>
	<div class="row">
		<div v-if="!recaptchaLoaded"class="alert alert-warning text_center" role="alert"><strong>Loading Recaptcha Script...</strong></div>
		
		<div v-if="sentSuccessfully" class="alert alert-success text_center" role="alert">
			{{form.name}} ({{form.email}}) successfully sent this message: <strong>"<span v-html="form.message"></span></strong>"
		</div>
		<div v-if="form.errors.has('feedback')" class="alert alert-danger text_center" role="alert"><strong v-text="form.errors.get('feedback')"></strong></div>
		
		<form v-show="showForm" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<form-field :form="form" label="NAME" field="name"></form-field>
			<form-field :form="form" label="EMAIL" field="email"></form-field>
			<form-field :form="form" label="MESSAGE" field="message"></form-field>
			<div class="col-sm-12">
				<p v-if="form.formSubmitting">Sending Enquiry...</p>
				<recaptcha-button v-on:recaptcha-loaded="recaptchaLoaded = true" v-on:token-received="successToken" v-if="!form.formSubmitting" ></recaptcha-button>
			</div>
		</form>
	</div>
</template>
<script>
    var Form = require('./Form');
    import FormField from './FormField.vue';
    import RecaptchaButton from './RecaptchaButton.vue';
    export default {
        name: "App",
        components: {
            FormField
        },
        methods: {
        	onSubmit() {
                this.form.submit('post', '/enquiry.php');
            },
            successToken(token) {
                this.form.captchaToken = token;
                this.onSubmit();
            }
        },
        computed: {
            showForm() {
                return !this.sentSuccessfully && this.recaptchaLoaded;
            }
        },
        data() {
            let self = this;
            return {
                sentSuccessfully: false,
                recaptchaLoaded: false,
                form: new Form({
                    name: '',
                    email: '',
                    message: '',
                    captchaToken: '',
                    formSubmitting: false,
                    response: false,
                    onSuccess(data) {
                        self.sentSuccessfully = true;
                    },
                    onError() {
                        self.initReCaptcha();
                    }
                }),
            }
        }
    }
</script>