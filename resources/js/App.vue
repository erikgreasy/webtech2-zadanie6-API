<template>
    
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link :to="{name: 'Home'}" class="navbar-brand">Meniny a sviatky</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link :to="{name: 'Home'}" class="nav-link">
                        Meniny
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'Holidays'}" class="nav-link">
                        Sviatky
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'AddNameday'}" class="nav-link">
                        Pridať meniny
                    </router-link>
                </li>
            </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>

</template>


<script>

export default {
    

}

</script>