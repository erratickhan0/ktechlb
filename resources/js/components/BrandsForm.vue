<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="onboarding_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Brand Name" rules="required" v-slot="v">
                                                <label>Brand Name</label>
                                                <input class="form-control" type="text" name="name" v-model="onboarding.agency_name" placeholder="Brand Name">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group" >
                                            <label >Are they an Agency?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="onboarding.is_agency"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Domain Name" rules="required" v-slot="v">
                                                <label>Domain</label>
                                                <input class="form-control" type="text" name="domain_name" v-model="onboarding.domain_name" placeholder="Domain">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="first_name" rules="required" v-slot="v">
                                                <label>User First Name</label>
                                                <input class="form-control" type="text" name="first_name" v-model="onboarding.first_name" placeholder="First Name">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="last_name" rules="required" v-slot="v">
                                                <label>User Last Name</label>
                                                <input class="form-control" type="text" name="first_name" v-model="onboarding.last_name" placeholder="Last Name">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="email" rules="required|email" v-slot="v">
                                                <label>User Email</label>
                                                <input class="form-control" type="text" name="email" v-model="onboarding.email" placeholder="Email">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="password" rules="required|min:8" v-slot="v">
                                                <label>User Password</label>
                                                <input class="form-control" type="text" name="password" v-model="onboarding.password" placeholder="Password">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <a href="javascript:;" class="btn btn-primary btn-xs" @click="generatePassword" >Generate Password</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Logo</label>
                                                <div>
                                                    <input accept="image/*"
                                                           id="logo"
                                                           class="form-control"
                                                           ref="form_logo"
                                                           type="file"
                                                           v-on:change="handleFileUpload()"
                                                           name="logo" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="saveOnboardingForm" class="btn btn-primary" >Save</a>
                                        </div>
                                    </div>
                                </validation-observer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "BrandsForm",
    data : function() {
        return {
            onboarding:{
                industry:'',
                business_type:'',
                agency_name:'',
                domain_name:'',
                industry_id:'',
                business_type_id:'',
                is_agency: 0,
                logo_url:[],
                password:'',
                first_name:'',
                last_name:'',
                email:''
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
        }
    },
    methods: {
        generatePassword(){
            this.onboarding.password = this.randomPassword(8);
        },
        randomPassword(length=8) {
            var randomchars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * randomchars.length);
                pass += randomchars.charAt(i);
            }
            return pass;
        },
        handleFileUpload() {
            console.log(this.$refs.form_logo.files[0]);
            this.onboarding.logo_url = this.$refs.form_logo.files[0];
        },
        updateIndustryId: function(event){
            this.onboarding.industry_id = event.id;
            console.log(event);
        },
        updateBusinessTypeId: function(event){
            this.onboarding.business_type_id = event.id;
            console.log(event);
        },
        getFormData() {
            var formData = new FormData();
            formData.append('logo', this.onboarding.logo_url);
            formData.append('agency_name', this.onboarding.agency_name);
            formData.append('domain', this.onboarding.domain_name);
            formData.append('industry_id', this.onboarding.industry_id);
            formData.append('business_type_id', this.onboarding.business_type_id);
            formData.append('first_name', this.onboarding.first_name);
            formData.append('last_name', this.onboarding.last_name);
            formData.append('email', this.onboarding.email);
            formData.append('password', this.onboarding.password);
            formData.append('is_agency', this.onboarding.is_agency);
            return formData;
        },
        saveOnboardingForm:function () {
            this.$refs['onboarding_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;
                var post_url = `/admin/onboarding-form`;
                axios.post(post_url, this.getFormData(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    this.isLoading = false;
                    if (response.data.status == 'OK') {
                        this.$toast.success(response.data.message, {'duration': 5000});
                        setTimeout( () => {
                            location.reload();
                        }, 1000);
                    }
                    if (response.data.status == 'ERROR') {
                        this.$toast.error(response.data.message, {'duration': 5000});
                    }
                }).catch(error => {
                    console.log(JSON.stringify(error));
                    this.$toast.error(JSON.stringify(error), {'duration': 5000});

                });
            });
        },
    },

    mounted: function() {
    }
}
</script>

<style scoped>

</style>
