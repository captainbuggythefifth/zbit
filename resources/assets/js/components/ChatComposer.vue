<template lang="html">
    <div class="chat-composer">
        <input class="form-control" type="text" placeholder="Start typing your message" v-model="messageText" v-on:keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">SEND</button>
    </div>
</template>

<script type="text/babel">
    export default{
        data() {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage() {
                this.messageText = '';
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: {
                        name: $('.navbar-right .dropdown-toggle').text()
                    }
                });
            }
        }
    }
</script>

<style lang="css">

</style>