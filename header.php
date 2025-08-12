

<nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo_black.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarWithDropdown"
          aria-controls="navbarWithDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation" 
          style="border: none; box-shadow: none; outline: none; background: transparent;"
        >
          <!-- <span class="navbar-toggler-icon"></span> -->
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarWithDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'Home'){ echo 'active'; }  ;?> " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'About'){ echo 'active'; }?>" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle <?php if($page == 'Services'){ echo 'active'; }  ;?>"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Services
              </a>
              <ul
                class="dropdown-menu service-list"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li><a class="dropdown-item service-item" href="brand.php">Brand Development</a></li>
                <li><a class="dropdown-item service-item" href="content.php">Content Marketing</a></li>
                <li>
                  <a class="dropdown-item service-item" href="email.php">Email Marketing</a>
                </li>
                <li>
                  <a class="dropdown-item service-item" href="website.php">Website Development</a>
                </li>
                <li>
                  <a class="dropdown-item service-item" href="ppc.php">Pay Per Click Advertising</a>
                </li>
                <li>
                  <a class="dropdown-item service-item" href="descrip.php">SEO Optimization</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'Blog'){ echo 'active'; }  ;?> " href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == 'Contact'){ echo 'active'; }  ;?> " href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>