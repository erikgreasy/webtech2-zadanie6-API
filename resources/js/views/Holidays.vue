<template>
    <main>
        <h1 class="display-4">
            Vyhľadaj sviatky
        </h1>
        <form @submit.prevent="getHolidays">
            <div class="form-group">
                <label>Krajina:</label>
                <select v-model="fields.country" class="form-control">
                    <option v-for="el in countries" :key="el.id" v-bind:value="el.name">{{ el.name }}</option>
                </select>
            </div>
            <button class="btn btn-info btn-block">Vyhľadaj</button>
        </form>
        <ul class="my-4">
            <li v-for="holiday in holidays" :key="holiday.id">{{ holiday.day.date.substring(2,4) + '.' + holiday.day.date.substring(0,2) + ' ' + holiday.name + '.' }}</li>
        </ul>
        <h4 class="my-4">{{ message }}</h4>
    </main>  
</template>

<script>

export default {
    data() {
        return {
            fields: {
                date: null,
                country: 'sk',
            },
            countries: [],
            holidays: [],
            message: ''
        }
    },

    methods: {
        getCountries() {
            this.$http.get(this.$baseurl + '/api/countries')
                .then(res => {
                        console.log(res)
                        this.countries = res.data
                        
                })
        },
        getHolidays() {
            this.$http.get(this.$baseurl + '/api/holidays/' + this.fields.country)
                .then(res => {
                    if(res.data.length) {
                        console.log(res)
                        this.holidays = res.data;
                    } else {
                        this.holidays = [];

                        this.message = 'nenajdene'
                    }


                })
        }
    },

    created() {
        this.getCountries()
    }
}
</script>