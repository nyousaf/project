<template>
  <div class="add-listing-block">
    <div class="alert alert-success z-depth-1" :class="{ active : success }" v-if="success == true" role="alert">
        Listing has been saved successfully
    </div>
    <form id="add-listing-form" action="add_listing" v-on:submit.prevent="add_listing()" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <div class="add-listing-sidebar">
            <div class="form-group">
              <div class="form-group">
                <label>Select Category <span>*</span></label>
                <div class="form-group">
                  <v-select v-model="listing.category_id" label="name" :options="categories"></v-select>  
                  <span class="help-block danger hasError" v-if="errors.category_id != null">
                    <div class="danger">{{ errors.category_id[0] }}</div>
                  </span>
                </div>
              </div> 
              <div class="form-group">  
                <label>Select Country <span>*</span></label>
                <v-select v-model="listing.listing_country_id" label="name" :options="countries" id="country"></v-select>
                <span class="help-block danger hasError" v-if="errors.listing_country_id != null">
                  <div class="danger">{{ errors.listing_country_id[0] }}</div>
                </span>
              </div>  
              <div class="form-group">  
                <label>Select State <span>*</span></label>
                <v-select v-model="listing.listing_state_id" label="name" :options="states" id="state"></v-select>
                <span class="help-block danger hasError" v-if="errors.listing_state_id != null">
                  <div class="danger">{{ errors.listing_state_id[0] }}</div>
                </span>
              </div>   
              <div class="form-group">  
                <label>Select City <span>*</span></label>
                <v-select v-model="listing.listing_city_id" label="name" :options="cities" id="city"></v-select>
                <span class="help-block danger hasError" v-if="errors.listing_city_id != null">
                  <div class="danger">{{ errors.listing_city_id[0] }}</div>
                </span>
                </select>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="new-add-listing">
            <div class="form-group">
              <div class="add-listing-form-2">
                <div class="form-group">
                  <label>Title <span>*</span></label>
                  <input type="text" id="title" v-model="listing.title" class="form-control"/>
                  <span class="help-block danger hasError" v-if="errors.title != null">
                    <div class="danger">{{ errors.title[0] }}</div>
                  </span>
                  <span class="help-block danger hasError" v-if="errors.slug != null">
                    <div class="danger">Title has been taken already for slug</div>
                  </span>
                </div>
                <div class="form-group">
                  <label>description<span>*</span></label>
                  <textarea id="description" v-model="listing.description" class="form-control"></textarea>
                  <span class="help-block danger hasError" v-if="errors.description != null">
                    <div class="danger">{{ errors.description[0] }}</div>
                  </span>
                </div>
              </div>
              <div class="package-section">
                <h4 class="package-heading">Add New Package</h4> 
                <div class="package-block">
                  <div v-for="(package, index) in packages">
                    <div v-if="index != 0" class="add-new-package">
                      <h4 class="package-heading">Add New</h4>
                      <a href="#" @click.prevent="add_package()" class="btn btn-pink block-add-btn rt-50">+</a>
                      <a href="#" @click.prevent="remove_package(index)" class="btn btn-danger block-add-btn">-</a>
                    </div>
                    <div class="form-group">                       
                      <div class="row">
                        <div class="col-md-6"> 
                          <label>Package Name <span>*</span></label>  
                          <input type="text" id="pkg-name" v-model="package.name" class="form-control"/>       
                          <span class="help-block danger hasError" v-if="errors.name != null">
                            <div class="danger">Package {{ errors.name[0] }}</div>
                          </span>
                        </div>
                         <div class="col-md-6"> 
                          <label>Package Price <span>*</span></label>   
                          <input type="text" id="pkg-price" v-model="package.price" class="form-control"/>
                          <span class="help-block danger hasError" v-if="errors.price != null">
                            <div class="danger">Package {{ errors.price[0] }}</div>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group"> 
                      <label>Package Detail <span>*</span></label>   
                      <textarea id="pkg-dtl" v-model="package.description" class="form-control"></textarea>
                    </div> 
                  </div>  
                  <a href="#" @click.prevent="add_package()" class="btn btn-pink block-add-btn">+</a>
                </div>
              </div>
              <div class="venue-location">
                <h4 class="venue-location-heading">Venue Location</h4>
                <div class="form-group">
                  <div class="form-group">
                    <label for="google_address">Address<span>*</span></label>
                    <gmap-autocomplete class="form-control" v-model="listing.address" @place_changed="updatePlace"></gmap-autocomplete>
                    <span class="help-block danger hasError" v-if="errors.address != null">
                      <div class="danger">{{ errors.address[0] }}</div>
                    </span>
                  </div>
                  <div class="add-listing-map">                        
                    <gmap-map
                      :center="mapCenter"
                      :zoom="11"
                      :draggable="true"
                      style="width: 100%; height: 280px"
                    >
                      <gmap-marker
                        :key="index"
                        v-for="(m, index) in markers"
                        :position="m.position"
                        @position_changed="updateChild(m, 'position', $event)"
                        :clickable="true"
                        :draggable="true"
                        :icon="{url: 'images/icons/map-marker-1-1.png'}"
                        @click="mapCenter=m.position"
                      ></gmap-marker>
                    </gmap-map>              
                  </div>
                  <div class="google-map-location form-group">
                    <div class="row">
                      <div v-for="m in markers">
                        <div class="col-sm-6">
                          <label>Latitude (For google maps) <span>*</span></label>
                          <input type="text" v-model="m.position.lat" id="latitude" class="form-control"/>
                        </div>
                        <div class="col-sm-6">
                          <label >Longitude (For google maps) <span>*</span></label>
                          <input type="text" v-model="m.position.lng" id="longitude" class="form-control"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="add-listing-video">
                <div class="form-group">
                  <label>Video Url</label>
                  <input type="text" id="video-url" v-model="listing.video_url" class="form-control"/>
                </div>  
              </div>
              <div class="add-listing-gallery-block">
                <div class="add-listing-gallery">
                  <div class="row">             
                    <div v-for="(item, index) in gallery">
                      <div class="col-sm-4">
                        <div class="add-listing-image">
                          <img :src="item.image" class="img-responsive" alt="add-listing-img">
                          <a href="#" @click.prevent="remove_media(index)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          <a href="#" @click.prevent="add_feature(index)" class="star" :class="{ active : gallery[index].featured == 1 }"><i class="fa fa-star" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-btn-section">
                  <div class="upload-img-btn">
                    <div class="form-group input-file-block">
                      <input v-on:change="onFileChange" type="file" id="image" class="input-file">
                      <label for="image" class="js-labelFile btn btn-pink" data-toggle="tooltip" data-original-title="Profile Pic">
                        <span class="js-fileName" >Select Media</span>
                      </label>
                    </div>  
                    <span class="help-block danger hasError" v-if="errors.image != null">
                      <div class="danger">{{ errors.image}}</div>
                    </span>
                  </div>
                  <ul class="add-listing-note">
                    <li>* At least 1 image is required for a valid submission</li>
                    <li>** After upload image must click on any image to select features</li>
                  </ul>
                  <button type="submit" class="btn btn-pink btn-loading" :class="{ active: isActive }" @click="isActive = true">Save Listing</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>  
  </div>
