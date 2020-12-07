<template>
    <div class="card" style="min-height: 50vh;">
        <div class="card-body">
            <ul class="list-unstyled" v-if="this.messages.length > 0">
              <li v-for="message in this.messages" class='media m-1'>
                <div :class="['media-body rounded p-2', getMessageColor(message)]" v-html="message['message']">
                </div>
              </li>
            </ul>
	    <div v-else>
            </div>
        </div>
        <div class="card-footer">
            <form @submit.prevent="sendMessage">
                <div class="form-group">
                    <label for="newMessage">Message: </label>
                    <textarea class="form-control" id="newMessage" rows="3"></textarea>
                </div>
                <button class="btn btn-primary">送出</button>
            </form>
        </div>
    </div>
</template>

<script>
module.exports = {
    data() {
        return {
            messages: [],
        }
    },
    mounted() {
        this.getAllMessages();
    },
    methods: {
        getAllMessages() {
            let that = this;
            axios.post('/api.php?method=recv').then(function(response) {
                const data = response['data'];
                if (data['status'] !== 0) {
                    that.messages = data['data'];
                } else {
                    console.log('Error: ' + data['msg']);
                }
            });
        },
        checkMessage(message) {
            return message !== null && message !== '';
        },
        sendMessage() {
	    let textarea = document.querySelector('textarea#newMessage');
	    const message = textarea.value;
            let that = this;
            if (this.checkMessage(message)) {
		const data = new URLSearchParams();
		data.append('message', message);
                axios({
		    url: '/api.php?method=send',
		    method: 'POST',
		    data: data
                }).then(function(response) {
                    const data = response['data'];
                    if (data['status'] !== 0) {
                        that.messages.push(data['data'][0]);
			textarea.value = '';
                    } else {
                        console.log('Error: ' + data['msg']);
                    }
                });
		return true;
            } 
	    return false;
        },
        getMessageColor(message) {
            if (parseInt(message['is_read']) === 1) {
                return 'read';
            } else {
                return 'unread';
            }
        },
    },
}
</script>

<style>
    .media-body.unread {
        background-color:#99ff99;
    }
    .media-body.read {
        background-color:#d9d9d9;
    }
</style>
