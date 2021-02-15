<template>
    <div class="messages" ref="feed">
        <div v-if="contact" v-for="message in messages" :key="message.id" class="row message-row mb-1">
            
            <div class="col">
                <div v-html="cekTgl(message.created_at)"></div>
                <!-- <div class="row message-row mb-1">
                    <div class="col text-center current-date">{{ tanggal(message.created_at) }}</div>
                </div> -->
                <div :class="`${message.to == contact.id ? 'my' : ' friend'}-message`">
                    <p class="mb-2" v-if="message.type == 0">{{ message.text }}</p>
                    <p class="mb-2 message-img" v-if="message.type == 1"><img :src="'/uploads/chat/'+message.text"></p>
                    <p class="text-right current-time">{{ waktu(message.created_at) }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
export default {
    props:{
        contact:{
            type: Object
        },
        messages:{
            type:Array,
            required: true
        }
    },
    methods: {
        cekTgl(date){
            let result = '';
            if(this.old_date != this.tanggal(date)){
                result += `<div class="row message-row mb-1">`;
                result += `   <div class="col text-center current-date">`;
                result += this.old_date = this.tanggal(date);
                result += `   </div>`;
                result += `</div>`;
            }
            return result;
        },
        scrollToBottom(){
            setTimeout(()=> {
                $('.message-box').animate({ scrollTop: $('.messages').height() }, 1);
            }, 50);
        },
        waktu(date) {
            return moment(date).format(' h:mm A') 
        },
        tanggal(date) {
            return moment(date).format('YYYY-MM-DD') 
        }
    },
    // computed: {
    //     filteredArray() {
    //         return this.messages.filter(item => {
    //             // Many more calculations
    //             if (item.id !== 0) {
    //                 return true
    //             } else {
    //                 return false
    //             }
    //         })
    //     },
    // },
    watch: {
        contact(contact){
            this.scrollToBottom();
        },
        messages(messages){
            this.scrollToBottom();
        }
    }
}
</script>
<style scoped>
.message-img img{
    max-width: 400px; 
    width: 100%;
}
</style>