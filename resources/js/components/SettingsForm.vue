<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <validation-observer ref="settings_form">
                                    <div class="row">
                                        <div class="col-md-6 form-group" >
                                            <label >Active State?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="setting.active_state"
                                                :sync="true"
                                                :labels="true"
                                                @change="changeActive"
                                            />

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="javascript:;" @click="saveSettingsForm" class="btn btn-primary" >Save</a>
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
    name: "SettingsForm",
    data : function() {
        return {
            settings:{
                home_nav_header:0,
                about_nav_header:0,
                product_nav_header:0,
                news_nav_header:0,
                contact_nav_header:0,
                dealer_locator_nav_header:0,
                store_nav_header:0,
                support_nav_header:0,
                login_nav_header:0,
                banner_slider_section:0,
                icon_section:0,
                product_section:0,
                logo_description_section:0,
                fullwidth_image_section1:0,
                logo_icon_and_description_with_boxes_section:0,
                title_description_with_accordian_section:0,
                fullwidth_video_section:0,
                fullwidth_image_section2:0,
                news_blogs_section:0,
                fullwidth_image_section3:0,
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
        }
    },
}
</script>

<style scoped>

</style>
