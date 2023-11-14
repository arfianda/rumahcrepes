                            <?php
                                    include '../koneksi.php';
                                    $tampilPeg    =mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    =mysqli_fetch_array($tampilPeg);
                                ?>

                                <?php
                                    $data = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Sudah Kadaluarsa'");
                                    $d = mysqli_num_rows($data);
                                ?>
                                <?php
                                    $data = mysqli_query($koneksi,"select *  from daftar_komentar where nama_pemesan='$peg[namalengkap]' and statuz='Belum Diperiksa'");
                                    $dada = mysqli_num_rows($data);
                                ?>
                                <?php 
                                if ($dada > 0){
                                    echo '';
                                }       
                                elseif ($d > 0){
                                    echo '           
                                    <a class="collapse-item" href="komen.php"><i class="fas fa-fw fa-star"></i> Unggah Komentar</a>';  
                                }                
                                ?>


