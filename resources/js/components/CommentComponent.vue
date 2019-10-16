<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        {{ text }}
                        <br>
                        <div class="right">
                            {{userName}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['userName', 'text'],
        name: "CommentComponent",

        data() {
            return {

            }
        },

        methods: {

            init() {
                fetch('')
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