<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Select Section</label>
                                                    <v-select name="brand_design" placeholder="Select Section"
                                                              v-model="flipbook.section_selector"
                                                              :options="selectors"
                                                    ></v-select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-show="flipbook.section_selector == 'section2'">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <h2>Section2 Details</h2>
                            </div>
                        </div>
                        <validation-observer ref="section2_details_form">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <validation-provider name="heading" rules="required" v-slot="v">
                                            <label>Heading</label>
                                            <input class="form-control" type="text" name="Heading" v-model="flipbook.section2_heading" placeholder="Heading">
                                            <span class="field-errors">{{ v.errors[0] }}</span>
                                        </validation-provider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <validation-provider name="title" rules="required" v-slot="v">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="Title" v-model="flipbook.section2_title" placeholder="Title">
                                            <span class="field-errors">{{ v.errors[0] }}</span>
                                        </validation-provider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <ckeditor name="description2"  v-model="flipbook.section2_description" ></ckeditor>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 ">
                                        <a href="javascript:;" @click="section2_detailsForm" class="btn btn-primary" >Save</a>
                                    </div>
                                    <div class="col-md-3 ">
                                        <a href="javascript:;" v-if="flipbook.id" @click="addVideoSlider" class="btn btn-primary" >Add Video Slider</a>
                                    </div>
                                </div>

                            </div>
                        </validation-observer>
                        <div class="card-body" v-if="flipbook_slider.length">
                            <h5>Video Slider Section</h5>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Video</th>
                                        <th><!--Actions --></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(detail,index) in flipbook_slider">
                                        <td class="align-middle" v-if="detail.mime_type == 'image'">
                                            <img
                                                :src="'/storage/' + detail.image"
                                                alt="Image"
                                                style="max-width: 120px; max-height: 120px;"
                                            />
                                        </td>
                                        <td class="align-middle" v-else>
                                            <a
                                                :href="'/storage/'+detail.image"
                                                target="_blank"
                                            >Video Link</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-icon-only text-light btn-actions-dropdown" data-toggle="dropdown" href="#" role="button"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" @click="confirmDelete(detail.id,'slider_section')" href="javascript:;">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right"></div>
                        </div>
                        </div>
                    <div class="card-body" v-show="flipbook.section_selector == 'section3'">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <h2>Section3 Details</h2>
                            </div>
                        </div>
                        <validation-observer ref="section3_details_form">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <validation-provider name="heading" rules="required" v-slot="v">
                                            <label>Heading</label>
                                            <input class="form-control" type="text" name="Heading" v-model="flipbook.section3_heading" placeholder="Heading">
                                            <span class="field-errors">{{ v.errors[0] }}</span>
                                        </validation-provider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <validation-provider name="title" rules="required" v-slot="v">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="Title" v-model="flipbook.section3_title" placeholder="Title">
                                            <span class="field-errors">{{ v.errors[0] }}</span>
                                        </validation-provider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <ckeditor name="description3"  v-model="flipbook.section3_description" ></ckeditor>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <validation-provider name="button_link" rules="required" v-slot="v">
                                            <label>Button link</label>
                                            <input class="form-control" type="text" name="Title" v-model="flipbook.section3_btn_link" placeholder="Button Link">
                                            <span class="field-errors">{{ v.errors[0] }}</span>
                                        </validation-provider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label for="logo">Image</label>
                                            <div>
                                                <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                       id="flipbook_section3_image"
                                                       class="form-control"
                                                       ref="flipbook_section3_image"
                                                       type="file"
                                                       v-on:change="handleSection3Image()"
                                                       name="flipbook_section3_image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right mt-n3">
                                        <div  v-if="this.flipbook.section3_image">
                                            <img
                                                :src="'/storage/' + this.flipbook.section3_image"
                                                alt="Image"
                                                style="max-width: 120px; max-height: 120px;"
                                            />
                                        </div>
                                        <div><span>Section3 Image</span></div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 text-left">
                                        <a href="javascript:;" @click="section3_detailsForm" class="btn btn-primary" >Save</a>
                                    </div>
                                </div>
                            </div>
                        </validation-observer>
                    </div>
                    </div>
                </div>
            </div>
        <b-modal id="modal-scoped" ref="add_video_section" v-if="this.flipbook.id">
            <template #modal-header="{ close }">
                <h4 class="modal-title">Add video Section</h4>
                <b-button class="close" @click="close()">
                    <span aria-hidden="true">&times;</span>
                </b-button>
            </template>
            <template #default="{ hide }">
                <validation-observer ref="form_video_section">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group required">
                                <label for="logo">Upload Video</label>
                                <div>
                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                           id="icon_section_video"
                                           class="form-control"
                                           ref="icon_section_video"
                                           type="file"
                                           v-on:change="handleFileVideoSection()"
                                           name="icon_section_video" />
                                </div>
                            </div>
                        </div>
                    </div>
                </validation-observer>
            </template>
            <template #modal-footer="{ ok, cancel, hide }">
                <b-button variant="primary" @click="saveVideoSection" >Save Changes
                </b-button>
                <b-button variant="default" @click="cancel()"> Cancel</b-button>

            </template>
        </b-modal>
        <b-modal ref="confirm_delete_details" id="modal-scoped">
            <template #modal-header="{ close }">
                <h4 class="modal-title">Confirm Delete</h4>
                <b-button class="close" @click="close()">
                    <span aria-hidden="true">&times;</span>
                </b-button>
            </template>
            <template #default="{ hide }">
                <div class="">Are you sure you would like to delete this Details?</div>
            </template>
            <template #modal-footer="{ ok, cancel, hide }">
                <b-button variant="danger" @click="destroyDetail()">Yes, Delete</b-button>
                <b-button variant="default" @click="cancel()">Cancel</b-button>

            </template>
        </b-modal>
        </div>



