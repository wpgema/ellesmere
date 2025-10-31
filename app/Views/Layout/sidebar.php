    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="<?= base_url() ?>assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <?php if(session()->has("authCustomer")) : ?>
              <span class="brand-text fw-light">Portal Customer</span>
            <?php endif; ?>
            <?php if(session()->has("authKasir")) : ?>
              <span class="brand-text fw-light">Portal Kasir</span>
            <?php endif; ?>
            <?php if(session()->has("authOwner")) : ?>
              <span class="brand-text fw-light">Portal Owner</span>
            <?php endif; ?>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <?php if(session()->has("authKasir")) : ?>
              <ul  class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                    <a href="<?= base_url("kasir") ?>" class="nav-link">
                      <i class="nav-icon bi bi-pencil-square"></i>
                      <p>Kasir</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url("keluar") ?>" class="nav-link">
                      <i class="nav-icon bi bi-box-arrow-right"></i>
                      <p>Keluar</p>
                    </a>
                  </li>
              </ul>
            <?php endif; ?>
            <?php if(session()->has("authOwner")) : ?>
              <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                  <a href="<?= base_url("kasir") ?>" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>Kasir</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-ui-checks-grid"></i>
                    <p>
                      Supplier
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("supplier") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Daftar Supplier</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>
                      Laporan
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("laporan-penjualan") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Laporan Penjualan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url("laporan-pengeluaran") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Laporan Pengeluaran</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-cart-fill"></i>
                    <p>
                      Penjualan
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("penjualan") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Daftar Penjualan</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-cart-plus-fill"></i>
                    <p>
                      Pengeluaran
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("pengeluaran") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Daftar Pengeluaran</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                      Barang / Layanan
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("produk") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Daftar Barang</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-qr-code"></i>
                    <p>
                      Rekening
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("qris") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Qris</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>
                      Pelanggan
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("pelanggan-umum") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Pelanggan</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>
                      Karyawan
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url("karyawan") ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Daftar Karyawan</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url("keluar") ?>" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <p>Keluar</p>
                  </a>
                </li>
              </ul>
            <?php endif; ?>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>