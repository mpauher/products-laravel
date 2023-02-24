import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import $ from "jquery";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";

window.$ = $;

// import "./assets/main.css";

const app = createApp(App);

app.use(router);

app.mount("#app");
