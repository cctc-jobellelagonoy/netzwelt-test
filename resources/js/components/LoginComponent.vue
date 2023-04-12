<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
    
                    <div class="card-body">
                        <form action="/account/login" method="post">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control" name="username" v-model="fields.username" required autocomplete="username" autofocus>
                                    <span v-if="errors && errors.username" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.username[0] }}</strong>
                                    </span>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="fields.password" required>
                                    <span v-if="errors && errors.password" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </template>
    
<script>
    export default {
      data() {
        return {
          fields: {},
          errors: {},
          csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
      },
      methods: {
    
      },
    }
</script>
    