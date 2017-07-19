<template>
	<div class="row">
		<div v-if="!recaptchaLoaded">
			<div class="alert alert-warning text_center" role="alert"><strong>Loading Recaptcha Script...</strong></div>
		</div>

		<div v-if="sentSuccessfully" class="alert alert-success text_center" role="alert">
			{{form.name}} ({{form.email}}) successfully sent this message: <strong>"<span v-html="form.message"></span></strong>"
		</div>
		
		<div class="form_error" v-if="form.errors.has('feedback')" >
			<div class="alert alert-danger text_center" role="alert"><strong v-text="form.errors.get('feedback')"></strong></div>
		</div>
				
		<form v-show="showForm" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<form-field :form="form" label="NAME" field="name"></form-field>
			<form-field :form="form" label="EMAIL" field="email"></form-field>
			<form-field :form="form" label="MESSAGE" field="message"></form-field>
			<div class="col-sm-12">
				<p v-if="form.formSubmitting">Sending Enquiry...</p>
				<button
					id="confirmrecaptcha"
					v-if="!form.formSubmitting"
					class="btn btn-info"
					@click='initReCaptcha'>
					Send
				</button>
			</div>
		</form>
	</div>
</template>
<script>
	var Form = require('./Form');
	import FormField from './formField.vue';
	export default{
		name:"App",
		components:{FormField},
		mounted(){
			this.initReCaptcha();
		},
		methods:{
			onSubmit(){
				this.form.submit('post', '/enquiry.php');
			},
			initReCaptcha(){
		        setTimeout(() => {
		            if(typeof grecaptcha === 'undefined') {
		                this.initReCaptcha();
		            }
		            else {
		            	this.recaptchaLoaded = true;
		                grecaptcha.render('confirmrecaptcha', {
		                    sitekey: this.recaptchaSiteKey,
		                    size: 'invisible',
		                    callback: this.successToken
		                });
		            }
		        }, 1000);
			},
			successToken(token){
				this.form.captchaToken = token;
				this.onSubmit();
			}
		},	
		computed:{
			showForm(){
				return !this.sentSuccessfully && this.recaptchaLoaded;
			}
		},
		data () {
			let self = this;
			return {
				sentSuccessfully:false,
				recaptchaLoaded:false,
			  	recaptchaSiteKey,
				form:new Form({
					name:'',
					email:'',
					message:'',
					captchaToken:'',
					sendTo:'lewis@cube-design.co.uk',
					formSubmitting:false,
					response:false,
					onSuccess(data){
						self.sentSuccessfully = true;
					},
					onError(){
						self.initReCaptcha();
					}
				}),
			}
		}
	}
</script>