</template>

<style scoped>
  .add-new-package {
    position: relative;
    margin-top: 25px;
  }
  .danger {
    color: #ef5350 !important;
  }
  .rt-50 {
    right: 50px !important;
  }
  .btn.btn-pink.btn-loading {
    position: relative !important;
    -webkit-transition: all 0.4s ease-in-out !important;
    transition: all 0.4s ease-in-out !important;
  }
  .btn.btn-pink.btn-loading:focus,
  .btn.btn-pink.btn-loading:active {
    outline: none;
  }
  .btn.btn-pink.btn-loading::before {
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: 10px;
    content: '';
    height: 8px;
    width: 8px;
    background: white;
    border-radius: 100%;
    -webkit-transition: all 0.4s linear;
    transition: all 0.4s linear;
    -webkit-animation: test 2s infinite;
            animation: test 2s infinite;
    opacity: 0; 
    box-shadow: 3px 3px 10px rgba(0,0,0,0.4), -3px -3px 10px rgba(0,0,0,0.4);
  }
  .btn.btn-pink.btn-loading:hover::before {
    top: 39%;
  }
  .btn.btn-pink.btn-loading.active {
    color: transparent;
    background-color: #392D48;
  }
  .btn.btn-pink.btn-loading.active::before {
    opacity: 1;
  }
  @-webkit-keyframes test {
    0% {
      left: 30%;
    }
    50% {
      left: 90%;
    }
    100% {
      left: 30%;
    }
  }
  @keyframes test {
    0% {
      left: 30%;
    }
    50% {
      left: 90%;
    }
    100% {
      left: 30%;
    }
  }

</style>

