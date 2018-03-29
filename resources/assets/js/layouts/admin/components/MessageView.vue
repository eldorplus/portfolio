<template lang="html">
    <div class="message-view column y-center">
        <div class="message-view-content column">
            <div class="row x-center">
                <h1>Messenger</h1>
            </div>
            <div class="text-wrap column">
                <span>Name: {{ message.name }}</span>
                <span>Email: <a :href="email_link">{{ message.email }}</a></span>
                <span>Message: </span>
                <p>{{ message.message }}</p>
                <div class="row x-center">
                    <button class="close-message"
                            @click="closeMessage">Close</button>
                    <button class="delete-message"
                            @click="deleteMessage">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
	export default {
		props: ['message'],

		data() {
			return {
				email_link: `mailto:${this.message.email}`
			}
		},

		methods: {
			closeMessage() {
				this.$emit('closeMessage')
			},

			deleteMessage() {
				this.$emit('deleteMessage', this.message)
			}
		}
	}
</script>