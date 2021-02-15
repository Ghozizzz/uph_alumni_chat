<template>
    <div class="row my-auto">
        <!-- <div class="col-md-10">
            <div class="form-group">
                <input type="text" class="form-control w-100 message-input" placeholder="Message..." v-model="message" @keydown.enter="send"/>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button class="sm-btn w-50" @click="send"><i class="fas fa-paperclip"></i></button>
                <button class="btn sm-btn w-50 send-message" @click="send">SEND</button>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text attach_btn" @click="$refs.file.click()"><i class="fas fa-paperclip"></i></span>
                    <input type="file" ref="file" style="display: none" @change="sendAttach" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                </div>
                <textarea v-model="message" @keydown.enter="send" class="form-control type_msg" placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                    <span class="input-group-text send_btn sm-btn" @click="send"><i class="fas fa-location-arrow"></i>SEND</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            message: '',
            selectedFile: null,
        };
    },
    methods: {
        send(e){
            e.preventDefault();
            if(this.message==''){
                return;
            }
            this.$emit('send', this.message);
            this.message = '';
        },
        sendAttach(e){
            this.selectedFile = e.target.files[0];
            if(this.selectedFile.size > 5000000){
                alert("File size can't more than 5mb");
                return;
            }
            this.$emit('sendAttach', this.selectedFile);
            this.selectedFile = null;
        }
    }
}
</script>
<style lang="scss" scoped>
.type_msg{
    background-color: #f3f4f5;
    border: none;
    height: 60px !important;
    overflow-y: auto;
}
.type_msg:focus{
    background-color: #e5ecf3;
    box-shadow:none !important;
    outline:0px !important;
}
.attach_btn{
    border:0 !important;
    border-radius: 5px !important;
    color: white;
    background-color: #e25677;
    cursor: pointer;
}
.send_btn{
    color: white;
    background-color: #e25677;
    cursor: pointer;
}
</style>