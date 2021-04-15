<template>
    
    <main class="container">
        {{holidays}}
    </main>

</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            holidays: []
        }
    },

    methods: {
        getHolidays(country = 'sk') {
            axios.get('http://localhost/webtech/zadanie6/api/holidays/' + country)
                .then(res => {
                    console.log(res)
                    this.holidays = res.data;
                })
        }
    },

    created() {
        this.getHolidays();
    }

}

</script>