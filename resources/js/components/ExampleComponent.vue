<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">{{ post }}</div> -->
                    <div id="star-read">
                        <star-read
                            :rating=post
                            :read-only="true"
                            :increment="0.01"
                        ></star-read>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "vue-star-rating";
export default {
    el: "#star-read",
    components: {
        "star-read": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
    mounted() {
        console.log("Component mounted.");
    },
    props: {
        post: String,
    },
};
// export default {
//     mounted() {
//         console.log("Component mounted.");
//     },
//     props: {
//         post: String,
//     },
// };
</script>
