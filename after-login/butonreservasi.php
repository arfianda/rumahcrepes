                                <?php
                                    include '../koneksi.php';
                                    $tampilPeg    =mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    =mysqli_fetch_array($tampilPeg);
                                ?>

                                <?php
                                    $data = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]'");
                                    $d = mysqli_num_rows($data);
                                ?>
                                <?php if ($d == 0)
                                    echo '<a class="collapse-item" href="reservasi.php">Pesan Catering</a>';                         
                                ?>
                                <?php
                                    $kadaluarsa = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Sudah Kadaluarsa'");
                                    $d2 = mysqli_num_rows($kadaluarsa);

                                    $ditolak = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Ditolak'");
                                    $d3 = mysqli_num_rows($ditolak);

                                    $belum = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Belum Diverifikasi'");
                                    $d4 = mysqli_num_rows($belum);

                                    $sudah = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Sudah Diverifikasi'");
                                    $d5 = mysqli_num_rows($sudah);
                                ?>
                                <?php if ($d4 or $d5> 0){
                                    echo '';
                                }elseif($d2 or $d3 > 0){
                                    echo '<a class="collapse-item" href="reservasi.php"><i class="fas fa-fw fa-pen"></i> Pesan Catering</a>';
                                }                   
                                ?>