<template lang="html">
    <div id="contact">
        <div class="overlay"></div>
        <div class="landing contact column y-center">
            <div class="landing-text">
                <form class="contact-form column">
                    <h1 class="landing__header">Contact Me</h1>
                    <h3>I'm looking forward to working with you!</h3>
                    <ul class="errors">
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                    <input type="text"
                           v-model="message.name"
                           placeholder="Your Name" required>
                    <input type="text" v-model="message.email"
                           placeholder="Email"
                           required>
                    <textarea v-model="message.message"
                              placeholder="Send me a Message"
                              required></textarea>
                    <button class="submit-btn" type="submit"
                            @click.prevent="sendMessage">Send</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
	export default {
		data() {
			return {
				message: {
					name: '',
					email: '',
					message: '',
					received: '',
					is_read: false,
					key: ''
				},
				errors: []
			}
		},
		methods: {
			sendMessage() {
				this.errors = []

				// Validate fields for string length
				if ( (this.message.name || this.message.email || this.message.message).length > 1000 ) {
					this.errors.push('Please shorten the length of your message.')
					return
				}

				// Validate Email
				const email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

				if ( !email_regex.test(this.message.email) ) {
					this.errors.push('Please enter a valid email address.')
					return
				}

				// Try to save message
                /**
				const db = firebase.database(),
							messages = db.ref('/messages'),
							key = messages.push().key,
							time = new Date().getTime()

				this.message.received = time
				this.message.key = key
				messages.child(key).set(this.message)
				// Save succeeded
				.then(() => {
					this.message.name = ''
					this.message.email = ''
					this.message.message = ''
					this.message.date = ''

					//this.$swal("Awesome!", "I'll get back with you soon!", "success")
				})
				// Save failed
				.catch(err => {
					//this.$swal("Oops!", "Something went wrong. Please try again. You can contact me directly at jd.tadlock@yahoo.com", "error")
				})
                **/
			}
		},

		created() {
			window.scroll(0, 0)
			//document.title = 'JD Tadlock | Contact'
		}
	}
</script>