<template>
  <!-- Modal -->
  <div class="modal fade" id="modal-browse-alumni" tabindex="-1" role="dialog" aria-labelledby="ModalAccount"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-browse-alumni modal-lg" role="document">
      <div class="modal-content">
          <div class="before-menu">
              <button type="button" class="close close-modal-btn" data-dismiss="modal" aria-label="Close">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="far fa-times-circle fa-stack-1x"></i>
              </button>
          </div>
          <div class="modal-body p-0">
              <div class="container filter-search">
                  <h6>FILTER SEARCH</h6>
                  <div class="text-center">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                  <input type="text" class="form-control" v-model="name" placeholder="by name" />
                              </div>
                          </div>
                          <div class="row search-form">
                              <div class="col-7 col-sm-7 col-md-8 col-lg-8">
                                  <select class="form-control" v-model="study_selected">
                                      <option value="" disabled selected>by study program</option>
                                      <option v-for="study in studys" v-if="study.acad_prog_desc!=''" :value="study.acad_prog_desc">{{study.acad_prog_desc}}</option>
                                  </select>
                              </div>
                              <div class="col-5 col-sm-5 col-md-4 col-lg-4">
                                  <select class="form-control" v-model="batch_selected">
                                      <option value="" disabled selected>by year</option>
                                      <option v-for="batch in filteredBatch" :value="batch[0]">20{{ batch[0] }}</option>
                                  </select>
                              </div>
                          </div>
                          <input type="button" class="btn w-100 bg-pink mt-4 lg-btn" :value="btnsearch.text"
                            :disabled="sending" @click="searchStudent"/>
                      </div>
                  </div>
                  <div class="row short-profiles">
                      <div v-for="student in students" class="col-md-12 col-lg-6 sp-big-col">
                          <div class="short-profile rounded" @click="selectContact(student)">
                              <div class="row">
                                  <div class="col-2 col-sm-2 col-md-2 col-lg-2 sp-column">
                                      <div class="rounded-circle">
                                          <img v-if="student.photo==null" :src="main_url+'assets/img/default.png'" />
                                          <img v-if="student.photo" :src="main_url+'img/students/'+student.photo"/>
                                      </div>
                                  </div>
                                  <div class="col-10 col-sm-10 col-md-10 col-lg-10 text-left sp-column">
                                      <p class="modal-profile-name">{{ student.name }}</p>
                                      <p class="modal-profile-program">{{ student.acad_prog_desc+' 20'+pisahstr(student.admit_term) }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <a :href="main_url+'profile-browsed'"
                      class="btn w-100 bg-pink lg-btn">BROWSE
                      ALUMNI PROFILE</a>
              </div>
          </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    name: 'FindModal',
    props: {
        studys: Array,
        batchs: Array,
    },
    data(){
        return {
            name: null,
            study_selected: '',
            batch_selected: '',
            main_url: process.env.MIX_MAIN_URL,
            sending: false,
            students: Array,
            btnsearch: { 
                text: 'SEARCH ALUMNI'
            },
        }
    },
    methods: {
        searchStudent(e){
            e.preventDefault();
            if(this.name==null && this.study_selected=='' && this.batch_selected==''){
                alert('Please fill the option');
            // }else if(this.name==null){
            //     alert("Name can't be blank");
            }else{
                this.sending = true;
                this.btnsearch.text = 'Please Wait ...';
                
                axios.post('/students/search/', {
                    name: this.name,
                    study: this.study_selected,
                    batch: this.batch_selected
                })
                .then((response)=> {
                    this.students = response.data;
                    this.sending = false;
                    this.btnsearch.text = 'SEARCH ALUMNI';
                })
            }
        },
        selectContact(contact){
            this.selected = contact;

            this.$emit('selected', contact);
        },
        pisahstr(string) {
            string = string.toString().substr(1, 2);
            return string;
        }
    },
    computed: {
        filteredBatch() {
            var hash = Object.create(null);
            var result = [];
            this.batchs.forEach(function (item) {
                let text = item.admit_term;
                var key = text.toString().slice(1, 3);
                hash[key] = [];
                result.push(hash[key]);
                hash[key].push(key);
            });
            return _.sortBy(hash,[0]).reverse();
        },
    },
}
</script>