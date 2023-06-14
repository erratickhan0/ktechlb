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
                                        <div class="col-6 text-right mt-n3">
                                            <div v-if="is_edit">
                                                <img
                                                    :src="'/storage/' + this.brand.logo"
                                                    alt="Brand Logo"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Brand Logo</span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Cover Image</label>
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
                                        <div class="col-6 text-right mt-n3">
                                            <div v-if="is_edit">
                                                <img
                                                    :src="'/storage/' + this.brand.cover"
                                                    alt="Cover Image"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Cover Image</span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <validation-provider name="Brand Design" rules="required" v-slot="v">
                                                <label >Select Design</label>
                                                <v-select name="brand_design" placeholder="Select Design"
                                                          v-model="branding.brand_design_id"
                                                          :options="brand_designs"
                                                          label="name" code="id"
                                                          :reduce="label => label.id"

                                                ></v-select>
                                                 <span class="field-errors">{{ v.errors[0] }}</span>
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <validation-provider name="Product Design" rules="required" v-slot="v">
                                                    <label >Select Product Design</label>
                                                    <v-select name="product_design" placeholder="Select Design"
                                                              v-model="branding.product_design_id"
                                                              :options="product_designs"
                                                              label="name" code="id"
                                                              :reduce="label => label.id"

                                                    ></v-select>
                                                    <span class="field-errors">{{ v.errors[0] }}</span>
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <validation-provider name="Detail Design" rules="required" v-slot="v">
                                                    <label >Select Detail Design</label>
                                                    <v-select name="detail_design" placeholder="Select Design"
                                                              v-model="branding.detail_design_id"
                                                              :options="detail_designs"
                                                              label="name" code="id"
                                                              :reduce="label => label.id"

                                                    ></v-select>
                                                    <span class="field-errors">{{ v.errors[0] }}</span>
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group" >
                                            <label >Active State?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="branding.active_state"
                                                :sync="true"
                                                :labels="true"
                                                @change="changeActive"
                                            />

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
                active_state:0,
                brand_design_id : '',
                product_design_id:'',
                detail_design_id:''
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
            brand_designs: brand_designs,
            product_designs: product_designs,
            detail_designs: detail_designs,
            brand: brand
        }
    },
    methods: {
        changeActive(active){
            if(active.value == true){
                this.branding.active_state = 1;
            }
            else{
                this.branding.active_state = 0;
            }
        },
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
            formData.append('active_state', this.branding.active_state);
            formData.append('name', this.branding.name);
            formData.append('brand_design_id', this.branding.brand_design_id);
            formData.append('product_design_id', this.branding.product_design_id);
            formData.append('detail_design_id', this.branding.detail_design_id);

            return formData;
        },
        savebrandingForm:function () {
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
                                window.location.href='/admin/brands';

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
           this.branding.name = this.brand.name;
            this.branding.active_state = this.brand.active_state;
            this.branding.brand_design_id = JSON.parse(this.brand.brand_design_id);
            this.branding.product_design_id = JSON.parse(this.brand.product_design_id);
            this.branding.detail_design_id = JSON.parse(this.brand.detail_design_id);
        }
    }
}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
