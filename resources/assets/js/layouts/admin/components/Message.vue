<template lang="html">
    <tr :data-message="message.key">
        <td>{{ date }}</td>
        <td>{{ message.name }}</td>
        <td>{{ message.email }}</td>
        <td>
            <button class="view-message"
                    @click="showMessage(message)">View</button>
        </td>
    </tr>
</template>

<script type="text/babel">
	export default {
		props: ['message'],
		computed: {
			date() {
				const time = new Date(this.message.received)

				return `${time.getMonth() + 1}/${time.getDate()}/${time.getFullYear()}`
			}
		},

		methods: {
			showMessage(message) {
				this.$emit('show_message', message)
			}
		}
	}
</script>