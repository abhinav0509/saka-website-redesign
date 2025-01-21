<div class="col-xl-4 col-lg-4 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-bar-wrap d-flex">
                            <input type="search" placeholder="search">
                            <i class="fal fa-search"></i>
                        </div>
                        <div class="latest-post-wrap">
                            <h5>Latest Post</h5>
                            <?php if(!empty($results)){ foreach($results as $row){ ?> 
                            <div class="single-latest-post">                                
                                <div class="latest-post-content">
                                    <!-- <div class="post-tag">
                                        <p>Space Planning</p>
                                    </div> -->
                                    <div class="post-title">
                                        <h3><a href="<?php echo base_url();?>index.php/SingleBlog/<?php echo $row->Title;?>"><?php echo $row->Title; ?></a></h3>
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-author">
                                            <p>by <?php echo $row->Name; ?></p>
                                        </div>
                                        <div class="blog-date">
                                            <p><?php echo date('F j, Y', strtotime($row->insertdate)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } }?>                                                    
                        </div>                      
                    </div>
                </div>