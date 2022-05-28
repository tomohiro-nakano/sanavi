/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    data: {
        message: { props: ["testparam"] },
    },
});

// スクロールヒント
import ScrollHint from "scroll-hint";
// const ScrollHint = require('scroll-hint');
new ScrollHint(".js-scrollable", {
    suggestiveShadow: true,
    remainingTime: 5000,
    i18n: {
        scrollable: "スクロールできます",
    },
});

// スターレーティングを各項目別に生成
import StarRating from "vue-star-rating";

// new Vue({
//     el: "#star-read",
//     components: {
//         "star-read": StarRating,
//     },
//     methods: {
//         setRating: function (rating) {
//             this.rating = post;
//         },
//     },
//     data: {
//         rating: 3,
//     },
// });

new Vue({
    el: "#star-all",
    components: {
        "star-all": StarRating,
    },
    // methods: {
    //     setRating: function (rating) {
    //         this.rating = rating;
    //     },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-totonoi",
    components: {
        "star-totonoi": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-rt",
    components: {
        "star-rt": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-wt",
    components: {
        "star-wt": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-rest",
    components: {
        "star-rest": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-cong",
    components: {
        "star-cong": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

function delete_alert(e) {
    if (!window.confirm("本当に削除しますか？")) {
        window.alert("キャンセルされました");
        return false;
    }
    document.deleteform.submit();
}

// import StarRating from 'vue-star-rating';

// Vue.component('star-rating', StarRating);

// const app = new vue({
//     methods: {
//       setRating(rating){
//         this.rating= rating;
//       }
//     },
//     data: {
//       rating: 0
//     }
//   })
//   app.component('star-rating', VueStarRating.default)
//   app.mount('#app')

$(".custom-file-input").on("change", function () {
    $(this).next(".custom-file-label").html($(this)[0].files[0].name);
});
