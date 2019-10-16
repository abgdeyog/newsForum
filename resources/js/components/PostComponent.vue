<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="post in posts" :key="post.id">
                    <div class="card-header">
                        {{post.header}}
                        <br>
                        <div class="right">
                            {{post.author.name}}
                        </div>
                    </div>
                    <div class="card-body">
                        {{post.description}}
                    </div>

                    <div class="card">
                        <div class="card-body">
                        <CommentComponent v-for="(comment,id) in post.comments" :key="id" :userName="comment.author.name" :text="comment.text">
                        </CommentComponent>
                        </div>
                    </div>
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
            author: String,
            header: String
        },

        data() {
            return {
                posts: {}
            };
        },
//http://18.223.32.255/newsForum/public/
        methods: {
            init() {
                try {
                    fetch('http://3.15.179.2/newsForum/public/api/getAllPosts').then(ans => {
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
            this.init();
        },
    }
</script>

<style scoped>
    .right {
        float: right;
        color: rgba(0, 0, 0, 0.5);
    }
</style>