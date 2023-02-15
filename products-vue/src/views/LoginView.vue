<script setup>
import FormLogin from "../components/Login/FormLogin.vue";
import PageTitle from "../components/PageTitle.vue";
</script>

<template>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
          <div class="px-5 ms-xl-4">
            <PageTitle />
          </div>
          <FormLogin />
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img
            src="http://cdn.home-designing.com/wp-content/uploads/2019/09/round-grey-pouf.jpg"
            alt="Login image"
            class="w-100 vh-100"
            style="object-fit: cover; object-position: left"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<style>
@media (min-width: 1024px) {
  .login {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
