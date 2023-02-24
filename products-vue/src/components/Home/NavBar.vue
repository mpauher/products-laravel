<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <div>
            <i class="fas fa-heart fa-2x" style="color: #e4be9e"></i>
            <span class="nav-bar-text h2 mb-0 text-white">Shop Center</span>
          </div>
          <!-- Left links -->

          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->

        <div class="d-flex align-items-center">
          <a class="link-secondary me-3" href="#">
            <i class="fas fa-shopping-cart"></i>
          </a>
          <!-- Icon -->

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <RouterLink to="/login" class="nav-bar-text nav-link">
                Login
              </RouterLink>
            </li>
          </ul>

          <!-- Notifications -->
          <!-- <div class="dropdown">
                      <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                          role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-bell"></i>
                          <span class="badge rounded-pill badge-notification bg-danger">1</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                          <li>
                              <a class="dropdown-item" href="#">Some news</a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="#">Another news</a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </li>
                      </ul>
                  </div> -->
          <!-- Avatar -->
          <div class="dropstart">
            <a
              class="btn btn-outline-dark dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              ><img
                src="../../assets/profile.png"
                class="rounded-circle"
                height="25"
                alt="Black and White Portrait of a Man"
                loading="lazy"
              />
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Orders</a></li>
              <li><a class="dropdown-item" href="#">Log Out</a></li>
            </ul>
          </div>
        </div>
        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </nav>
  </div>
</template>
