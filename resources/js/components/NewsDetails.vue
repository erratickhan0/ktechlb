<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="news_details_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Title" rules="required" v-slot="v">
                                                <label>News Title</label>
                                                <input class="form-control" type="text" name="Title" v-model="news_details.title" placeholder="Title">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Image(W:500px x H:500px)</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                           id="cover"
                                                           class="form-control"
                                                           ref="news_details_image"
                                                           type="file"
                                                           v-on:change="handleFileImage()"
                                                           name="news_details_image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.news_details.image">
                                                <img
                                                    :src="'/storage/' + this.news_details.image"
                                                    alt="Home Image"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Home Image</span></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Details Title" rules="required" v-slot="v">
                                                <label>Details  Page Title</label>
                                                <input class="form-control" type="text" name="name" v-model="news_details.details_title" placeholder="Details Title">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Details Title" rules="required" v-slot="v">
                                                <label>Details  Page Subtitle</label>
                                                <input class="form-control" type="text" name="name" v-model="news_details.details_subtitle" placeholder="Details SubTitle">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                    <label >Select Text Colour</label>
                                                    <v-select name="brand_design" placeholder="Select Text Colour"
                                                              v-model="news_details.details_title_color"
                                                              :options="colours"
                                                    ></v-select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Background Image1(W:500px x H:500px)</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                           id="news_details_background_image_1"
                                                           class="form-control"
                                                           ref="news_details_background_image_1"
                                                           type="file"
                                                           v-on:change="handleFileBackgroundImage1()"
                                                           name="news_details_background_image_1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.news_details.details_background_image1">
                                                <img
                                                    :src="'/storage/' + this.news_details.details_background_image1"
                                                    alt="Background Image"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Background Image1</span></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Background Image2(W:500px x H:500px)</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                           id="news_details_background_image_2"
                                                           class="form-control"
                                                           ref="news_details_background_image_2"
                                                           type="file"
                                                           v-on:change="handleFileBackgroundImage2()"
                                                           name="news_details_background_image_2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.news_details.details_background_image2">
                                                <img
                                                    :src="'/storage/' + this.news_details.details_background_image2"
                                                    alt="Background Image2"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Background Image2</span></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Details Heading" rules="required" v-slot="v">
                                                <label>Details  Heading</label>
                                                <input class="form-control" type="text" name="name" v-model="news_details.details_heading" placeholder="Details Heading">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Details Description</label>
                                                <ckeditor name="description" :config="ckeditor_config" v-model="news_details.details_description" ></ckeditor>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="savenews_detailsForm" class="btn btn-primary" >Save</a>
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
import CKEditor from "ckeditor4-vue";
export default {
    name: "NewsDetails",
    components: {
        ckeditor: CKEditor.component
    },
    data : function() {
        return {
            news_details:{
                title:'',
                image:'',
                details_title:'',
                details_subtitle:'',
                details_background_image1:'',
                details_background_image2:'',
                details_heading:'',
                details_title_color:'',
                details_description:'',
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
            news: news,
            colours:['white','black'],
            ckeditor_config: {
                enterMode: 2,
                autoParagraph: false,
                allowedContent: "body strong em u code ol ul li a table tbody tr td img span",
                on: {
                    instanceReady: function(ev) {
                        this.dataProcessor.writer.selfClosingEnd = ">";
                    }
                }
            },
        }
    },
    methods: {

        handleFileImage() {
            this.news_details.image = this.$refs.news_details_image.files[0];
        },
        handleFileBackgroundImage1(){
            this.news_details.details_background_image1 = this.$refs.news_details_background_image_1.files[0];
        },
        handleFileBackgroundImage2(){
            this.news_details.details_background_image2 = this.$refs.news_details_background_image_2.files[0];
        },
        getFormData() {
            var formData = new FormData();
            formData.append('image', this.news_details.image);
            formData.append('title', this.news_details.title);
            formData.append('details_title', this.news_details.details_title);
            formData.append('details_subtitle', this.news_details.details_subtitle);
            formData.append('details_background_image1', this.news_details.details_background_image1);
            formData.append('details_background_image2', this.news_details.details_background_image2);
            formData.append('details_heading', this.news_details.details_heading);
            formData.append('details_description', this.news_details.details_description);
            formData.append('details_title_color', this.news_details.details_title_color);

            return formData;
        },
        savenews_detailsForm:function () {
            this.$refs['news_details_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;


                var post_url = `/admin/mybrand/news/update/`+this.news.id;
                axios.post(post_url, this.getFormData(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    this.isLoading = false;
                    if (response.data.status == 'OK') {
                        this.$toast.success(response.data.message, {'duration': 5000});
                        setTimeout( () => {
                          window.location.reload();
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
       this.news_details = this.news;
    }
}
</script>

<style scoped>

</style>
