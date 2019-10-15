<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="post in posts" :key="post.id">
                    <div class="card-header">{{post.header}}</div>
                    <div class="card-body">
                        {{post.description}}
                    </div>
                    <h2> Comments </h2>
                    <CommentComponent v-for="(comment,id) in post.comments" :key="id" :userName="comment.author.name" :text="comment.text">
                    </CommentComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CommentComponent from './CommentComponent';

    export default {
        name: "PostComment",
        components: {
            CommentComponent,
        },
        props: {
          header: String,
          description: String,
        },

        data() {
            return {
                posts: {}
            };
        },

        methods: {
            init() {
                try {
                    fetch('http://localhost:8000/api/getAllPosts').then(ans => {
                        ans.json().then(posts => {
                            this.posts = posts;
                        })
                    })
                } catch(e) {
                    console.warn(e)
                }
            },
        },

        created: function() {
            console.log('pishov nahui')
            this.init();
        },
    }
</script>

<style scoped>

</style>