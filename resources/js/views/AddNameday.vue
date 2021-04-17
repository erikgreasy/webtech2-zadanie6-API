<template>
    <main>
        <h1 class="display-4">Pridaj meniny</h1>
        <form @submit.prevent="addNameday">
            <div class="form-group">
                <label>Meno:</label>
                <input type="text" v-model="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Dátum:</label>
                <input type="date" v-model="date" class="form-control">
            </div>
            <button class="btn btn-info btn-block">Pidaj</button>
        </form>
    </main>
</template>

<script>

export default {
    data() {
        return {
            name: '',
            date: ''
        }
    },

    methods: {
        addNameday() {
            var date = (new Date( this.date ).getMonth() + 1).toString().padStart(2, '0') + (new Date( this.date ).getDate()).toString().padStart(2, '0')

            this.$http.post(this.$baseurl + '/api/namedays', {
                
                name: this.name,
                date: date,
            })
                .then(res => {
                    console.log(res)
                })
        }
    }
    
}
</script>