<template>
	<div>
		<div class="col-sm-12 form_field">
			<label class="contact_label">{{label}}</label>
			<input class="form-control" type="text" name="name" v-model="form[field]"> 
			<div class="form_error" v-if="form.errors.has(field)" v-text="form.errors.get(field)"></div>
		</div>
		<div class="clear"></div>
	</div>
</template>
<script>
    export default {
        name: "FormField",
        props: {
            label: {
                required: true
            },
            field: {
                required: true
            },
            form: {
                required: true
            }
        }
    }
</script>