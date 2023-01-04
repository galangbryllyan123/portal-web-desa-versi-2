		<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content clearfix">
                        <header>

                            <div class="breadcrumb-container clearfix" itemscope itemtype="http://schema.org/WebPage">
                                <ul class="breadcrumb ltr" itemprop="breadcrumb">
                                    <li><i class="icon-home3"></i><a href="index.php">Home</a></li>
									<li><a href="#">Agenda</a></li>
                                    <li>Semua Daftar Agenda</li>
                                </ul>
                            </div>
							
                            <h1 itemprop="headline">Semua Daftar Agenda</h1>

                            <div class="divider"></div>
                        </header>
						<div class="post-entry" itemprop="articleBody">
							 <?php
								  $p      = new Paging4;
								  $batas  = 4;
								  $posisi = $p->cariPosisi($batas); 
								  
								  $sql = mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
								  while($d=mysql_fetch_array($sql)){
								  $tgl_posting = tgl_indo($d[tgl_posting]);
								  $tgl_mulai   = tgl_indo($d[tgl_mulai]);
								  $tgl_selesai = tgl_indo($d[tgl_selesai]);
								  $isi_agenda =(strip_tags($d['isi_agenda'])); 
								  $isi = substr($isi_agenda,0,540); 
								  $isi = substr($isi_agenda,0,strrpos($isi," ")); 
									
								 $baca = $d[dibaca]+1;
								  
								  mysql_query("UPDATE agenda  SET dibaca='$baca' WHERE tema_seo='$_GET[tema]'");
									
									
								  echo"<div class='post post-style-1'>
								  <div class='info'>
								  
								  <h2 class='article-title'><a href='agenda-$d[tema_seo].html'>$d[tema]</a></h2>
								  
								  <span class='date'>Diposting: $tgl_posting
								  <span class style=\"color:#EA1C1C;\">|</span> dibaca: $baca pembaca</span>
								  
								  </div></div>
									<div style='height:300px; overflow:hidden; width:100%' href='#' class='post-thumbnail'>";
									if ($d['gambar'] == ''){
										echo "<img style='width:100%' src='foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
									}else{
										echo "<img style='width:100%' src='foto_agenda/$d[gambar]' alt='$d[gambar]' /></a>";
									}
									echo "</div>
									<div class='item'>$isi_agenda</div><br/>";
								}
									
								  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
								  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
								  $linkHalaman = $p->navHalaman(anti_injection($_GET[halagenda]), $jmlhalaman);        
							  ?>
										
										<footer class="blog-pagination">
											<ul class="pagination">
												<li><?php echo $linkHalaman ?></li>
											</ul>
										</footer>

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