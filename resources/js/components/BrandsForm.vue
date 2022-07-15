<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="branding_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Brand Name" rules="required" v-slot="v">
                                                <label>Brand Name</label>
                                                <input class="form-control" type="text" name="name" v-model="branding.name" placeholder="Brand Name">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Brand Logo(W:210px x H:50px)</label>
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
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Cover Image(W:500px x H:500px)</label>
                                                <div>
                                                    <input accept="image/*"
                                                           id="cover"
                                                           class="form-control"
                                                           ref="form_cover"
                                                           type="file"
                                                           v-on:change="handleFileUploadCover()"
                                                           name="cover" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="savebrandingForm" class="btn btn-primary" >Save</a>
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
            branding:{
                name:'',
                logo_url:[],
                conver_image:[],
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
        }
    },
    methods: {
        handleFileUpload() {
            console.log(this.$refs.form_logo.files[0]);
            this.branding.logo_url = this.$refs.form_logo.files[0];
        },
        handleFileUploadCover() {
            this.branding.conver_image = this.$refs.form_cover.files[0];
        },

        getFormData() {
            var formData = new FormData();
            formData.append('logo', this.branding.logo_url);
            formData.append('cover', this.branding.conver_image);
            formData.append('name', this.branding.name);
            return formData;
        },
        savebrandingForm:function () {
            this.$refs['branding_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;
                var post_url = `/admin/brands`;
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
