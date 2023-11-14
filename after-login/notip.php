                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->

                                <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi,"select *  from daftar_pemesan where bayar='Sudah Bayar'");
                                    $d = mysqli_num_rows($data);
                                ?>
                                <span class="badge badge-danger badge-counter"><?php echo $d?></span>
                            </a>
                            <!-- Dropdown - Alerts -->

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                            <?php 
                                include '../koneksi.php';
                                $data = mysqli_query($koneksi,"select * from daftar_pemesan where bayar='Sudah Bayar'");
                                while($d = mysqli_fetch_array($data)){
			                ?>
                                <a class="dropdown-item d-flex align-items-center" href="daftar-pemesan.php">
                                    <div class="mr-3">
                                            <img class="icon-circle rounded-circle" src="<?php echo $d['poto']; ?>">
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo $d['email']; ?></div>
                                        <span class="font-weight-bold"><?php echo $d['nama']; ?> telah memesan meja.</span>
                                    </div>
                                </a>
                                <?php 
                                }
                                ?>

                                <a class="dropdown-item text-center small text-gray-500" href="daftar-pemesan.php">Selengkapnya</a>
                            </div>
                        </li>