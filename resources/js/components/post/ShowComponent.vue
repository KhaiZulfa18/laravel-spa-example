<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Show</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="UpdateData"> 
                            <div class="form-group">
                                <label for="">Title</label>
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
                            
                        </form>
                    </div>
                    <div class="card-footer">
                        <div v-if="success">
                            <router-link :to="{name: 'post.edit', params: { id: post.id }}" class="btn btn-sm btn-info">Edit</router-link>
                        </div>
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
    }
}
</script>