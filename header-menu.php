<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a href="index.php">
										<img alt="NextPUB" width="145" height="40" src="img/np/nextpub.png">
									</a>
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav header-nav-stripe">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul class="nav nav-pills" id="mainNav">
												<?php /* ?>
													<li class="">
														<a href="find-content.php">
															Search Content
														</a>													
													</li>
													<li class="">
														<a href="find-requirement.php">
															Search Requirement
														</a>													
													</li>
												<?php */ ?>
                                                    
                                                    <li class="">
														<a href="how-it-works.php">
															How it works
														</a>
													</li>
                                                    	
												<li class="">
														<a href="writers-corner.php">
															Authors Corner
														</a>
													</li>
													<li class="">
														<a href="publishers-corner.php">
															Publishers Corner
														</a>												
													</li>
<li class="">
														<a href="services.php">
															Services
														</a>
													</li>

												
													
													
													<?php if(isset($_SESSION['nextpubuserid'])){ ?>
													<li class="">
														<a href="dashboard.php">
															My Account
														</a>
													</li>
													<?php } else { ?>
													
													<li class="">
														<a href="register.php">
															Register / Login
														</a>
													</li>													
													<?php } ?>
													
													
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>