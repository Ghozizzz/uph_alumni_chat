<template>
    <div>
        <div class="w-100 message-header">
            <h1>{{ contact ? contact.name : 'Select a Contact' }}</h1>
        </div>
        <div class="message-box">
        <MessagesFeed :contact="contact"  :messages="messages"/>
        </div>
        <MessagesComposer @send="sendMessage" @sendAttach="sendAttachment"/>
    </div>
</template>
<script>
import MessagesFeed from './MessagesFeed';
import MessagesComposer from './MessagesComposer';

export default {
    props: {
        contact: {
            type:Object,
            default:null
        },
        messages: {
            type:Array,
            default:[]
        }
    },
    methods: {
        sendMessage(text) {
            if(!this.contact){
                return;
            }
            axios.post('/conversation/send', {
                contact_id: this.contact.id,
                text: text    
            })
            .then((response)=>{
                this.$emit('new', response.data);
            })
        },
        sendAttachment(file){
            if(!this.contact){
                return;
            }
            const fd = new FormData();
            fd.append('image', file, file.name);
            fd.append('contact_id', this.contact.id);
            axios.post('/conversation/sendAttachment', fd)
            .then((response)=>{
                this.$emit('new', response.data);
                // console.log(response)
            })
        }
    },
    components: {
        MessagesFeed, MessagesComposer
    }
}
</script>
<style lang="scss" scoped>
.message-header {
    background-color: #e1f4fd;
}
.message-box {
    overflow-y: scroll !important;
}
.messages {
    position: inherit !important;
}
h1 {
    font-size: 20px;
    padding: 10px;
    margin: 0;
    border-bottom: 1px dashed lightgray;
}
</style>