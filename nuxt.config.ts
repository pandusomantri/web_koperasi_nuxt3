
// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    runtimeConfig: {
        public: {
          apiBase: 'http://localhost:8000'
        }
    },
    app: {
        head: {
            meta: [
                { 
                    name: 'viewport', content: 'width=device-width, initial-scale=1'                
                },
                {
                    name:"description", content:"Koperasi Pegawai Salman Al Farisi ."
                }
            ],
            link: [
                {
                    rel: 'stylesheet',
                    href: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
                    integrity: 'sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD',
                    crossorigin: 'anonymous'
                },
                {
                    rel: 'preconnect',
                    href: 'https://fonts.googleapis.com'
                },
                {
                    rel: 'stylesheet',
                    href: 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap'
                },
                {
                    rel: 'stylesheet',
                    href:'assets/plugins/global/plugins.bundle.css'
                },
                {
                    rel: 'stylesheet',
                    href:'assets/css/style.bundle.css'
                }
            ],
            script: [
                {
                    src: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js',
                    integrity: 'sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN',
                    crossorigin: 'anonymous'
                },
                {
                    src: 'assets/plugins/global/plugins.bundle.js'
                },
                {
                    src: 'assets/js/scripts.bundle.js'
                },
                {
                    src: 'assets/js/custom/utilities/modals/create-account.js'
                }
            ],
        }
    }
})