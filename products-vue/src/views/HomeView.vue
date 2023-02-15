<script setup>
import NavBar from "../components/Home/NavBar.vue";
import HeaderHome from "../components/Home/HeaderHome.vue";
import ProductCard from "../components/Home/ProductCard.vue";
</script>

<template>
  <main>
    <NavBar />
    <HeaderHome />

    <section style="background-color: #fff">
      <div class="text-center container py-5">
        <h4 class="mt-4 mb-5 h3"><strong>Products</strong></h4>

        <ProductCard />
        <ProductCard />
      </div>
    </section>
  </main>
</template>
