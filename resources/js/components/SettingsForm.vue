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
                                        <div class="col-md-12 form-group" >
                                        <h3>Nav Settings</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(home)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.home_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(about)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.about_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(product)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.product_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(news)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.news_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(contact)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.contact_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(dealer locator)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.dealer_locator_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(store)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.store_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(support)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.support_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Nav(login)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.login_nav_header"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group" >
                                            <h3>Sections Show/Hide Controls (M1)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(banner slider)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.banner_slider_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(icon)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.icon_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(product)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.product_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(logo description)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.logo_description_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image1)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section1"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Logo Icon desc with boxes)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.logo_icon_and_description_with_boxes_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Accordian/Button)</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.title_description_with_accordian_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Video)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_video_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(News and blogs)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.news_blogs_section"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group" >
                                            <h3>Sections Show/Hide Controls (M2)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Slider M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.slider_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Section2 M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.section2_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Product M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.product_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Video M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_video_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Section5 M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.section5_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Section6 M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.section6_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Accordian M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.accordian_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section1_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image2 M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section2_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image3 M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section3_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(News Blog M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.news_blogs_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Article M2)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.article_section_m2"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group" >
                                            <h3>Sections Show/Hide Controls (M3)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Slider M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.slider_section_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Section2 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.section2_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Product M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.product_section_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Background Desc M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.bg_description_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Slider # 2 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.slider2_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Product Desc M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.product_description_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Video M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_video_section_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Accordian Button M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.accordian_section_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image1 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section1_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image2 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section2_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Fullwidth Image3 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.fullwidth_image_section3_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Section9 M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.section9_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" >
                                            <label >Section(News Blog M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.news_blogs_section_m3"
                                                :sync="true"
                                                :labels="true"
                                                @change=""
                                            />

                                        </div>
                                        <div class="col-md-4 form-group" >
                                            <label >Section(Article Section M3)?</label>
                                            <toggle-button
                                                style="margin-bottom: 0rem;"
                                                v-model="settings.article_section_m3"
                                                :sync="true"
                                                @change=""
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
                home_nav_header:false,
                about_nav_header:false,
                product_nav_header:false,
                news_nav_header:false,
                contact_nav_header:false,
                dealer_locator_nav_header:false,
                store_nav_header:false,
                support_nav_header:false,
                login_nav_header:false,
                banner_slider_section:false,
                icon_section:false,
                product_section:false,
                logo_description_section:false,
                fullwidth_image_section1:false,
                logo_icon_and_description_with_boxes_section:false,
                title_description_with_accordian_section:false,
                fullwidth_video_section:false,
                fullwidth_image_section2:false,
                news_blogs_section:false,
                fullwidth_image_section3:false,
                slider_section_m2:false,
                section2_m2:false,
                product_section_m2:false,
                fullwidth_video_section_m2:false,
                section5_m2:false,
                section6_m2:false,
                accordian_section_m2:false,
                fullwidth_image_section1_m2:false,
                fullwidth_image_section2_m2:false,
                fullwidth_image_section3_m2:false,
                news_blogs_section_m2:false,
                article_section_m2:false,

                slider_section_m3:false,
                section2_m3:false,
                product_section_m3:false,
                bg_description_m3:false,
                slider2_m3:false,
                product_description_m3:false,
                fullwidth_video_section_m3:false,
                accordian_section_m3:false,
                fullwidth_image_section1_m3:false,
                fullwidth_image_section2_m3:false,
                fullwidth_image_section3_m3:false,
                section9_m3:false,
                news_blogs_section_m3:false,
                article_section_m3:false,
            },
            isLoading: false,
            fullPage: false,
            loader: "spinner",
            is_edit: 0,
            brand:brand
        }
    },
    methods: {
        saveSettingsForm:function () {


                this.isLoading = true;

                  var post_url = `/admin/mybrand/settings/${this.brand.id}`;

                axios.post(post_url, this.settings,
                ).then(response => {
                    this.isLoading = false;
                    if (response.data.status == 'OK') {
                        this.$toast.success(response.data.message, {'duration': 5000});

                    }
                    if (response.data.status == 'ERROR') {

                    }
                }).catch(error => {
                    console.log(JSON.stringify(error));
                    this.$toast.error(JSON.stringify(error), {'duration': 5000});

                });
            },
    },
    mounted: function() {
        if(this.brand.brand_settings != null && this.brand.brand_settings != '' ){
            console.log(this.brand.brand_settings,'zee');
            this.settings = this.brand.brand_settings;
        }


    }

}
</script>

<style scoped>
.field-errors {
    color: #dd0000;
}
</style>
