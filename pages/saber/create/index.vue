<script setup lang="ts">

    //meta title
    useHead({
        title: 'Create a Post - SantriKoding.com',
    });

    //init config
    const config = useRuntimeConfig();  

    //init router
    const router = useRouter();

    //define state
    const nama     = ref('');
    const kelas     = ref('');
    const no_hp   = ref('');
    const errors  : any  = ref({});

    //method "storePost"
    const storeSaber = async () => {
        
        //init formData
        let formData = new FormData();

        //assign state value to formData
        formData.append('nama', nama.value);
        formData.append('kelas', kelas.value);
        formData.append('no_hp', no_hp.value);

        //store data with API
        await $fetch(`${config.public.apiBase}/api/saber`, {

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
                        <form @submit.prevent="storeSaber()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Siswa</label>
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
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                            <NuxtLink to="/saber" class="btn btn-md btn-success rounded-sm shadow border-0">Back</NuxtLink>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>