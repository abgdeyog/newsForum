<template>
    <div>
    <div class="container" v-for="post in posts" :key="post.id">
        <div class="row justify-content-center">
            <div class="col-md-10" >
                <div class="card">
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
                            <div v-for="(comment,id) in post.comments" :key="id">
                                <CommentComponent userName="comment.author.name" :text="comment.text">
                                </CommentComponent>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
        },

        data() {
            return {
                posts: {}
            };
        },
        //http://3.15.179.2/newsForum/public/api/getAllPosts
        methods: {
            init() {
                try {
                    fetch('http://3.15.179.2/newsForum/public/api/getAllPosts').then(ans => {
                        ans.json().then(posts => {
                            this.posts = posts;
                        })
                    })
                } catch(e) {
                    console.warn("can not fetch api");
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