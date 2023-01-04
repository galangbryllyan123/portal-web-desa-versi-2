		<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content clearfix">
                        <header>
						<?php
							$detail=mysql_query("SELECT * FROM agenda,users  WHERE tema_seo='$_GET[tema]'");
							$d   = mysql_fetch_array($detail);
						?>
                            <div class="breadcrumb-container clearfix" itemscope itemtype="http://schema.org/WebPage">
                                <ul class="breadcrumb ltr" itemprop="breadcrumb">
                                    <li><i class="icon-home3"></i><a href="index.php">Home</a></li>
									<li><a href="#">Agenda</a></li>
                                    <li><?php echo "$d[tema]"; ?></li>
                                </ul>
                            </div>

                            <div class="divider"></div>
                        </header>
						<div class="post-entry" itemprop="articleBody">
  
								  <?php
								  echo "
								  <div class=post post-style-2'>";
								  $tgl_posting   = tgl_indo($d[tgl_posting]);
								  $tgl_mulai   = tgl_indo($d[tgl_mulai]);
								  $tgl_selesai = tgl_indo($d[tgl_selesai]);
								  $isi_agenda=nl2br($d[isi_agenda]);
								  $baca = $d[dibaca]+1;
								  
								  mysql_query("UPDATE agenda  SET dibaca='$baca'  WHERE tema_seo='$_GET[tema]'");
									
									
								  echo"<div class='post post-style-1'>
								  <div class='info'>
								  <h2 class='article-title'>$d[tema]</h2>

								  <span class='date'> <span class='date'><b>$d[nama_lengkap]</b> <span class style=\"color:#EA1C1C;\">|</span> 
								  $tgl_posting
								  <span class style=\"color:#EA1C1C;\">|</span> dibaca: $baca pembaca</span>
								  </div></div>";

									
								  echo"<div class='img_agenda'><center><img width=487px src='foto_agenda/$d[gambar]' border='0' ><center>";
								  echo "</div><br/>";
								  echo "<b>Tema</b>:
								  <div class='isiagenda'>$isi_agenda</div><br/>";
								  echo "<b>Tanggal</b> : $tgl_mulai s/d $tgl_selesai<br/>";
								  echo "<b>Tempat</b>  : $d[tempat]<br/>";
								  echo "<b>Pukul</b>   : $d[jam]<br/>";

								  ?>
                        </div>
                        <footer class="article-boxes clearfix">
								<?php
									$sosmeddd = mysql_query("SELECT * FROM identitas");
									$ssdd = mysql_fetch_array($sosmeddd);
									$pecahd = explode(",", $ssdd['facebook']);
									$fb1 = $pecahd[0];
									$tw1 = $pecahd[1];
									$go1 = $pecahd[2];
									$yt1 = $pecahd[3];
								?>
                            <aside class="share-box clearfix" data-showonscroll="true" data-animation="fadeIn">
                                <div class="box-title">
                                    <h3>Share On: </h3>
                                </div>

                                <div class="box-content share-icons clearfix">
                                    <a href="<?php echo"$fb1"; ?>" class="facebook">facebook<span class="badge"><i class="zoc-facebook"></i></span></a>
                                    <a href="<?php echo"$tw1"; ?>" class="twitter">twitter<span class="badge"><i class="zoc-twitter"></i></span></a>
                                    <a href="<?php echo"$go1"; ?>" class="gplus">google+<span class="badge"><i class="zoc-gplus"></i></span></a>
                                    <a href="<?php echo"$yt1"; ?>" class="stumbleupon">Youtube<span class="badge"><i class="zoc-stumbleupon"></i></span></a>
                                </div>
                            </aside>
                        </footer>

                    </div>
                </article>