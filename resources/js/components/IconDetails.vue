<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="icon_details_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Title" rules="required" v-slot="v">
                                                <label>icon Title</label>
                                                <input class="form-control" type="text" name="Title" v-model="icon_details.title" placeholder="Title">
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
                                                           id="cover"
                                                           class="form-control"
                                                           ref="icon_details_image"
                                                           type="file"
                                                           v-on:change="handleFileImage()"
                                                           name="icon_details_image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.icon_details.file_path">
                                                <img
                                                    :src="'/storage/' + this.icon_details.file_path"
                                                    alt="Home Image"
                                                    style="max-width: 120px; max-height: 120px;"
                                                />
                                            </div>
                                            <div><span>Icon Home Image</span></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Details Title" rules="required" v-slot="v">
                                                <label>Details  Page Title</label>
                                                <input class="form-control" type="text" name="name" v-model="icon_details.details_title" placeholder="Details Title">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <validation-provider name="Details Title" rules="required" v-slot="v">
                                                <label>Details  Page Subtitle</label>
                                                <input class="form-control" type="text" name="name" v-model="icon_details.details_subtitle" placeholder="Details SubTitle">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label >Select Text Colour</label>
                                                <v-select name="brand_design" placeholder="Select Text Colour"
                                                          v-model="icon_details.details_title_color"
                                                          :options="colours"
                                                ></v-select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label for="logo">Background Image1</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                           id="icon_details_background_image_1"
                                                           class="form-control"
                                                           ref="icon_details_background_image_1"
                                                           type="file"
                                                           v-on:change="handleFileBackgroundImage1()"
                                                           name="icon_details_background_image_1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.icon_details.details_background_image1">
                                                <img
                                                    :src="'/storage/' + this.icon_details.details_background_image1"
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
                                                <label for="logo">Card Image</label>
                                                <div>
                                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                                           id="icon_details_background_image_2"
                                                           class="form-control"
                                                           ref="icon_details_background_image_2"
                                                           type="file"
                                                           v-on:change="handleFileBackgroundImage2()"
                                                           name="icon_details_background_image_2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right mt-n3">
                                            <div  v-if="this.icon_details.details_background_image2">
                                                <img
                                                    :src="'/storage/' + this.icon_details.details_background_image2"
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
                                                <input class="form-control" type="text" name="name" v-model="icon_details.details_heading" placeholder="Details Heading">
                                                <span class="field-errors">{{ v.errors[0] }}</span>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Details Description</label>
                                                <ckeditor name="description" :config="ckeditor_config" v-model="icon_details.details_description" ></ckeditor>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="saveicon_detailsForm" class="btn btn-primary" >Save</a>
                                        </div>
                                        <div class="col-md-3 text-left">
                                            <a href="javascript:;" @click="addiconection" class="btn btn-primary" >Add Inner page Sections</a>
                                        </div>
                                        <div class="col-md-3 text-left">
                                            <a href="javascript:;" @click="addVideoSlider" class="btn btn-primary" >Add Video Slider</a>
                                        </div>
                                    </div>
                                </validation-observer>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="detail_section.length">
                        <h5>Inner Pages Section</h5>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th><!--Actions --></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(detail,index) in detail_section">
                                    <td class="align-middle name mb-0 text-sm">{{detail.heading}}</td>
                                    <td class="align-middle">{{detail.description}}</td>

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
                                                <a class="dropdown-item" @click="confirmDelete(detail.id,'inner_section')" href="javascript:;">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right"></div>
                    </div>
                    <div class="card-body" v-if="detail_slider.length">
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

                                <tr v-for="(detail,index) in detail_slider">
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
            </div>
        </div>
        <b-modal id="modal-scoped" ref="add_new_section">
            <template #modal-header="{ close }">
                <h4 class="modal-title">Add new Section</h4>
                <b-button class="close" @click="close()">
                    <span aria-hidden="true">&times;</span>
                </b-button>
            </template>
            <template #default="{ hide }">
                <validation-observer ref="form_new_section">
                    <div class="row">
                        <div class="col-12 form-group">
                            <validation-provider name="heading" rules="required" v-slot="v">
                                <label>Heading</label>
                                <input class="form-control" type="text" name="Heading" v-model="new_section.heading" placeholder="Heading">
                                <span class="field-errors">{{ v.errors[0] }}</span>
                            </validation-provider>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group required">
                                <label for="logo">Image</label>
                                <div>
                                    <input accept="image/*,video/mp4,video/x-m4v,video/*"
                                           id="icon_section_image"
                                           class="form-control"
                                           ref="icon_section_image"
                                           type="file"
                                           v-on:change="handleFileImageSection()"
                                           name="new_section_image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <ckeditor name="description" :config="ckeditor_config" v-model="new_section.description" ></ckeditor>
                            </div>
                        </div>
                    </div>

                </validation-observer>
            </template>
            <template #modal-footer="{ ok, cancel, hide }">
                <b-button variant="primary" @click="saveIconSection" >Save Changes
                </b-button>
                <b-button variant="default" @click="cancel()"> Cancel</b-button>

            </template>
        </b-modal>
        <b-modal id="modal-scoped" ref="add_video_section">
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
    name: "iconDetails",
    components: {
        ckeditor: CKEditor.component
    },
    data : function() {
        return {
            icon_details:{
                title:'',
                file_path:'',
                details_title:'',
                details_subtitle:'',
                details_background_image1:'',
                details_background_image2:'',
                details_heading:'',
                details_title_color:'',
                details_description:'',
            },
            new_section:{
                image:'',
                heading:'',
                description:''
            },
            new_section_video:{
                video:'',
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
            icon: icon,
            detail_section: detail_section,
            detail_slider: detail_slider,
            delete_target:'',
            delete_section:'',
            colours:['white','black'],
            ckeditor_config: {
                enterMode: 2,
                autoParagraph: false,
                allowedContent: "body strong em u code ol ul li a table tbody tr td img span",
            },

        }
    },
    methods: {
        addiconection:function(){
            this.$refs['add_new_section'].show();
        },
        addVideoSlider:function(){
            this.$refs['add_video_section'].show();
        },
        confirmDelete: function (detail_id,section) {
          this.delete_section = section;
          this.delete_target = detail_id;
            this.$refs['confirm_delete_details'].show();
        },
        destroyDetail:function(){
            if(this.delete_section == 'inner_section'){
                var post_url = '/admin/mybrand/icon/section-delete/'+ this.delete_target;
            }
            if(this.delete_section == 'slider_section'){
                var post_url = '/admin/mybrand/icon/section-delete-slider/'+ this.delete_target;
            }

            axios.post(post_url, { _method: 'DELETE' }).then(response => {
                if (response.data.status == "OK") {
                    this.$refs['confirm_delete_details'].hide();
                    this.delete_target = 0;
                    window.location.reload();
                }
            });
        },
        handleFileImage() {
            this.icon_details.file_path = this.$refs.icon_details_image.files[0];
        },
        handleFileBackgroundImage1(){
            this.icon_details.details_background_image1 = this.$refs.icon_details_background_image_1.files[0];
        },
        handleFileBackgroundImage2(){
            this.icon_details.details_background_image2 = this.$refs.icon_details_background_image_2.files[0];
        },
        handleFileImageSection(){
            this.new_section.image = this.$refs.icon_section_image.files[0];
        },
        handleFileVideoSection(){
            this.new_section_video.video = this.$refs.icon_section_video.files[0];
        },
        getFormData() {
            var formData = new FormData();
            formData.append('image', this.icon_details.file_path);
            formData.append('title', this.icon_details.title);
            formData.append('details_title', this.icon_details.details_title);
            formData.append('details_subtitle', this.icon_details.details_subtitle);
            formData.append('details_background_image1', this.icon_details.details_background_image1);
            formData.append('details_background_image2', this.icon_details.details_background_image2);
            formData.append('details_heading', this.icon_details.details_heading);
            formData.append('details_description', this.icon_details.details_description);
            formData.append('details_title_color', this.icon_details.details_title_color);

            return formData;
        },
        getSectionData() {
            var formData = new FormData();
            formData.append('image', this.new_section.image);
            formData.append('heading', this.new_section.heading);
            formData.append('description', this.new_section.description);
            return formData;
        },
        getSectionVideoData() {
            var formData = new FormData();
            formData.append('image', this.new_section_video.video);
            return formData;
        },
        saveIconSection:function () {
            this.$refs['form_new_section'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;
                var post_url = `/admin/mybrand/icon/section-update/`+this.icon.id;
                axios.post(post_url, this.getSectionData(), {
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
        saveVideoSection:function () {
            this.$refs['form_video_section'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;
                var post_url = `/admin/mybrand/icon/section-update-video/`+this.icon.id;
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
        saveicon_detailsForm:function () {
            this.$refs['icon_details_form'].validate().then(success => {
                if (!success) {
                    return false;
                }
                this.isLoading = true;


                var post_url = `/admin/mybrand/icon/update/`+this.icon.id;
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
        this.icon_details = this.icon;
    }
}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
