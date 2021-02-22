<template>
    <div class="row">
        <div class="col-md-3">
            <ContactsList :contacts="contacts" @selected="startWith"/>
            <button type="button" class="btn link-browse-alumni md-btn w-100" @click="showModal">FIND
                ALUMNI</button>
        </div>
        <div class="col-md-9">
            <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" @newAttach="saveNewMessage"/>
        </div>
        <FindModal ref="modal" :studys="this.c_study" :batchs="this.c_batch" :issending="sending"
            @selected="startWithNew"/>
   </div>
</template>

<script>
import Conversation from './Conversation';
import ContactsList from './ContactsList';
import FindModal from './FindModal';

export default {
    props: {
        user: {
            type: Object,
            required:true
        },
        c_study: Array,
        c_batch: Array,
        nim: Array
    },
    data() {
        return {
            selectedContact: null,
            messages: [],
            contacts: [],
            sending: true
        }
    },
    mounted() {
        Echo.private('messages.'+this.user.id)
            .listen('NewMessage', (e)=>{
                // console.log(e.message);
                this.handleMessage(e.message);
            })

        axios.get('/contacts')
            .then((response)=>{
                // console.log(response.data);
                this.contacts = response.data;
                if(this.nim!=''){
                    this.startFromParam(this.nim[0]);
                }
            });
    },
    methods:{
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },
        closeModal() {
            let element = this.$refs.modal.$el
            $(element).modal('hide')
        },
        startFromParam(students){
            axios.get('/conversation/'+students.id)
                .then((response)=> {
                    this.messages = response.data;
                    this.selectedContact = students;
                })
                    
                const item = this.contacts.find(el => el.id == students.id);
                if(item==null){
                    console.log('null kan');
                    this.contacts.push(students);
                }
        },
        startWithNew(students){
            // this.updateUnreadCount(this.contact, true);

            axios.get('/conversation/'+students.id)
                .then((response)=> {
                    this.messages = response.data;
                    this.selectedContact = students;
                    
                    const item = this.contacts.find(el => el.id == students.id);
                    if(item==null){
                        this.contacts.push(students);
                    }
                    this.closeModal();
                })
        },
        startWith(contact){
            this.updateUnreadCount(contact, true);

            axios.get('/conversation/'+contact.id)
                .then((response)=> {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
        },
        saveNewMessage(text){
            this.messages.push(text);
        },
        handleMessage(message){
            if(this.selectedContact && message.from == this.selectedContact.id){
                this.saveNewMessage(message);
                // console.log(message);

                axios.post('/conversation/read', {
                    id: message.id
                })
                .then((response)=>{
                })
                return;
            }

            this.updateUnreadCount(message.from_contact, false);
        },
        updateUnreadCount(contact, reset) {
            this.contacts = this.contacts.map((single) => {
                if (single.id !== contact.id) {
                    return single;
                }

                if (reset)
                    single.unread = 0;
                else
                    single.unread += 1;

                // console.log(single.unread);
                return single;
            })
        }
    },
    components: {
        Conversation, ContactsList, FindModal
    },
}
</script>
<style>
/* @import '/assets/css/custom.css'; */

/* <script src="{{ asset('assets/js/custom/effect-fade.js') }}"></script> */

/* width */
::-webkit-scrollbar {
    width: 3px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #e25677; 
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #b30000; 
}
</style>   