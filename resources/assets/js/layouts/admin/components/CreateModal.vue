<template lang="html">
    <div class="create-modal column y-center">
        <form class="column" @click.stop>
            <h1 v-text="edit_project ? 'Edit Project' : 'Create Project'"></h1>
            <input type="text" v-model="title" placeholder="Title" required>
            <input type="text" v-model="link" placeholder="Preview Url" required>
            <textarea v-model="description" placeholder="Description" required></textarea>
            <ul class="tags row">
                <span v-if="!tags.length">No Tags Added</span>
                <li v-for="tag in tags"
                    @click="removeTag(tag)">{{ tag }}
                    <i class="fa fa-times-circle"></i>
                </li>
            </ul>
            <input class="add-tag"
                   type="text"
                   placeholder="Tag Name"
                   v-model="tag"
                   @keydown.13.prevent="addTag">
            <div class="image-previews row">
                <span v-if="!image_previews.length">No Images Added</span>
                <img v-for="(image, i) in image_previews"
                     :src="image[1]"
                     :class="{main: image[0] == 'main'}"
                     @click="removeImage(i)">
            </div>
            <label for="main-image-submit">Main Image:</label>
            <input id="main-image-submit"
                   type="file"
                   @change="addImage('main', $event)"
                   :disabled="has_main_image">
            <label for="image-submit">Add Another Image:</label>
            <input id="image-submit"
                   type="file"
                   @change="addImage('sub', $event)">
            <button class="submit-btn"
                    type="submit"
                    @click.prevent="addProject"
                    v-text="edit_project ? 'Update' : 'Save'">Save</button>
        </form>
    </div>
</template>

<script type="text/babel">
	export default {
		props: ['edit_project', 'edit_key'],
		data() {
			return {
				title: '',
				link: '',
				description: '',
				tag: '',
				tags: [],
				images: [],
				has_main_image: false,
				image_previews: []
			}
		},
		methods: {
			addTag() {
				if ( this.tag ) this.tags.push(this.tag)
				this.tag = ''
			},

			removeTag(tag) {
				_.map(this.tags, (val, i) => {
					if ( val == tag ) this.tags.splice(i, 1)
				})
			},

			removeImage(index) {
				if ( this.image_previews[index][0] == 'main' )
					this.has_main_image = false

				this.image_previews.splice(index, 1)
				this.images.splice(index, 1)
			},

			addImage(type, e) {
				let reader = new FileReader(),
						format = e.target.files[0].name
							.slice(e.target.files[0].name.indexOf('.')),
						name = type == 'main' ? `main${format}` :
							`${this.images.length + format}`

				if ( type == 'main' ) this.has_main_image = true

				reader.onload = e => {
					this.image_previews.push([type, e.target.result])
				}

				reader.readAsDataURL(e.target.files[0])
				this.images
					.push([name, e.target.files[0]])

				e.target.value = ''
			},

			addProject() {
				if ( !this.title ||
				 !this.description ||
				 !this.tags.length ||
				 !this.has_main_image ) return

				this.$emit('close_modal', false)

				const db = firebase.database(),
							projects = db.ref('projects/')

				let key

				if ( this.edit_project )
					key = this.edit_key
				else key = projects.push().key

				let project = {
					title: this.title,
					link: this.link,
					description: this.description,
					tags: this.tags,
					images: []
				}

				if ( !this.edit_project ) {
					project.date_added = new Date().getTime()
					project.last_updated = project.date_added
				} else {
					project.date_added = this.edit_project.date_added
					project.last_updated = new Date().getTime()
				}

				_.map(this.images, (image, i) => {
					if ( typeof image[1] == 'object' ) {
						let image_ref = firebase.storage().ref()
							.child(`images/${key}/${image[0]}`)

						image_ref.put(image[1]).then(snapshot => {
							project.images.push(image_ref.fullPath)

							if ( i === this.images.length - 1 ) {
								projects.child(key).set(project)
								this.$emit('project_edited', [this.edit_key, project])

								this.$swal("Success!", "The project has been saved.", "success")
								this.resetData()
							}
						})
					} else {
						project.images.push(image[1])
						if ( i === this.images.length - 1 ) {
							projects.child(key).set(project)
							this.$emit('project_edited', [this.edit_key, project])

							this.$swal("Success!", "The project has been edited.", "success")
							this.resetData()
						}
					}
				})
			},

			resetData() {
				this.title = ''
				this.description = ''
				this.tags = []
				this.images = []
				this.image_previews = []
			}
		},

		created() {
			// get image urls and add them to previews -> array with first val
			// set to type of the image(main/sub) and second val the url
			if ( this.edit_project ) {
				this.title = this.edit_project.title
				this.link = this.edit_project.link
				this.description = this.edit_project.description
				this.tags = this.edit_project.tags
				_.map(this.edit_project.image_previews, image => {
					if ( image[0] == 'main' )
						this.has_main_image = true

					this.images.push(image)
					this.image_previews.push(image)
				})
			}
		}
	}
</script>