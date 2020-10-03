<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Edit</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="UpdateData">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="text" v-model="post.title" name="title" class="form-control readonly col-md-6">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea v-model="post.content" name="content" class="form-control readonly">
                                </textarea>
                            </div>
                            <div v-if="success" class="form-group">
                                <div class="alert alert-success">
                                    {{ message }}
                                </div>
                            </div>
                            <div v-else class="form-group">
                                <div class="alert alert-danger">
                                    {{ message }}
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">UPDATE</button>
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
    data(){
        return {
            post: {},
            message: {},
            success: {}
        }
    },
    created(){
        let uri = `http://localhost:8000/api/posts/${this.$route.params.id}`
        this.axios.get(uri).then((response) => {
                this.post = response.data.post;
                this.message = response.data.message;
                this.success = response.data.success;
                console.log(post)
        }).catch(err => {
            // this.success = false
            // this.message = 'Post Not Found'
        });
    },
    methods: {
        UpdateData(){
            let id = this.post.id
            // console.log(this.post)
            let url = `http://localhost:8000/api/posts/${id}`
            this.axios.post(url, {
                data: this.post,
                _method: 'patch'
            }).then((response) => {
                this.$router.push({name: 'posts'});
            }).catch(error => {
                this.validation = error.response.data.data;
            });
        }
    }
}
</script>