<script>
  export default {

    data () {
      return {

        active: false,

        isActive: false,

        success: false,

        markers: [{
          position: {lat: 10, lng: 10}
        }],

        mapCenter: {
          lat: 10,
          lng: 10
        },

        listing: {

            title: '',
            description: '',
            category_id: null,
            listing_country_id: null,
            listing_state_id: null,
            listing_city_id: null,
            video_url: '',
            address: ''

        },

        errors: {
          title: null,
          slug: null,
          category_id: null,
          description: null,
          listing_country_id: null,
          listing_state_id: null,
          listing_city_id: null,
          address: null,
          image: null,
          name: null,
          price: null
        },

        categories: [],

        countries: [],

        states: [],

        cities: [],

        packages: [
            {
              name: '',
              price: '',
              description: ''
            }
        ],

        gallery: []

      }
    },

    created () {
      this.fetchCategories();
      this.fetchCountries();
      this.fetchStates();
      this.fetchCities();
    },

    methods: {

        onFileChange(e) {
            var _URL = window.URL || window.webkitURL;

            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
            return;

            var file = files[0];

            var img = new Image();
            var imgwidth = 0;
            var imgheight = 0;
            var maxwidth = 600;
            var maxheight = 600;
            img.src = _URL.createObjectURL(file);
            var valid = 0;

            img.onload = function() {
               imgwidth = this.width;
               imgheight = this.height;
             
              if(imgwidth == maxwidth && imgheight == maxheight){

                valid = 1;

              } else {

                alert(`Please add a ${maxwidth} X ${maxheight} media`);

              }
            }

            setTimeout(function(){
            if (valid == 1) {
              this.createImage(files[0]);
            }
            }.bind(this), 200);
            

        },

        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                this.image = e.target.result;
                vm.gallery.push({
                  image: e.target.result,
                  featured: 0
                });
            };
            reader.readAsDataURL(file);
        },

        add_feature(index) {
          this.gallery.filter(function (value, key) {
              value.featured = 0;
          });
          this.gallery[index].featured = 1;
          this.active = true;
        },

        updateChild(object, field, event) {
          if (field == 'position') {
            object.position = {
              lat: event.lat(),
              lng: event.lng(),
            };
          }
        },

        updatePlace(place) {
          this.listing.address = place.formatted_address;
          this.updateCenter(place.geometry.location);
        },

        updateCenter(location) {
          this.markers = [{
            position: {
              lat: location.lat(),
              lng: location.lng(),
            }
          }];
          this.mapCenter = {
            lat: location.lat(),
            lng: location.lng(),
          };
        }, 

        fetchCategories() {
          this.$http.get('categories').then(response => {
            this.categories = response.data.categories;
          }).catch((e) => {
            console.log(e)
          });
        },

        fetchCountries() {
          this.$http.get('countries').then(response => {
            this.countries = response.data.countries;
          }).catch((e) => {
            console.log(e)
          });
        },

        fetchStates() {
          this.$http.get('states').then(response => {
            this.states = response.data.states;
          }).catch((e) => {
            console.log(e)
          });
        },

        fetchCities() {
          this.$http.get('cities').then(response => {
            this.cities = response.data.cities;
          }).catch((e) => {
            console.log(e)
          });
        },

        add_package() {
          this.packages.push({
              name: '',
              price: '',
              description: ''
          });
        },

        remove_package(index) {
          Vue.delete(this.packages, index);
        },

        remove_media(index) {
          Vue.delete(this.gallery, index);
        },

        add_listing() {
          var result = {
            title: this.listing.title,
            slug: null,
            description: this.listing.description,
            category_id: this.listing.category_id,
            listing_country_id: this.listing.listing_country_id,
            listing_state_id: this.listing.listing_state_id,
            listing_city_id: this.listing.listing_city_id,
            address: this.listing.address,
            latitude: this.markers[0].position.lat,
            longitude: this.markers[0].position.lng,
            video_url: this.listing.video_url,
          }
          this.$http.post('add_listing', {listing: result, packages: this.packages, galleries: this.gallery}).then((response) => {
            console.log(response);
            if (response.status == 200 && response.data.error_image == null) {
              setTimeout(function(){
                this.isActive = false;
                this.success = false;
              }.bind(this), 2000);
              setTimeout(function(){
                this.success = false;
              }.bind(this), 5000);
              this.success = true;
              this.listing = {
                  title: '',
                  description: '',
                  category_id: null,
                  listing_country_id: null,
                  listing_state_id: null,
                  listing_city_id: null,
                  address: '',
                  video_url: ''
              };

              this.packages = [
                  {
                    name: '',
                    price: '',
                    description: ''
                  }
              ];

              this.mapCenter = {
                lat: 10,
                lng: 10
              };

              this.gallery = [];

              this.markers = [{
                position: {lat: 10, lng: 10}
              }];

              this.errors =  {
                title: null,
                slug: null,
                category_id: null,
                description: null,
                listing_country_id: null,
                listing_state_id: null,
                listing_city_id: null,
                address: null,
                image: null,
                name: null,
                price: null
              };
            }
            this.isActive = false;
            if (response.data.error_image != null) {
              this.errors.image = response.data.error_image;              
            }
            console.log(e);
          }).catch((e) => {
            this.isActive = false;
            this.errors = e.data.errors;
            console.log(e);
            console.log(e.data.errors);
          });
        }
    },

    mounted() {

      $('.input-file').each(function() {
        var $input = $(this),
            $label = $input.next('.btn'),
            labelVal = $label.html();
         $input.on('change', function(element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
         });
      });
    }

  }

</script>
