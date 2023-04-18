<script setup lang="ts">

    //meta title
    useHead({
        title: 'Edit a Post - SantriKoding.com',
    });

    //init config
    const config = useRuntimeConfig();  

    //init router
    const router = useRouter();

    //init route
    const route = useRoute();

    //fetch daa for get detail data post
    const { data: saber } : any = await useFetch(`${config.public.apiBase}/api/saber/${route.params.id}`);
    

    //define state
    const nama     = ref(saber.value.data.nama);
    const kelas     = ref(saber.value.data.kelas);
    const no_hp   = ref(saber.value.data.no_hp);
    const errors  : any  = ref({});

    //method "updatePost"
    const updatePost = async () => {
        
        //init formData
        let formData = new FormData();

        //assign state value to formData
        formData.append('nama', nama.value);
        formData.append('kelas', kelas.value);
        formData.append('no_hp', no_hp.value);
        formData.append('_method', 'PATCH');

        //store data with API
        await $fetch(`${config.public.apiBase}/api/saber/${route.params.id}`, {

            //method
            method: 'POST',

            //data
            body: formData
        })
        .then(() => {
            //redirect
            router.push({ path: "/saber" });
        })
        .catch((error) => {

            //assign response error data to state "errors"
            errors.value = error.data
        });
    }

</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="updatePost()">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nams Siswa</label>
                                <input type="text" class="form-control" v-model="nama" placeholder="Nama Siswa">
                                <div v-if="errors.nama" class="alert alert-danger mt-2">
                                    <span>{{ errors.nama[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kelas</label>
                                <input type="text" class="form-control" v-model="kelas" placeholder="Kelas Siswa">
                                <div v-if="errors.kelas" class="alert alert-danger mt-2">
                                    <span>{{ errors.kelas[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">No Telepon</label>
                                <input type="text" class="form-control" v-model="no_hp" placeholder="Nomor Telepon">
                                <div v-if="errors.no_hp" class="alert alert-danger mt-2">
                                    <span>{{ errors.no_hp[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>