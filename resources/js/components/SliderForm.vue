<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="slider_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Title" rules="required" v-slot="v">
                                                <label>Slider Title</label>
                                                <input class="form-control" type="text" name="Title" v-model="slider.title" placeholder="Title">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Description" rules="required" v-slot="v">
                                                <label>Slider Desc</label>
                                                <input class="form-control" type="text" name="Description" v-model="slider.description" placeholder="Description">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Banner Image(W:500px x H:500px)</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <validation-provider name="Brand Design" rules="required" v-slot="v">
                                                    <label >Select Colour</label>
                                                    <v-select name="brand_design" placeholder="Select Design"
                                                              v-model="slider.colour"
                                                              :options="colours"
                                                              label="name" code="id"
                                                              :reduce="label => label.id"

                                                    ></v-select>
                                                    <span class="field-errors">{{ v.errors[0] }}</span>
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="saveSliderForm" class="btn btn-primary" >Save</a>
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
    name: "SliderForm",
    data : function() {
        return {
            slider:{
                title:'',
                description:'',
                banner_image:[],
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
            brand: brand,
            colours:['white','black']
        }
    },
    methods: {

        handleFileUpload() {
            console.log(this.$refs.form_logo.files[0]);
            this.slider.banner_image = this.$refs.form_logo.files[0];
        },
        getFormData() {
            var formData = new FormData();
            formData.append('banner', this.slider.banner_image);
            formData.append('description', this.slider.description);
            formData.append('title', this.slider.title);
            formData.append('colour', this.slider.colour);
            return formData;
        },
        saveSliderForm:function () {
            this.$refs['branding_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;

                var post_url = `/admin/brands`;
                if(this.is_edit){
                    var post_url = `/admin/brands/`+this.brand.id;
                }
                axios.post(post_url, this.getFormData(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    this.isLoading = false;
                    if (response.data.status == 'OK') {
                        this.$toast.success(response.data.message, {'duration': 5000});
                        setTimeout( () => {
                            window.location.href = '/admin/brands';
                        }, 1000);
                    }
                    if (response.data.status == 'ERROR') {
                        console.log(response.data.message);
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
        this.is_edit = this.brand ? 1 : 0 ;
        if(this.brand){

        }
    }
}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
