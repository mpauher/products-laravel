<script setup>
import NavBar from "../components/NavBar.vue";
import HeaderHome from "../components/HeaderHome.vue";
import ProductCard from "../components/ProductCard.vue";
</script>

<template>
  <main>
    <NavBar />
    <HeaderHome />

    <section style="background-color: #fff">
      <div class="text-center container py-5">
        <h4 class="mt-4 mb-5 h3"><strong>Products</strong></h4>

        <ProductCard />
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card" style="border-radius: 15px">
              <div
                class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light"
              >
                <img
                  src="https://images.unsplash.com/photo-1505330622279-bf7d7fc918f4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZGVzayUyMGFlc3RoZXRpY3xlbnwwfHwwfHw%3D&w=1000&q=80"
                  style="
                    border-top-left-radius: 15px;
                    border-top-right-radius: 15px;
                  "
                  class="img-fluid"
                  alt="Laptop"
                />
                <a href="#!">
                  <div class="mask"></div>
                </a>
              </div>
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <div>
                    <p><a href="#!" class="text-dark">Dell Xtreme 270</a></p>
                    <p class="small text-muted">Laptops</p>
                  </div>
                  <div>
                    <div
                      class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger"
                    >
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="small text-muted">Rated 4.0/5</p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <p><a href="#!" class="text-dark">$3,999</a></p>
                  <p class="text-dark">#### 8787</p>
                </div>
                <p class="small text-muted">VISA Platinum</p>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div
                  class="d-flex justify-content-between align-items-center pb-2 mb-1"
                >
                  <a href="#!" class="text-dark fw-bold">Cancel</a>
                  <button type="button" class="btn btn-dark">Buy now</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card" style="border-radius: 15px">
              <div
                class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light"
              >
                <img
                  src="https://i.etsystatic.com/17053985/r/il/3b0c62/2623613705/il_fullxfull.2623613705_s1po.jpg"
                  style="
                    border-top-left-radius: 15px;
                    border-top-right-radius: 15px;
                  "
                  class="img-fluid"
                  alt="Laptop"
                />
                <a href="#!">
                  <div class="mask"></div>
                </a>
              </div>
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <div>
                    <p><a href="#!" class="text-dark">Dell Xtreme 270</a></p>
                    <p class="small text-muted">Laptops</p>
                  </div>
                  <div>
                    <div
                      class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger"
                    >
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="small text-muted">Rated 4.0/5</p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <p><a href="#!" class="text-dark">$3,999</a></p>
                  <p class="text-dark">#### 8787</p>
                </div>
                <p class="small text-muted">VISA Platinum</p>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div
                  class="d-flex justify-content-between align-items-center pb-2 mb-1"
                >
                  <a href="#!" class="text-dark fw-bold">Cancel</a>
                  <button type="button" class="btn btn-dark">Buy now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card" style="border-radius: 15px">
              <div
                class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                data-mdb-ripple-color="light"
              >
                <img
                  src="https://images.unsplash.com/photo-1528938102132-4a9276b8e320?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bm90ZWJvb2t8ZW58MHx8MHx8&w=1000&q=80"
                  style="
                    border-top-left-radius: 15px;
                    border-top-right-radius: 15px;
                  "
                  class="img-fluid"
                  alt="Laptop"
                />
                <a href="#!">
                  <div class="mask"></div>
                </a>
              </div>
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <div>
                    <p><a href="#!" class="text-dark">Dell Xtreme 270</a></p>
                    <p class="small text-muted">Laptops</p>
                  </div>
                  <div>
                    <div
                      class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger"
                    >
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="small text-muted">Rated 4.0/5</p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                  <p><a href="#!" class="text-dark">$3,999</a></p>
                  <p class="text-dark">#### 8787</p>
                </div>
                <p class="small text-muted">VISA Platinum</p>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div
                  class="d-flex justify-content-between align-items-center pb-2 mb-1"
                >
                  <a href="#!" class="text-dark fw-bold">Cancel</a>
                  <button type="button" class="btn btn-dark">Buy now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
