<template>
    <div class="form-group contact-list">
        <ul class="pl-0">
            <li v-for="contact in sortedContacts" :key="contact.id"
                @click="selectContact(contact)" 
                :class="{ 'profile-selected': contact == selected }">
                {{ contact.name }}
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    props: {
        contacts: {
            type: Array,
            default:[]
        }
    },
    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null
        }
    },
    methods: {
        selectContact(contact){
            this.selected = contact;

            this.$emit('selected', contact);
        }
    },
    computed: {
        sortedContacts() {
            return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }

                return contact.unread;
            }]).reverse();
        }
    }
}
</script>
<style lang="scss" scoped>
.contact-list {
    max-height: 100%;
    height: 400px;
    overflow-y: scroll;
}

span.unread {
    background: #82e0a8;
    color: #fff;
    right: 11px;
    top: 20px;
    font-weight: 700;
    min-width: 20px;
    font-size: 12px;
    padding: 0 4px;
    border-radius: 3px;
}
.profile-selected {
    background-color: #1C50A3;
    color: white;
}
</style>