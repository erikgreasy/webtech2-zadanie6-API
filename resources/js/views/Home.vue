<template>
    <main>
        <div>
            <h1 class="display-4">Vyhľadaj meniny</h1>
            <div class="row my-4">
                <div class="col-6">
                    <a @click="showByDate" href="#" class="btn btn-primary btn-block">Podľa dátumu</a>
                </div>
                <div class="col-6">
                    <a @click="showByName" href="#" class="btn btn-danger btn-block">Podľa mena</a>
                </div>
            </div>
            
            <div class="datencountry search">
                <form @submit.prevent="getNamedays">
                    <div class="form-group">
                        <label>Dátum:</label>
                        <input type="date" v-model="fields.date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Krajina:</label>
                        <select v-model="fields.country" class="form-control">
                            <option v-for="el in countries" :key="el.id" v-bind:value="el.name">{{ el.name }}</option>
                        </select>
                    </div>
                    <button class="btn btn-info btn-block">Vyhľadať</button>
                </form>
                <ul>
                    <li v-for="name in namedays" :key="name.id">{{name.name}}</li>
                </ul>
            </div>

            <div class="name search">
                <form @submit.prevent="getDays">
                    <div class="form-group">
                        <label>Meno:</label>
                        <input type="text" v-model="fields.name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Krajina:</label>
                        <select v-model="fields.country" class="form-control">
                            <option v-for="el in countries" :key="el.id" v-bind:value="el.name">{{ el.name }}</option>
                        </select>
                    </div>
                    <button class="btn btn-info btn-block">Vyhľadať</button>
                </form>
                <h4 class="mt-3" v-if="date">{{ date }}</h4>
            </div>
            
        </div>
    </main>
</template>

<script>

export default {
    data() {
        return {
            fields: {
                date: null,
                country: 'sk',
                name: ''
            },
            countries: [],
            namedays: [],
            date: ''
        }
    },

    methods: {
        getCountries() {
            this.$http.get(this.$baseurl + '/api/countries')
                .then(res => {
                    this.countries = res.data
                })
        },
        getNamedays() {
            var date = (new Date( this.fields.date ).getMonth() + 1).toString().padStart(2, '0') + (new Date( this.fields.date ).getDate()).toString().padStart(2, '0')

            this.$http.get(this.$baseurl + '/api/namedays/'+ this.fields.country +'/' + date)
                .then(res => {
                    this.namedays = res.data
                })
        },
        getDays() {
            this.$http.get(this.$baseurl + '/api/days/'+ this.fields.country + '/' + this.fields.name)
                .then(res => {
                    if( res.data.date ) {
                        var date = res.data.date.substring(0, 2) + '.' + res.data.date.substring(2, 4) + '.'
                        this.date = date
                    } else {
                        this.date = 'Nenajdene'
                    }
                })
                .catch(err => {
                    console.log(err)
                })
        },
        showByDate() {
            document.querySelectorAll('.search').forEach(el => {
                el.style.display = 'none';
            })
            document.querySelector('.datencountry').style.display = 'block'
        },
        showByName() {
            document.querySelectorAll('.search').forEach(el => {
                el.style.display = 'none';
            })
            document.querySelector('.name').style.display = 'block'
        }
    },

    created() {
        this.getCountries()
    }
    
}
</script>