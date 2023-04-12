<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home
                        <div style="float:right"><a href="/account/logout">Logout</a></div>
                    </div>

                    <div class="card-body">
                        <territories-component></territories-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