</template>

<script>
import CKEditor from "ckeditor4-vue";

export default {
    name: "FlipbookForm",
    components: {
        ckeditor: CKEditor.component
    },
    data : function() {
        return {
            flipbook:{
                section_selector:'',
                section2_heading:'',
                section2_title:'',
                section2_description:'',
                section3_heading:'',
                section3_title:'',
                section3_description:'',
                section3_btn_link:'',
                section3_image:'',
                id:''
            },
            flipbook_slider:flipbook_slider,
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            brand: brand,
            flipbooks:flipbooks,
            new_section_video:{
                video:'',
            },
            selectors:['section1','section2','section3'],
            ckeditor_config: {
            },
        }

    },
    methods:{
        destroyDetail:function(){

            if(this.delete_section == 'slider_section'){
                var post_url = '/admin/mybrand/icon/section-delete-slider/'+ this.delete_target;
            }

            axios.delete(post_url).then(response => {
                if (response.data.status == "OK") {
                    this.$refs['confirm_delete_details'].hide();
                    this.delete_target = 0;
                    window.location.reload();
                }
            });
        },
        confirmDelete: function (detail_id,section) {
            this.delete_section = section;
            this.delete_target = detail_id;
            this.$refs['confirm_delete_details'].show();
        },
        addVideoSlider:function(){
            this.$refs['add_video_section'].show();
        },
        getSectionVideoData() {
            var formData = new FormData();
            formData.append('image', this.new_section_video.video);
            return formData;
        },
        handleFileVideoSection(){
            this.new_section_video.video = this.$refs.icon_section_video.files[0];
        },
        saveVideoSection:function () {
            this.$refs['form_video_section'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;
                var post_url = `/admin/mybrand/flipbook/section2-video/`+this.flipbook.id;
                axios.post(post_url, this.getSectionVideoData(), {
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
        handleSection3Image:function(){

            this.flipbook.section3_image = this.$refs.flipbook_section3_image.files[0];
        },
        getSection2Data:function(){
            var formData = new FormData();
            formData.append('section_selector', this.flipbook.section_selector);
            formData.append('section2_heading', this.flipbook.section2_heading);
            formData.append('section2_title', this.flipbook.section2_title);
            formData.append('section2_description', this.flipbook.section2_description);
            formData.append('id', this.flipbook.id);

            return formData;
        },
        getSection3Data:function(){
            var formData = new FormData();
            formData.append('section_selector', this.flipbook.section_selector);
            formData.append('section3_heading', this.flipbook.section3_heading);
            formData.append('section3_title', this.flipbook.section3_title);
            formData.append('section3_image', this.flipbook.section3_image);
            formData.append('section3_btn_link', this.flipbook.section3_btn_link);
            formData.append('section3_description', this.flipbook.section3_description);
            formData.append('id', this.flipbook.id);

            return formData;
        },
        section2_detailsForm:function () {
            this.$refs['section2_details_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;

                var post_url = `/admin/mybrand/flipbook/section2/store/`+this.brand.id;
                axios.post(post_url, this.getSection2Data(), {
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
        section3_detailsForm:function () {
            this.$refs['section3_details_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;

                var post_url = `/admin/mybrand/flipbook/section3/store/`+this.brand.id;
                axios.post(post_url, this.getSection3Data(), {
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
        }
    },
    mounted: function() {
        if(this.flipbooks){
            this.flipbook = this.flipbooks;
        }

    }
}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
