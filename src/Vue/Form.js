var Errors = require('./Errors');
var axios = require('axios');
module.exports = class {
    constructor(data) {
        this.originalData = data;
        this.captchaValidated = false;
        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    }

    data() {
        var data = Object.assign({}, this);
        delete data.originalData;
        delete data.errors;
        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit(requestType, url) {
        var $this = this;
        $this.formSubmitting = true;
        axios[requestType](url, this.data())
            .then($this.onSuccess.bind(this))
            .catch($this.onFail.bind(this));
    }

    onSuccess(response) {
        this.formSubmitting = false;
        this.errors.clear();
        this.onSuccess(response.data);
    }

    onFail(error) {
        this.formSubmitting = false;
        this.errors.record(error.response.data);
        this.onError();
    }
}