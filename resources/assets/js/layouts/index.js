const files = require.context('.', true, /\.js$/)
const routes = []

files.keys().forEach((file) => {
    if (file === './index.js') return
    routes.push(files(file).default)
})

export default routes

