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
                                                <label >Select Design</label>
                                                    <v-select name="brand_design" placeholder="Select Section"
                                                              v-model="flipbook.section_selector"
                                                              :options="selectors"
                                                              label="name" code="id"
                                                              :reduce="label => label.id"
                                                    ></v-select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="flipbook.section_selector == 'section2'">
                        <div class="row mb-2">
                            <div class="col-lg-12">
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
                                        <div class="form-group">
                                            <label>Description</label>
                                            <ckeditor name="description" :config="ckeditor_config" v-model="new_section.description" ></ckeditor>
                                        </div>
                                    </div>
                                </div>
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
                section3_image:'',
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            selectors:['section1','section2','section3']
        }
    },
}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
